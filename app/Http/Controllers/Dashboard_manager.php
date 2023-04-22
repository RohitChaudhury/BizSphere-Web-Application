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
use App\Models\Role;


class Dashboard_manager extends Controller
{
    public function manager_index()
    {
        if (session('Logged_user') == NULL) {
            echo ('Error while Logging in! Please enter your crdentisals from <a href = "/crm_systems">here</a>');
        } else {
            $logged_user = ['logged_user_info' => User::where('id', '=', session('Logged_user')->id)->first()];
            $projects = Project::all();
            $mem = User::all();
            $colors = ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00', '#FF7F00', '#FF0000'];
            $count_pr = count($projects);
            $count_mem = count($mem);
            $data = compact('projects', 'logged_user', 'colors', 'count_pr', 'count_mem');

            return view('dashboard_manager')->with($data);
        }
    }


    public function edit()
    {
        $user = User::all();
        $sl_no = 1;
        $data = compact('user', 'sl_no');
        return view('Edit_member')->with($data);
    }
    public function member_submit(Request $request)
    {
        $user = new User;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,',
            'password' => 'required|min:6',
            'phone_number' => 'required',
            'role_name' => 'required',
            'status' => 'required'

        ]);

        if ($request['role_name'] == 'Project Lead') {
            $request['role_id'] = 2;
        } else if ($request['role_name'] == 'Project Member') {
            $request['role_id'] = 3;
        } else {
            $request['role_id'] = 1;
        }
        $user->role_id = $request['role_id'];
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->email = $request['email'];
        $user->phone = $request['phone_number'];
        $user->status = $request['status'];
        $user->save();
        return redirect('add/members')->with('success', 'Success! New Member asigned successfully!');
    }







    public function remove_member($id)
    {
        if ($id == NULL) {
            return redirect('/edit/members');
        } else {
            $user = User::find($id);
            if ($user->role_id == 2) {
                Reporting_manager::where('reporting_user_id', $user->id)->delete();
                Project_assign::where('user_id', $user->id)->delete();
                
                if(Day_end_report::where('lead_id', $id)->pluck('id')->all() != Null){
               $lead_id = Day_end_report::where('lead_id', $id)->first();
               $lead_id->lead_id = null;
               $lead_id->save();

                }


                User::find($id)->delete();

            } else if ($user->role_id == 3) {

                Reporting_manager::where('user_id', $user->id)->delete();
                $report = Day_end_report::where('user_id', $id)->get()->all();

                foreach ($report as $repo) {
                    $repo->user_id = Null;
                    $repo->save();
                }

                User::find($id)->delete();
            }

            return redirect()->back()->with('remove', 'Done! Lead/Member removed successfully');
        }


    }
    public function edit_members($id)
    {
        if ($id == NULL) {
            return redirect('/edit/members');
        } else {
            $user = User::find($id);

            $data = compact('user');

            return view('edit_existing_member')->with($data);
        }


    }
    public function update_member($id, Request $request)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'phone_number' => 'required'
        ]);


        if ($request['role_name'] == 'Project Lead') {
            $user['role_id'] = 2;
        } else if ($request['role_name'] == 'Project Member') {
            $user['role_id'] = 3;
        } else {
            $user['role_id'] = 1;
        }

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone_number'];
        $user->save();


        return redirect('/edit/members')->with('success', 'Done! Lead/Member ' . $user->name . ' edited successfully');

    }
    public function all_projects()
    {
        $projects = Project::with('project_assign')->get();
        $user_module = Project_module::all();

        $percent = 0;
        $module_num = 0;
        $data = compact('projects', 'user_module', 'percent', 'module_num');


        return view('All_projects')->with($data);

    }
    public function active_inactive($id)
    {
        $active = User::find($id);
        if ($active['status'] == 1) {
            $active['status'] = 0;
        } else {
            $active['status'] = 1;

        }
        $user = User::find($id);
        $user->status = $active['status'];
        $user->save();

        return redirect('/edit/members');
    }
    public function add_member()
    {
        return view('add_members');

    }
    public function add_project()
    {

        return view('table_add_projects');
    }
    public function add_projects_post(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'estimated_end_date' => 'required',
            'status' => 'required'
        ]);

        $projects = new Project;
        $projects->project_name = $request['project_name'];
        $projects->project_manager_id = session('Logged_user')->id;
        $projects->project_details = $request['project_details'];
        $projects->estimated_end_date = $request['estimated_end_date'];
        $projects->status = $request['status'];
        $projects->save();

        return redirect('/add/projects')->with('success', 'Success! Project added successfully!');

    }
    public function add_project_module($id)
    {

        $project = Project::find($id);
        $modules = $project->project_module;
        $data = compact('project', 'modules');
        return view('edit_project_module')->with($data);

    }


    public function add_module($id){
        $project = Project::find($id);

        $data = compact('project');

        return view ('manager_add_module')->with($data);
    }
    public function add_project_module_submit($id, Request $request)
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

        Session::flash('pop-up', "Success! Module added successfully!");


        return view('edit_project_module')->with($data);
    }




    public function change_status_project($id)
    {
        $module = Project::find($id);
        if ($module['status'] == 1) {
            $module['status'] = 0;
        } else {
            $module['status'] = 1;
        }
        $module->save();
        return redirect('/all_projects');
    }



    public function delete_module($id, $pr_id)
    {

        Project_module::find($id)->delete();

        return redirect('/add/project_module/' . $pr_id);

    }
    public function edit_module($id, $pr_id)
    {
        $project = Project::find($pr_id);
        $modules = $project->project_module;
        $edit_module = $project->project_module->find($id);

        $data = compact('project', 'modules', 'edit_module');
        return view('edit_existing_module')->with($data);
    }
    public function edit_module_submit(Request $request, $id, $pr_id)
    {
        $request->validate([
            'module_name' => 'required',
            'module_weightage' => 'required',
            'completion_percentage' => 'required'
        ]);
        $edit_module = Project_module::find($id);
        $edit_module->module_name = $request['module_name'];
        $edit_module->project_id = $pr_id;
        $edit_module->module_weightage = $request['module_weightage'];
        $edit_module->completion_percentage = $request['completion_percentage'];
        $edit_module->save();

        return redirect('/add/project_module/' . $pr_id);


    }
    public function add_comments()
    {

        $comments = Day_end_report::all();

        $data = compact('comments');
        return view('Day_end_report')->with($data);

    }
    public function add_comments_manager($id)
    {
        $comments = Day_end_report::find($id);

        $data = compact('comments');

        return view('manager_add_comments')->with($data);
    }

    public function add_comments_manager_submit(Request $request, $id)
    {
        $request->validate([
            'manager_comment' => 'required',

        ]);

        $comments = Day_end_report::find($id);
        $comments->manager_comment = $request->manager_comment;
        $comments->save();

        $member_name = User::where('id', $comments->user_id)->first()->name;

        return redirect('/add/day_end_report')->with('success', 'Done! Comment added Successfully for ' . $member_name . ' report');
    }



    public function add_members_under_lead()
    {
        $leads = User::where('role_id', Role::where('role_name', 'Team Lead')->first()->id)->pluck('name', 'id')->all();
        $membersTest = User::where('role_id', Role::where('role_name', 'Developer')->first()->id)->whereNotIn('id', Reporting_manager::pluck('user_id')->all())->get()->all();


        return view('assign_members_under_lead', compact('leads', 'membersTest'));

    }
    public function add_members_under_lead_submit(Request $request)
    {
        $request->validate([
            'project_member' => 'required',
            'project_lead' => 'required',

        ]);

        for ($i = 0; $i < sizeof($request->project_member); $i++) {
            $manager = new Reporting_manager;
            $manager->user_id = $request->project_member[$i];
            $manager->reporting_user_id = $request->project_lead;
            $manager->status = 1;
            $manager->save();
        }

        $tl = User::find($request->project_lead);
        return redirect()->back()->with('pop-up', "Success! Members assigned succeesfully under Team Lead " . $tl->name);
    }

    public function remove_member_from_lead($id)
    {
        Reporting_manager::where('user_id', $id)->delete();

        Day_end_report::where('user_id', $id)->update(['lead_id' => null]);

        return redirect()->back();
    }
    public function manager_assign_project()
    {
        // data for form to assign project
        $leads = User::where('role_id', Role::where('role_name', 'Team Lead')->first()->id)->pluck('name', 'id')->all();
        $projects = Project::where('project_manager_id', 1)->whereNotIn('id', Project_assign::pluck('project_id')->all())->pluck('project_name', 'id')->all();


        // data for the table
        $pr_assigned = Project_assign::all();

        $sl_no = 1;

        $data = compact('leads', 'projects', 'pr_assigned', 'sl_no');
        return view('manager_assign_project')->with($data);


    }
    public function manager_assign_project_submit(Request $request)
    {
        $request->validate([
            'project_lead' => 'required',
            'project' => 'required',

        ]);


        $assigned = new Project_assign;
        $assigned->user_id = $request->project_lead;
        $assigned->project_id = $request->project;
        $assigned->save();



        $tl = User::find($request->project_lead);
        return redirect()->back()->with('pop-up', 'Success! Project assigned successfully under ' . $tl->name);
    }

    public function remove_assign($id)
    {
        Project_assign::find($id)->delete();

        return redirect()->back()->with('delete', "Done! Assigned Project removed from Team Lead successfully");
    }

    public function manager_edit_profile()
    {
        $user = User::find(session('Logged_user')->id);

        $data = compact('user');
        return view('manager_edit_profile')->with($data);
    }

    public function manager_edit_profile_submit(Request $request)
    {
        if ($request->password != NULL || $request->password_confirmation != Null) {

            $user = User::find(session('Logged_user')->id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
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