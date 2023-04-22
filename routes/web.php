<?php

use App\Http\Controllers\Dashboard_manager;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\Member_controller;
use App\Http\Controllers\Password_Reset;
use App\Http\Controllers\team_lead_controller;
use Illuminate\Support\Facades\Route;


// All the routes to the controller: 


//------------------ Log-in Controller Routes ------------------------
//To get the the landing page of the crm app:
Route::get('/crm_systems', [login_controller::class, 'index'])->name('log_in');
//routing after submitting the form 
Route::post('/login/submit', [login_controller::class, 'submit']);
// Route for Logout page from user Dashboard:
Route::get('/dashboard/user/logout', [login_controller::class, 'logout'])->name('logout');
//Route to forget password:
Route::get('/crm_systems/forget_password', [login_controller::class, 'forget_password_view'])->name('forget_password');

//The routes to Password reset controller:
Route::post('/password/reset', [Password_Reset::class, 'requestReset'])->name('verify.email');
Route::get('/password/reset/{token}', [Password_Reset::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset/update', [Password_Reset::class, 'reset'])->name('password.update');

// Route fr Forbidden page:
Route::get('/forbidden', [login_controller::class, 'forbidden'])->name('forbidden');





// ----------------  Project Manager routes -----------------------

//Route for middleware AuthCheck:
Route::group(['middleware' => ['AuthCheck']], function () {

    Route::group(
        ['middleware' => ['role:Project Manager']],
        function () {
            /* GET Project manager routes */
            //Dashboard screen's route for Project manager: 
            Route::get('/dashboard/project_manager/', [Dashboard_manager::class, 'manager_index']);

            //Route for member's edit routing page
            Route::get('/edit/members', [Dashboard_manager::class, 'edit'])->name('manager_employee_records');

            //route for all projects page:
            Route::get('/all_projects', [Dashboard_manager::class, 'all_projects']);


            Route::post('/edit/members', [Dashboard_manager::class, 'member_submit']);
            //new table after creating a new member in the table
            Route::get('/edit/members/new', [Dashboard_manager::class, 'new_table']);

            //url to demonstrate when to remove a member:
            Route::get('/remove/members/{id}', [Dashboard_manager::class, 'remove_member']);

            //url to demonstate to edit a member in the table:
            Route::get('/edit/members/{id}', [Dashboard_manager::class, 'edit_members']);

            //To update the user data in the table from table:
            Route::post('/update/member/{id}', [Dashboard_manager::class, 'update_member']);



            //Route to toggle active_active:
            Route::get('/active_inactive/{main_project_id}', [Dashboard_manager::class, 'active_inactive']);

            //Route to add members in the page:
            Route::get('/add/members', [Dashboard_manager::class, 'add_member']);

            //Route to add projects view from All-projects home page:
            Route::get('/add/projects', [Dashboard_manager::class, 'add_project']);
            Route::post('/add/projects', [Dashboard_manager::class, 'add_projects_post']);


            //Route for editing the module page:
            Route::get('/add/project_module/{id}', [Dashboard_manager::class, 'add_project_module']);
            Route::post('/add/project_module/{id}', [Dashboard_manager::class, 'add_project_module_submit']);

            //Route for changing the status of project on button click
            Route::get('/change/project/status/{id}', [Dashboard_manager::class, 'change_status_project']);

            //delete Route for project_module:
            Route::get('/delete/module/{id}/{pr_id}', [Dashboard_manager::class, 'delete_module']);

            //Route to edit module:
            Route::get('/edit/project_module/{id}/{pr_id}', [Dashboard_manager::class, 'edit_module']);
            Route::post('/edit/project_module/{id}/{pr_id}', [Dashboard_manager::class, 'edit_module_submit']);

             //Route to add Module for the project:
            Route::get('/manager/add/module/{id}', [Dashboard_manager::class, 'add_module'])->name('add_module');
            // Route to add day end report;
            Route::get('/add/day_end_report', [Dashboard_manager::class, 'add_comments']);
            //Route to add Comments form manager:
            Route::get('/manager/add/comments/{id}', [Dashboard_manager::class, 'add_comments_manager']);
            Route::post('/manager/add/comments/{id}', [Dashboard_manager::class, 'add_comments_manager_submit']);


            // route to assign members to lead
            Route::get('manager/add/member/under_lead', [Dashboard_manager::class, 'add_members_under_lead']);
            Route::post('manager/add/member/under_lead', [Dashboard_manager::class, 'add_members_under_lead_submit']);
            //Route To remove member from lead:
            Route::get('/manager/remove/member/from/lead/{id}', [Dashboard_manager::class, 'remove_member_from_lead']);

            //Route to assign projects for team Leads:
            Route::get('/manager/assign/project', [Dashboard_manager::class, 'manager_assign_project']);
            Route::post('/manager/assign/project', [Dashboard_manager::class, 'manager_assign_project_submit']);

            // Route to remove assigned projects to Project Leads:
            Route::get('/manager/remove/assign/{id}', [Dashboard_manager::class, "remove_assign"]);



            // Route fopr manager to edit profile:
            Route::get('/manager/edit/profile', [Dashboard_manager::class, 'manager_edit_profile'])->name('manager_edit_profile');
            Route::post('/manager/edit/profile', [Dashboard_manager::class, 'manager_edit_profile_submit'])->name('manager_edit_profile_submit');

           
            // -------- End of Project manager Route(s) --------------------
        }
    );


    Route::group(
        ['middleware' => ['role:Team Lead']],
        function () {
            //--------- Team Lead Route(s) -------------------
            Route::get('/dashboard/team_lead', [team_lead_controller::class, 'dashboard_index']);


            //Route to view members in team Lead page:
            Route::get('/team_lead/view_members/{id}', [team_lead_controller::class, 'lead_view_members']);

            //Route to add members from team lead:
            Route::get('/team_lead/add/members', [team_lead_controller::class, 'lead_add_members'])->name('lead_add_members');
            Route::post('/team_lead/add/members', [team_lead_controller::class, 'lead_add_members_post']);

            // Route to change the status the member assigned:
            Route::get('/team_lead/change/status/member/{id}/{l_id}', [team_lead_controller::class, 'change_status']);

            //Route to delete members form add members view blade page:
            Route::get('/lead/remove_member/{user_id}', [team_lead_controller::class, 'remove_member'])->name('remove_member');

            // Route to edit existing memers under lead;
            Route::get('/lead/edit/members/{id}', [team_lead_controller::class, 'edit_member']);
            Route::post('/lead/edit/members/{id}', [team_lead_controller::class, 'update_member']);

            //Route for view all projects under the lead:
            Route::get('/lead/all/projects/{id}', [team_lead_controller::class, 'all_projects']);

            //Route to change status of the projects under lead:
            Route::get('/lead/change/status/projects/{id}', [team_lead_controller::class, 'change_status_projects'])->name('project_status');

            //Route to view modules of a Project under 
            Route::get('/lead/view/module/{id}', [team_lead_controller::class, 'view_module']);

            //Route to add module form for lead:
            Route::get('/lead/add/project_module/form/{id}', [team_lead_controller::class, 'add_module_form']);

            //Route to add project's module by lead:
            Route::post('/lead/add/project_module/{id}', [team_lead_controller::class, 'lead_add_project_module']);

            //Route to edit project module by lead:
            Route::get('/lead/edit/project/module/{id}/{pr_id}', [team_lead_controller::class, 'lead_edit_module']);
            Route::post('/lead/edit/project/module/{id}/{pr_id}', [team_lead_controller::class, 'lead_edit_module_submit']);

            //Route to get the blade page for Comments view:
            Route::get('/lead/view/comments', [team_lead_controller::class, 'lead_view_comments'])->name('day_end_reoprt_lead');
            //Route to approve the status of the Comment:
            Route::get('/lead/comment/approve/{id}', [team_lead_controller::class, 'approve_comments']);
            Route::get('/lead/comment/dis-approve/{id}', [team_lead_controller::class, 'disApprove_comments']);
            //Route to delete module:
            Route::get('/lead/delete/module/{id}', [team_lead_controller::class, 'lead_delete_module']);
            //Route to add comments by lead:
            Route::get('/lead/add/comments/{id}', [team_lead_controller::class, 'add_comments_lead']);
            Route::post('/lead/add/comments/{id}', [team_lead_controller::class, 'add_comments_lead_submit']);

            //Route to edit profile page by the lead:
            Route::get('/lead/edit/profile', [team_lead_controller::class, 'lead_edit_profile'])->name('lead_edit_profile');
            Route::post('/lead/edit/profile', [team_lead_controller::class, 'lead_edit_profile_submit'])->name('lead_update_profile');

            // ----------------- End of Team Lead Routes ------------------
    
        }
    );


    Route::group(
        ['middleware' => ['role:Developer']],
        function () {
            //------------------- Start of Team Member Routes --------------------
            //Team member of Route page:
            Route::get('/dashboard/team_member', [Member_controller::class, 'index_dashboard']);

            // Route to get the view of all projects:
            Route::get('/member/all_projects', [Member_controller::class, 'member_view_all_projects'])->name('member_all_projects');

            // Route of the module view page for member:
            Route::get('/member/view/module/{id}', [Member_controller::class, 'member_view_module'])->name('module_view_module');


            // Route to edit existing module of the blade page:
            Route::get('/member/edit/existing/module/{id}/{pr_id}', [Member_controller::class, 'member_edit_existing_module']);
            Route::post('/member/edit/existing/module/{id}/{pr_id}', [Member_controller::class, 'member_edit_existing_module_submit']);


            //Route to edit profle by the members:
            Route::get('/edit/profile/members', [Member_controller::class, 'member_edit_profile'])->name('member_edit_profile');
            Route::post('/edit/profile/members', [Member_controller::class, 'member_edit_profile_submit'])->name('member_edit_profile_submit');

            //Route for day end report of members:
            Route::get('/member/add/comments', [Member_controller::class, 'add_comments'])->name('add_comments');
            Route::get('/member/add/comments/new', [Member_controller::class, 'add_comments_new'])->name('add_comments_new');

            //Route to show modules after project is being selected in the dropdown:
            Route::get('/member/add/comment/fetch-modules/{id}', [Member_controller::class, 'dependent_module_comments'])->name('fetchModules');

            //Route to add comments from member
            Route::post('/member/add/comments', [Member_controller::class, 'add_comments_submit'])->name('add_comments_submit');

            //Route to delete no-responsed comments:
            Route::get('/member/delete/comment/{id}', [Member_controller::class, 'delete_comment']);

        }
    );
});

?>