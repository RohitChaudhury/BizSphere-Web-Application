<?php

namespace App\Http\Controllers;

use App\Models\Day_end_report;
use App\Models\Project_assign;
use App\Models\Reporting_manager;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Project_module;
use Illuminate\Support\Facades\Session;



class team_lead_controller extends Controller
{
    public function dashboard_index()
    {
        if (session('Logged_user') == NULL) {
            echo ('Error while Logging in! Please enter your crdentisals from <a href = "/crm_systems">here</a>');
        } else {
            $logged_user = ['logged_user_info' => User::where('id', '=', session('Logged_user')->id)->first()];
            // Taking respective projects from the DB:
            $projects_id = Project_assign::where('user_id', session('Logged_user')->id)->pluck('project_id')->all();
            $projects = Project::whereIn('id', $projects_id)->get()->all();

            // Taking respective members from the Db:
            $member_id = Reporting_manager::where('reporting_user_id', session('Logged_user')->id)->pluck('user_id')->all();
            $mem = User::whereIn('id', $member_id)->get();


            $colors = ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00', '#FF7F00', '#FF0000'];

            $count_pr = count($projects);
            $count_mem = count($mem);
            $data = compact('projects', 'logged_user', 'colors', 'count_pr', 'count_mem');

            return view('dashboard_team_lead')->with($data);
        }



    }
    public function lead_view_members($id)
    {
        $member_id = Reporting_manager::where('reporting_user_id', $id)->pluck('user_id')->all();
        $user = User::whereIn('id', $member_id)->get()->all();



        $sl_no = 1;
        $data = compact('user', 'sl_no');

        return view('member_view_for_lead')->with($data);
    }
    public function lead_add_members()
    {
        return view('Lead_add_members');
    }
    public function lead_add_members_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,',
            'password' => 'required|min:6',
            'phone_number' => 'required',
            'status' => 'required'

        ]);

        $user = new User;
        $manager_assign = new Reporting_manager;
        $user->role_id = 3;
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->email = $request['email'];
        $user->phone = $request['phone_number'];
        $user->status = $request['status'];
        $user->save();
        $manager_assign->user_id = $user->id;
        $manager_assign->reporting_user_id = session('Logged_user')->id;
        $manager_assign->save();


        return redirect('/team_lead/view_members/' . session('Logged_user')->id)->with('success', 'Success! New Member ' . $user->name . ' added successfully');
    }

    public function change_status($id, $l_id)
    {
        $active = User::find($id);
        if ($active['status'] == 1) {
            $active['status'] = 0;
        } else {
            $active['status'] = 1;

        }

        $active->save();



        return redirect('/team_lead/view_members/' . $l_id);
    }

    public function remove_member($user_id)
    {
        Reporting_manager::where('user_id', $user_id)->delete();
        return redirect()->back()->with('remove', 'Done! Member Removed from your team successfully!');
    }

    public function edit_member($id)
    {
        if ($id == NULL) {
            return redirect()->back();
        } else {
            
            $user = User::find($id);
            $data = compact('user');

            return view('lead_edit_members')->with($data);
        }
    }

    public function update_member($id, Request $request)
    {
        $user = User::find($id);
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'phone_number' => 'required',
        ]);
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        
        if (!empty($request['phone_number'])) {
            $user->phone = $request['phone_number'];
        }
        
        $user->save();
        
        return redirect('/team_lead/view_members/' . session('Logged_user')->id)->with('success_edit', 'Done! Member ' . $user->name . ' edited successfully');
        
    }

       
        




    public function all_projects($id)
    {
        $projects_id = Project_assign::where('user_id', $id)->pluck('project_id')->all();
        $projects = Project::whereIn('id', $projects_id)->with('project_assign')->get()->all();
        $user_module = Project_module::whereIn('project_id', $projects_id)->get()->all();

        $percent = 0;
        $module_num = 0;

        $data = compact('projects', 'user_module', 'percent', 'module_num');

        return view('Lead_all_projects')->with($data);
    }

    public function change_status_projects($id)
    {
        $module = Project::find($id);
        if ($module['status'] == 1) {
            $module['status'] = 0;
        } else {
            $module['status'] = 1;
        }
        $module->save();
        return redirect('/lead/all/projects/' . session('Logged_user')->id);
    }

    public function view_module($id)
    {
        $project = Project::find($id);
        $modules = $project->project_module;
        $data = compact('project', 'modules');
        return view('Lead_view_module')->with($data);
    }

    public function add_module_form($id){
        $project = Project::find($id);

        $data = compact('project');

        return view ('lead_add_module')->with($data);
    }



    public function lead_add_project_module($id, Request $request)
    {
        $request->validate([
            'module_name' => 'required',
            'module_weightage' => 'required',
            'completion_percentage' => 'required'
        ]);

        $module = new Project_module;
        $module->module_name = $request['module_name'];
        $module->project_id = $id;
        $module->module_weightage = $request['module_weightage'];
        $module->completion_percentage = $request['completion_percentage'];
        $module->save();


        $project = Project::find($id);
        $modules = $project->project_module;
        $data = compact('project', 'modules');

        Session::flash('add', "Success! Module added successfully!");

        return view('lead_view_module')->with($data);

    }

    public function lead_edit_module($id, $pr_id)
    {

        $project = Project::find($pr_id);
        $modules = $project->project_module;
        $edit_module = $project->project_module->find($id);

        $data = compact('project', 'modules', 'edit_module');

        return view('lead_edit_existing_module')->with($data);
    }

    public function lead_edit_module_submit($id, $pr_id, Request $request)
    {
        $request->validate([

            'completion_percentage' => 'required'
        ]);

        $edit_module = Project_module::find($id);

        $edit_module->completion_percentage = $request['completion_percentage'];
        $edit_module->save();

        return redirect('/lead/view/module/' . $pr_id)->with('edit', 'Done! Module ' . $edit_module->module_name . ' has been updated successfully!');

    }

    public function lead_view_comments()
    {
        $comments = Day_end_report::where('lead_id', session('Logged_user')->id)->get();
        $data = compact('comments');
        return view('lead_day_end_report')->with($data);
        
    }

    public function approve_comments($id)
    {
        $comments = Day_end_report::find($id);

        $comments->approval_status = 1;
        $comments->save();

        return redirect()->back();
    }
    public function disApprove_comments($id)
    {
        $comments = Day_end_report::find($id);

        $comments->approval_status = 0;
        $comments->save();

        return redirect()->back();
    }

    public function add_comments_lead($id)
    {
        $comments = Day_end_report::find($id);

        $data = compact('comments');
        return view('lead_add_comments')->with($data);
    }

    public function add_comments_lead_submit(Request $request, $id)
    {

        $request->validate([
            'status' => 'required',
            'lead_comment' => 'required'
        ]);


        $comments = Day_end_report::find($id);
        $comments->team_lead_comment = $request->lead_comment;
        $comments->approval_status = $request->status;
        $comments->save();

        $member_name = User::where('id', $comments->user_id)->first()->name;

        return redirect('/lead/view/comments')->with('success', 'Done! Comment added Successfully for ' . $member_name . ' report');

    }


    public function lead_edit_profile()
    {
        $user = User::find(session('Logged_user')->id);

        $data = compact('user');
        return view('lead_edit_profile')->with($data);
    }
    public function lead_edit_profile_submit(Request $request)
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
}