<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BizSphere|Smart solution for Busy developers on handling projects</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
        
        <style>
            .text_forget a{
               color: whitesmoke;
              
            }
            .text_forget a:hover{
                color: rgb(184, 192, 190);
            }
        </style>
    </head>
    <body style="height: 20%">
       
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="form_body">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-5" style="height: 40vh;">
                        <div class="text-center text-white" style="position:relative; bottom:42%;">
                            <!-- Page heading-->
                            <img src="{{asset('Free_Sample_By_Wix.jpg')}}" alt="Logo" height="130px" class="mb-4">
                            @if(session('fail'))
                            {{ session('fail') }}
                            @endif

                            @if(session('status'))
                            <div class="alert alert-success">
                              {{ session('status') }}
                            </div>
                            @endif
                       
                            

                            <!-- to get an API token!-->
                            <form action = "{{url('/')}}/login/submit"class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN" method = 'Post'>
                                 {{-- If user inputs invalid credentials --}}
                                     @if(session('error'))
                                    <div class="alert alert-danger">
                                      {{ session('error') }}
                                    </div>
                                    @endif


                                <!-- Email address input-->
                                {{-- Main log-in page for the User roles --}}
                                @csrf
                                <div class="col">
                                    <div class="row">
                                        <input class="form-control form-control-lg mb-4  @error('email') is-invalid @enderror" name = "email" id="emailAddress" type="email" placeholder="Username Email" data-sb-validations="required,email" required autocomplete="current-email" />
                                        <div class="invalid-feedback text-red mb-2" data-sb-feedback="emailAddress:required">Invalid Email-address</div>
                                        <div class="invalid-feedback text-red mb-2" data-sb-feedback="emailAddress:email">Invalid Email-address</div>
                                        {{-- the error message to validate email the form --}}
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                    <div class="row">
                                          <input class="form-control form-control-lg mb-4 @error('password') is-invalid @enderror" name= "password"id="emailAddress" type="Password" placeholder="Password"  data-sb-validations="required,password" required autocomplete="current-password"/></div>
                                           {{-- The error message to validate the password in the form --}}
                                          @error('password')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                          <div class="row-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Login</button></div>
                                   </div>   
                                  </div>
                                       
                                        
                                    
                                        
                                 
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Log-in successful!</div>
                                      
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Invalid credentials!</div></div>
                            </form>
                        </div>
                    </div>
                    <span class="forget_pass" style="width:fit-content;">
                        <div class="text_forget small" style="position: absolute; left:61.2%; margin-top: 20px"><a href="{{route('forget_password')}}">Forgot Password?</a></div>
                    </span>
                </div>
            </div>
        </div>
        </header>

        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-20 text-center text-lg-start my-auto">
                       
                        <p class="text-muted small mb-2 mb-lg-0">&copy; Internship Project of Rohit Chaudhury.</p>
                    </div>
                </div>
            </div>
        </footer>
       
       
      
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

          
                          



