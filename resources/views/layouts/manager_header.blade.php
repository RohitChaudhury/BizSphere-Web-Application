<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | {{App\Models\Role::where('id', session('Logged_user')->role_id)->first()->role_name }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}" >
        <script type="text/javascript" src="{{ URL::asset('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/manager_styles.css') }}">
        <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.js') }}"></script>

       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        {{-- Data-tables CSS --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

        {{-- Multi select CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" crossorigin="anonymous">
         
    
        
        <style>
            .nav-item a{
                color: whitesmoke;
                text-decoration: none;
                }
            .nav-item a:hover{
                color: rgb(146, 63, 40);
            }
         </style>
    </head>
    
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/dashboard/project_manager/">{{ App\Models\Role::where('id', session('Logged_user')->role_id)->first()->role_name }}</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
          
            <!-- Navbar Log-out-->

            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-left">
                        <a class="dropdown-item" href="{{route('manager_edit_profile')}}"><i class="fa-sharp fa-solid fa-pencil fa-sm"></i>&nbsp;&nbsp;Edit Profile</a>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Are you sure?')"><p><i class="fa-solid fa-right-from-bracket fa-sm"></i>&nbsp;&nbsp;&nbsp;Logout</i></p></a>
                    </div>
                </div>
            </ul>
            
            
        </nav>
        


        {{-- Navabr Side-nav --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="mb-4"></div>
                            <a class="nav-link" href="{{url('/')}}/dashboard/project_manager/">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-house"></i>&nbsp;Dashboard
                            </a>
                            <a class="nav-link" href="{{url('/')}}/add/day_end_report">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-comment"></i>&nbsp;Comments
                            </a>
                            
                            <a class="nav-link collapsed" href="{{url('/')}}/all_projects" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-diagram-project"></i>&nbsp;Projects
                               
                            </a>
                            
                            <a class="nav-link collapsed" href="{{url('/')}}/edit/members" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-user-plus"></i>&nbsp;Employees
                                </a>
                            
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{url('/')}}/manager/add/member/under_lead">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-handshake"></i>&nbsp;Assign Members under Team Lead
                            </a>
                             
                            <a class="nav-link" href="{{url('/')}}/manager/assign/project">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fa-solid fa-paperclip"></i>&nbsp;Assign Project to a Team Lead
                            </a>
                        </div>
                    </div> 
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{session('Logged_user')->name}}
                    </div>
                </nav>
            </div>
            