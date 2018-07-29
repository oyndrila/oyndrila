<?php include "header.php" 
?>
    
        <?php include "connection.php" ?>
        <?php
if(!isset($_SESSION["username"]))  {
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
                    <h3>                       </h3>         
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
                                <h2>Search Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method= "post">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                    <input type="text" class="form-control" name="search" placeholder = "Search" required></td>
                                    <td><input type="submit"  name="submit" value = "Submit"class="btn btn-warning form-control"></td>
                                        </tr>
                                    </table>
                                </form>
                            <?php
                                if(isset($_POST["submit"]))
                                {
                                    $query = "select * from add_book where book_name like  '%$_POST[search]%' ";
                                $result = mysqli_query($connection , $query);
                                echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                $i = 0;
                                while($row = mysqli_fetch_assoc($result))
                                {   
                                    echo "<td>";
                                    ?>   <img src="../librarian/<?php echo $row["book_image"]; ?> " height = "100" width = "100"><?php
                                  echo "<br>"; 
                                 echo "<br>"; 
                                 echo "<b>"."Book Name : ".$row["book_name"]."<b>";
                                  echo "<br>"; 
                                 echo "<b>"."Available : ".$row["available_qty"]."<b>";
                                    echo "</td>";
                                 if($i==3)
                                 {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }
                                
                                }
                                echo "</tr>";
                                echo "</table>";
                                }
                                else
                                { $query = "select * from add_book ";
                                $result = mysqli_query($connection , $query);
                                echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                $i = 0;
                                while($row = mysqli_fetch_assoc($result))
                                {   
                                    echo "<td>";
                                    ?>   <img src="../librarian/<?php echo $row["book_image"]; ?> " height = "100" width = "100"><?php
                                  echo "<br>"; 
                                 echo "<br>"; 
                                 echo "<b>"."Book Name : ".$row["book_name"]."<b>";
                                  echo "<br>"; 
                                 echo "<b>"."Available : ".$row["available_qty"]."<b>";
                                    echo "</td>";
                                 if($i==3)
                                 {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }
                                
                                }
                                echo "</tr>";
                                echo "</table>";
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