<?php

include "connection.php"
?>
    

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Registration Form | LMS </title>
            
                    <!-- Bootstrap -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/custom.min.css" rel="stylesheet">
    </head>

    <br>

    <div class="col-lg-12 text-center ">
        <h1 style="font-family:Lucida Console">Library Management System</h1>
    </div>


    <body class="login" style="margin-top: -20px;">



        <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>


                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required="" />
                    </div>

                    <div>
                    <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="email" name="email" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="contact" name="contact" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="SEM" name="sem" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollmentno" required="" />
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                        <a class="btn btn-primary btn-lg active btn-rounded " role="button"href="login.php"><i class="fa fa-arrow-left"size: 3x></i></a>
                    </div>


                </form>
            </section>
            <?php
if(isset($_POST["submit1"]))
{  $email = $_POST["email"];
    $sql_u = "SELECT username FROM student_registration WHERE username='$_POST[username]'";
 	$res_u = mysqli_query($connection , $sql_u);
  	if (mysqli_num_rows($res_u) > 0) { 
        ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0" style="text-align:center">
                    <strong> Sorry... username already taken</strong>
                </div>
                <?php
  	
    }
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     ?>
                <div class="alert alert-danger col-lg-6 col-lg-push-3"style="text-align:center">
                <strong> Email address is not valid</strong>
                </div>
                <?php
}

 else{
    $enc_pass = md5($_POST['password']);
    $query = "INSERT INTO student_registration VALUES('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$enc_pass','$_POST[email]','$_POST[contact]','$_POST[sem]','$_POST[enrollmentno]','no')";
    $result  = mysqli_query($connection,$query);
    ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                    Registration successfully, You will get email when your account is approved
                </div>
                <?php
}
}

?>

        </div>
    </body>

    </html>