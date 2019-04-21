<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
 /* star form */
 fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
</head>
<body>

  <!--Navbar-->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark special-color-dark">
      <a class="navbar-brand" href="#">Get It</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse show" id="navbarSupportedContent-4" style="">
          

        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="#">
              <i class="fa fa-envelope"></i> Contact
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="" data-toggle="modal" data-target="#elegantModalForm">
              <i class="fa fa-gear"></i> Settingss</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i> Profile </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
              <a class="dropdown-item waves-effect waves-light" href="#">Log out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>



   
  <div class="container">
    <div class="row">
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
    <!--Body-->
    
    <div class="modal-body mx-4">
      <!--Body-->
      <div class="md-form mb-5">
        <input type="email" id="Form-email1" class="form-control validate">
        <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
      </div>

      <div class="md-form pb-3">
        <input type="password" id="Form-pass1" class="form-control validate">
        <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
        <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
            Password?</a></p>
      </div>

      <div class="text-center mb-3">
        <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
      </div>
      <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
        with:</p>

      <div class="row my-3 d-flex justify-content-center">
        <!--Facebook-->
        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
        <!--Twitter-->
        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></button>
        <!--Google +-->
        <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
      </div>
    </div>


    <!--Footer-->
    <div class="modal-footer mx-5 pt-3 mb-1">
      <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1">
          Sign Up</a></p>
    </div>
  </div>
  <!--/.Content-->
</div>
</div>
<!-- Modal -->

<div class="text-center">
<a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#elegantModalForm">Launch
  modal Login Form</a>
</div>


<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Fair - 3 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="poor - 1 star"></label>
</fieldset>
    </div>
  </div>
</body>
</html>