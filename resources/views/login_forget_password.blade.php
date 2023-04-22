<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laraject|Smart solution for Busy developers on handling projects</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
       
        
        
        
    </head>
    <body style="height: 20%">
       
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="form_body">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-5" style="height: 40vh;">
                        <div class="text-center text-white" style="position:relative; bottom:33%;">
                            <!-- Page heading-->
                            <img src="{{asset('Free_Sample_By_Wix.jpg')}}" alt="Logo" height="130px" class="mb-4">
                            @if(session('fail'))
                            <div class="alert alert-danger">
                            {{ session('fail') }}
                            </div>
                            @endif
                            
                            
                            @if(session('success'))
                             <div class="alert alert-success">
                                 {{ session('success') }}
                            </div>
                            @endif
                            <!-- to get an API token!-->
                            <form action = "{{route('verify.email')}}" class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN" method = 'Post'>
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
                                        <input class="form-control form-control-lg mb-3" name = "email" id="emailAddress" type="Enter" placeholder="Enter email for verification" data-sb-validations="required,email" required autocomplete="current-email" />
                                        
                                        {{-- the error message to validate email the form --}}
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                   
                                 <div class="row-auto" style="position: absolute; left:86%;"><a href=""><button class="btn btn-primary btn-sm" id="submitButton" type="submit">Submit</button></a></div>
                                   </div>   
                            </form>
                                 <div class="row-auto" style="position: absolute;"><a href="{{route('log_in')}}"><button class="btn btn-secondary btn-sm" id="submitButton" type="submit">Back to log-in</button></a></div>
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
        <script src="{{ asset('js/scripts.js') }}"></script>
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

          
                          



