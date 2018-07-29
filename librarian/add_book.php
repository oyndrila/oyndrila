<?php include "header.php" ?>
<?php

if(!isset($_SESSION["librarian"]) ) {
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
                <h3>Add Book Information</h3>
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
                        <h2>Add Book Info</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post" name="form1" class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book Name" required="" name="bname"></td>
                                </tr>
                                <tr>
                                    <td><strong>Books image</strong><input type="file" name="f1"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book author name" name="bauthor" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Publication Name" name="pname" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="date" class="form-control" placeholder="Book purchase date" name="bpurchasedt" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book price" name="bprice" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Books quantity" name="bqty" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Books available quantity" name="aqty" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-default submit" name="submit1" value="Insert button detail" style="background-color:blue;  color:white;"></td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
    if(isset($_POST["submit1"]))
    {   $tm = md5(time());
        $fnm = $_FILES["f1"]["name"];
        $dst = "./books_image/" . $tm .$fnm;
     $dst1 = "books_image/".$tm.$fnm;
     move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
        $query = "INSERT INTO add_book VALUES ('','$_POST[bname]','$dst1','$_POST[bauthor]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian] ')";
     echo $_SESSION["librarian"];
                mysqli_query($connection  , $query);
        ?>
    <script type="text/javascript">
        alert("Book insert successfully");
    </script>
    <?php   
    }
?>
    <?php include "footer.php" ; ?>