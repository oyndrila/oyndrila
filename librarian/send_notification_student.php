<?php include "connection.php" ?>
<?php include "header.php" ?>
<?php
if(!isset($_SESSION["librarian"]))  {
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?>
<?php include "connection.php" ?>


<!-- /top navigation -->

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
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
                        <h2>Send message to student</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
<!--
                                        <select class="form-control" name="name">
                                        <?php
                                            $query = "select * from student_registration";
                                            $result = mysqli_query($connection , $query);
                                            while($row = mysqli_fetch_assoc($result))
                                            {?>
 <option value="<?php echo $row["username"]; ?>"><?php echo $row["username"]." (". $row["enrollment"] .")"; ?> </option>
                                                <?php
                                            }
                                            ?>
                                    </select>
-->
                                 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <?php  $id = $_GET['id']; 
                                        $query = "select stu_username from issue_book where id = '$id'";
                                        $result = mysqli_query($connection , $query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $name = $row['stu_username'];
                                                                                 }
                                        ?>
                                   <input type="text" class="form-control" value= "<?php echo  $name; ?>" name="title" style="text-align:center;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" name="title" placeholder="Title">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea class="form-control" name="msg"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" class="form-control" style="background-color:blue; color:white;">
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        if(isset ($_POST["submit"])){
            $query = "INSERT INTO message VALUES ('','$name',' $_SESSION[librarian]','$_POST[title] ','$_POST[msg] ','n')";
        $result = mysqli_query($connection , $query);
            ?>
    <script type="text/javascript">
        alert("Message send successfully");
    </script>
    <?php
        
        }

else
{?>

        <?php
}
?>

        <?php include "footer.php" ?>