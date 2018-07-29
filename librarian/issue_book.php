    <?php include "header.php" ?>
    <?php  include "connection.php" ?>
<?php

if(!isset($_SESSION["librarian"]))  {
    ?>
    <script type="text/javascript">
window.location="login.php";
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
                    <h3></h3>
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
                            <h2>Issue Book</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form" action="" method="post">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="enr" class="form-control selectpicker">
                                       <?php
                                            $query = "SELECT * FROM student_registration where status ='yes' ";
                                            $result=mysqli_query($connection,$query);
                                            while($row=mysqli_fetch_assoc($result)){
                                               $id = $row["id"];
                                    ?>
                     <option value="<?php echo $row["username"]; ?>"><?php echo $row["username"]." (". $row["enrollment"] .")"; ?> </option>
                                                <?php
                                }?>
                                                
                                        </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="submit" value="submit query" class="form-control btn btn-danger" style="margin-top:5px;">
                                        </td>
                                    </tr>
                                </table>
                                <?php
                                if(isset($_POST["submit"]))
                                {
                                    $query5 = "SELECT * FROM student_registration WHERE username='$_POST[enr]' &&  status ='yes'";
                                    $result5 = mysqli_query($connection,$query5);
                                    while($row5 = mysqli_fetch_assoc($result5)){
                                        $firstname =  $row5["first_name"];
                                        $lastname = $row5["last_name"];
                                        $username = $row5["username"];
                                        $email = $row5["email"];
                                        $contact = $row5["contact"];
                                        $sem = $row5["sem"];
                                        $enrollment = $row5["enrollment"];
                                        $_SESSION["enrollment"] = $enrollment ;
                                        $_SESSION["username"] = $username ;
                                    }
                                
                                ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="enrollment" placeholder="enrollmentno" value="<?php echo $enrollment ; ?> " disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="studentname" placeholder="student_name" value="<?php echo $firstname.' '.$lastname;?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="studentsem" placeholder="studentsem" value="<?php echo $sem;?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="studentemail" placeholder="student email" value=" <?php echo $email; ?> " required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="studentcontact" placeholder="Contact no" value=" <?php echo $contact; ?> " required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="bookname" class="form-control selectpicker" placeholder="Book name">
                                        <?php
                                    $query="select book_name from add_book";
                                    $result =mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option>";
                                        echo $row["book_name"];
                                        echo "</option>";
                                    }
                                        ?>
                                        </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="bookissuedate" placeholder="Book issue date" class="form-control" value="<?php echo date('d-M-Y'); ?> ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="studentusername" placeholder="Student User Name" class="form-control" value="<?php echo $username ; ?> " disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Issue Book" ` class="form-control btn btn-warning">
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                }
                                ?>
                            </form>
                            <?php
                                if(isset($_POST["submit1"]))
                                {
                                    
                                    $qty  = 0;
                                    $query = "select * from add_book where book_name = '$_POST[bookname]' ";
                                    $result = mysqli_query($connection , $query);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $qty = $row["available_qty"];
                                    }
                                    if($qty <=0)
                                    {?>
                                <script type="text/javascript">
                                    alert("Book is not available in the library");
                                    window.location.href = window.location.href;
                                </script>
                                <?php
                                    }
                                    else
                                    {
                                    $query4 = "INSERT INTO issue_book VALUES( '',
                                   '$_SESSION[enrollment]',
                                    '$_POST[studentname]' ,  '$_POST[studentsem] ', 
                                    '$_POST[studentcontact]' , 
                                    '$_POST[studentemail]' ,
                                    '$_POST[bookname]' , 
                                    '$_POST[bookissuedate]' , 
                                    '',
                                    '$_SESSION[username] ')  ";
                                    mysqli_query($connection , $query4);
                                    $query9 = "update add_book set available_qty = available_qty-1 where book_name = '$_POST[bookname]'";
                                    mysqli_query($connection , $query9);
                                    ?>
                                    <script type="text/javascript">
                                        alert("Insert successfully");
                                        window.location.href = window.location.href;
                                    </script>

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