  <!--Navbar-->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark unique-color-dark ">
        <a class="navbar-brand" href="/"><span class="font-weight-bold blue-text">&nbsp;&nbsp;&nbsp;&nbsp;Get It</span></a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarSupportedContent-4" style="">
            
  
          <ul class="navbar-nav ml-auto">
        @if(Auth::check())
            <li class="nav-item active">
              <a class="nav-link waves-effect waves-light" href="{{ route('contact.show')}}">
                <i class="fa fa-envelope"></i> Contact
                
              </a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Orders </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                      <a class="dropdown-item waves-effect waves-light" href="{{ route('order.showSelling', Auth::user()->id) }}">My Jobs</a>
                      <a class="dropdown-item waves-effect waves-light" href="{{ route('order.show', Auth::user()->id) }}"> My Orders</a>
                    </div>
                  </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> {{ Auth::user()->name }} </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <a class="dropdown-item waves-effect waves-light" href="{{ route('profile.create', Auth::user()->name) }}">Create Job Profile</a>
                <a class="dropdown-item waves-effect waves-light" href="{{ route('user', Auth::user()->name) }}">My account</a>
                <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }} "    
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Log out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </div>
            </li>
        @else
                <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="" data-toggle="modal" data-target="#elegantModalForm">
                  <i class="fa fa-gear"></i> Login</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="" data-toggle="modal" data-target="#elegantRegisterForm">
                      <i class="fa fa-gear"></i> Register</a>
                </li>
        @endif
          </ul>
        </div>
      </nav>

      {{-- Login Modal start --}}

     <!-- Modal -->
     <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
       <!--Content-->
       <div class="modal-content form-elegant">
         <!--Header-->
         <div class="modal-header text-center">
           <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form method="POST" action="{{ route('login') }} " id="login-form">
          @csrf
         <!--Body-->
         <div class="modal-body mx-4">
           <!--Body-->
           <div class="md-form mb-5">
             <input id="email" type="email" name ="email" class="form-control validate" required>
             <label data-error="wrong" data-success="right" for="email">Your email</label>
           </div>
     
           <div class="md-form pb-3">
             <input type="password" id="password" name="password" class="form-control validate" required>
             <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
             <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
                 Password?</a></p>
           </div>
     
           <div class="text-center mb-3">
             <button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1">
               Sign in</button>
           </div>

           {{-- <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
              with:</p>
      
            <div class="row my-3 d-flex justify-content-center">
              <!--Facebook-->
              <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
              <!--Twitter-->
              <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></button>
              <!--Google +-->
              <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
            </div> --}}

     
         
         </div>
         </form>
         <!--Footer-->
         <div class="modal-footer mx-5 pt-3 mb-1">
           <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1"  data-toggle="modal" data-target="#elegantRegisterForm" data-dismiss="modal">
               Sign Up</a></p>
         </div>
       </div>
       <!--/.Content-->
     </div>
     </div>
     <!-- Modal -->
     










     {{-- Register Modal Start --}}
 <!-- Modal -->
 <div class="modal fade" id="elegantRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
   <!--Content-->
   <div class="modal-content form-elegant">
     <!--Header-->
     <div class="modal-header text-center">
       <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Register</strong></h3>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <form method="POST" action="{{ route('register') }} " id="login-form">
      @csrf
     <!--Body-->
     <div class="modal-body mx-4">
       <!--Body-->

       <div class="md-form mb-5">
          <input id="name" type="text" name ="name" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="email">Name</label>
        </div>

       <div class="md-form mb-5">
         <input id="email" type="email" name ="email" class="form-control validate" required>
         <label data-error="wrong" data-success="right" for="email">Your email</label>
       </div>
 
       
       <div class="md-form mb-5">
        <input id="name" type="text" name ="name" class="form-control validate" required>
        <label data-error="wrong" data-success="right" for="email">Address</label>
      </div>

      
      <div class="md-form mb-5">
        <input id="name" type="text" name ="name" class="form-control validate" value="256" required>
        <label data-error="wrong" data-success="right" for="email">Phone Number</label>
      </div>

       <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="profilePhoto" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
            <label class="custom-file-label" for="fileInput">Profile Picture</label>
        </div>
    </div>

       <div class="md-form pb-3">
         <input type="password" id="password" name="password" class="form-control validate" required>
         <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
       </div>

       <div class="md-form pb-3">
        <input type="password" id="password" name="password" class="form-control validate" required>
        <label data-error="wrong" data-success="right" for="Form-pass1">Confirm password</label>
      </div>
 
       <div class="text-center mb-3">
         <button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1">
           Register</button>
       </div>
 
     
     </div>
     </form>
     <!--Footer-->
     <div class="modal-footer mx-5 pt-3 mb-1">
       <p class="font-small grey-text d-flex justify-content-end">Already a member? <a href="" class="blue-text ml-1" data-toggle="modal" data-target="#elegantModalForm" data-dismiss="modal">
           Sign in</a></p>
     </div>
   </div>
   <!--/.Content-->
 </div>
 </div>
 <!-- Modal -->
 {{-- @section('scripts')
 <script type="text/javascript">
   $('#elegantRegisterForm').on('hidden.bs.modal', function () {
  // Load up a new modal...
  $('#elegantModalForm').modal('show')
})
 </script>
 @endsection --}}