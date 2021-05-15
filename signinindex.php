<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<style>
.error{
	color: red;
    font-family: roboto;
    font-size: 15px;
}
</style>
</head>
<body>
	<h2 class="text-secondary ms-3 pt-3">SignIn Page</h2>
	<form method="POST" id="form"> 
  <div class="mb-3 ms-3 mt-5">
    <label for="exampleInputfname" class="form-label">First Name</label>
    <input type="text" class="form-control container ms-0" id="exampleInputfname" name="fname">
  </div>
  <div class="mb-3 ms-3">
    <label for="exampleInputlname" class="form-label">Last Name</label>
    <input type="text" class="form-control container ms-0" id="exampleInputlname" name="lname">
  </div>
  <div class="mb-3 ms-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control container ms-0" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
	<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 ms-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control container ms-0" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary ms-3" name="signin">Sign In</button>
</form>
<?php
require 'signin.php';
$db = new signin();
if(isset($_POST['signin'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql=$db->sign('signintable',$fname,$lname,$email,$password);
	if($sql){
		header("Location:/loginindex.php/");
	}else{
		echo '<div class="alert alert-warning alert-dismissible fade show w-50 mx-auto" role="alert" style=margin-top:-500px;>
				<strong>Warning!</strong> User Exists.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </div>';
	}
}
?>
<script type="text/javascript">
jQuery(document).ready(function() {
   jQuery('form[id="form"]').validate({
      rules: {
         fname:  {
            required: true,
            minlength: 3,
         },
         lname:  {
            required: true,
            minlength: 3,
         },
         email: {
            required: true,
            email: true,
         },
         password: {
			 required: true,
             minlength: 10,
		 }
      },
      messages: {
		fname: {
			required:'Enter a valid First Name',
			minlength: 'Name atleast of 3 characters'
		},
		lname: {
			required:'Enter a valid Last Name',
			minlength: 'Name atleast of 3 characters'
		},
		email: {
			required:'Enter a valid email',
			email: 'The email should be in the format: abc@domain.tld'
		},
		password:{
			required:'Enter a valid password',
			minlength:'Password should be of 10 characters'
			}
	  },
		submitHandler: function(form) {
		form.submit();
	}
   });
});
</script>
</body>
</html>

