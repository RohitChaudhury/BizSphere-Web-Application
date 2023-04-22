<?php

namespace App\Http\Controllers;

use App\Models\Day_end_report;
use App\Models\Project_assign;
use App\Models\Reporting_manager;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Project_module;


class Member_controller extends Controller
{
    public function index_dashboard()
    {
        if (session('Logged_user') == NULL) {
            echo ('Error while Logging in! Please enter your crdentisals from <a href = "/crm_systems">here</a>');
        } else {
            $logged_user = ['logged_user_info' => User::where('id', '=', session('Logged_user'))->first()];

            //retreiving data of projects from DB:
            $manager_id = Reporting_manager::where('user_id', (session('Logged_user')->id))->pluck('reporting_user_id')->all();
            $projects_id = Project_assign::where('user_id', $manager_id)->pluck('project_id')->all();
            $projects = Project::whereIn('id', $projects_id)->get()->all();


            //retreiving comments data from DB:
            $comments = Day_end_report::where('user_id', session('Logged_user')->id)->get()->all();

            $colors = ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00', '#FF7F00', '#FF0000'];

            $count_pr = count($projects);
            $count_comm = count($comments);
            $data = compact('projects', 'logged_user', 'colors', 'count_pr', 'count_comm');
            return view('member_views.dashboard_team_member')->with($data);
        }
    }

    public function member_view_all_projects()
    {
        $manager_id = Reporting_manager::where('user_id', (session('Logged_user')->id))->pluck('reporting_user_id')->all();
        $projects_id = Project_assign::where('user_id', $manager_id)->pluck('project_id')->all();
        $projects = Project::whereIn('id', $projects_id)->with('project_assign')->get()->all();
        $user_module = Project_module::whereIn('project_id', $projects_id)->get()->all();

        $percent = 0;
        $module_num = 0;

        $data = compact('projects', 'user_module', 'percent', 'module_num');
        return view('member_views.member_view_projects')->with($data);

    }


    public function member_view_module($id)
    {
        $project = Project::find($id);
        $modules = $project->project_module;
        $data = compact('project', 'modules');
        return view('member_views.member_edit_module')->with($data);
    }

    public function member_edit_existing_module($id, $pr_id)
    {
        $project = Project::find($pr_id);
        $modules = $project->project_module;
        $edit_module = $project->project_module->find($id);

        $data = compact('project', 'modules', 'edit_module');

        return view('member_views.member_edit_existing_module')->with($data);
    }

    public function member_edit_existing_module_submit($id, $pr_id, Request $request)
    {
        $request->validate([
            'completion_percentage' => 'required'
        ]);

        $edit_module = Project_module::find($id);
        $edit_module->completion_percentage = $request['completion_percentage'];
        $edit_module->save();

        return redirect('/member/view/module/' . $pr_id)->with('edit', 'Done! Module ' . $edit_module->module_name . ' has been updated successfully!');
    }

    public function member_edit_profile()
    {
        $user = User::find(session('Logged_user')->id);

        $data = compact('user');
        return view('member_views.member_edit_profile')->with($data);
    }
    public function member_edit_profile_submit(Request $request)
    {

        if ($request->password != NULL  || $request->password_confirmation != Null) {

            $user = User::find(session('Logged_user')->id);
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email,' . $user->id,
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
                'phone_number' => 'required'
            ]);
            $user->name = $request['name'];
            $user->password = bcrypt($request['password']);
            $user->email = $request['email'];
            $user->phone = $request['phone_number'];
            $user->status = $request['status'];
            $user->save();

            return redirect()->back()->with('success', 'Done! ' . $user->name . ', Your Profile has been edited successfully');
        } else {
            $user = User::find(session('Logged_user')->id);
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email,' . $user->id,
                'phone_number' => 'required'
            ]);

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone_number'];
            $user->status = $request['status'];
            $user->save();

            return redirect()->back()->with('success', 'Done! ' . $user->name . ', Your Profile has been edited successfully');
        }
    }


    public function add_comments()
    {
        $comments = Day_end_report::where('user_id', session('Logged_user')->id)->get()->all();

        $manager_id = Reporting_manager::where('user_id', (session('Logged_user')->id))->pluck('reporting_user_id')->all();
        $projects_id = Project_assign::where('user_id', $manager_id)->pluck('project_id')->all();
        $projects = Project::whereIn('id', $projects_id)->pluck('project_name', 'id')->all();

        $data = compact('comments', 'projects');
        return view('member_views.member_day_end_report')->with($data);
    }
    public function add_comments_new()
    {
        $manager_id = Reporting_manager::where('user_id', (session('Logged_user')->id))->pluck('reporting_user_id')->all();
        $projects_id = Project_assign::where('user_id', $manager_id)->pluck('project_id')->all();
        $projects = Project::whereIn('id', $projects_id)->pluck('project_name', 'id')->all();

        $data = compact('projects');
        return view('member_views.member_add_comment')->with($data);
    }

    //For dependable dropdown in day end report blade page for module:
    public function dependent_module_comments($id)
    {
        $project_module = Project_module::where('project_id', $id)->get();

        return json_encode($project_module);
    }

    public function add_comments_submit(Request $request)
    {
        $request->validate([
            'project' => 'required',
            'project_module' => 'required',
            'completion_weightage' => 'required',
            'member_comment' => 'required'
        ]);

       
        $reporting_id =  Reporting_manager::where('user_id', session('Logged_user')->id)->pluck('reporting_user_id')->first();
        $comments = new Day_end_report;
        $comments->user_id = session('Logged_user')->id;
        $comments->project_id = $request->project;
        $comments->module_id = $request->project_module;
        $comments->completion_weightage = $request->completion_weightage;
        $comments->team_member_comment = $request->member_comment;
        if($reporting_id != null){
        $comments->lead_id = $reporting_id;
        }
        $comments->save();

        $project_module_new = Project_module::find($comments->module_id);

        $project_module_new->completion_percentage = ($project_module_new->completion_percentage) + ($comments->completion_weightage);

        $project_module_new->save();

        return redirect()->route('add_comments')->with('success', 'Success! Comment added successfully for the Project and its Module');



    }
    public function delete_comment($id)
    {
        Day_end_report::find($id)->delete();

        return redirect()->back()->with('delete', 'Done! Comment removed Successfully');
    }

}