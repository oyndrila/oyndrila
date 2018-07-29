
<?php include "connection.php" ?>
<?php include "header.php" ?>
 <?php
    if(!isset($_SESSION["librarian"]) ) {
    ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
        <?php
}
?>
<!-- /top navigation -->

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>                  </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
<!--
                        <h2>Plain Page</h2>

                        <div class="clearfix"></div>
-->
                    </div>
                    <div class="x_content">
                       <div class="login_wrapper">

                <section class="login_content">
                    <form name="form1" action="" method="post">
                        <h1> Change  Password  </h1>

                        <div>
                            <input type="password" name="old_pass" class="form-control" placeholder="Old Passward" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder=" New Password" required="" />
                        </div>
                        <div>

                            <input class="btn btn-default submit" type="submit" name="submit1" value="Login">

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br/>


                        </div>
                    </form>
                </section>


            </div>


            <?php
    if(isset($_POST["submit1"]))
        { 
       $dec_pass =  md5( $_POST[ 'old_pass']);
//        $count = 0 ;
            $query = "SELECT password FROM staff_registration WHERE username = '$_SESSION[librarian]' ";
            $result = mysqli_query($connection , $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $old_pass = $row['password'];
        }
        if( $old_pass ==  $dec_pass)
        {
                $result1 = md5($_POST['password']);
                $query1= "UPDATE  staff_registration set password = '$result1' WHERE username = '$_SESSION[librarian]' ";
                $res_1=  mysqli_query($connection , $query1);
             if($res_1){
                  ?>
                <div class="alert alert-danger col-lg-6 col-lg-push-3" style="text-align:center;">
                    <strong style="color:white">Password update successfully.</strong>
                </div>
                <?php
        }
           

        }
        else
        {
             ?>
                <div class="alert alert-danger col-lg-6 col-lg-push-3"style="text-align:center;">
                    <strong style="color:white">Old Password Incorrect  .</strong>
                </div>
                <?php
        }
    }
    
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php" ?>