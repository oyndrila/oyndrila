<?php
session_start();
if(!isset($_SESSION["librarian"])  ){
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?><?php include('process.php') ?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form method="post" action="register.php" id="register_form">
  	<h1>Register</h1>
  	<div <?php if (isset($name_error)):?> class="form_error" <?php endif ?> >
	  <input type="text" name="username" placeholder="Username">
	  <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
      <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
  	<div>
  		<input type="password"  placeholder="Password" name="password">
  	</div>
  	<div>
  		<button type="submit" name="register" id="reg_btn">Register</button>
  	</div>
  </form>
  </body>
</html>