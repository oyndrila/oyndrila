
<?php include "connection.php" ?>
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
<!-- /top navigation -->

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <!--                        <h3>Plain Page</h3>-->
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
                        <h2>Return Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><select class="form-control " name="enr">
                                                <?php
                                $query = "select * from issue_book where book_return_date='' ";
                                $result = mysqli_query($connection , $query);
                                while($row = mysqli_fetch_assoc($result)){
//                                   echo  "<option>". $row['stu_enrollment']."</option>";
                                    ?>
 <option value="<?php echo $row["stu_username"]; ?>"><?php echo $row["stu_name"]." (". $row["stu_enrollment"] .")"; ?> </option>
                                                <?php
                                }?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-success form-control"></td>
                                </tr>
                            </table>
                        </form>

                        <?php
                                    if(isset($_POST["submit"])){
                                    $query2 = "select * from issue_book where stu_username = '$_POST[enr]'";
                                    $result2 = mysqli_query($connection , $query2);
                                        echo "<table class = 'table table-bordered'>";
                                        echo "<tr>";
                                        echo "<td>" ."Student Name"."</td>";
                                        echo "<td>" ."Semister"."</td>";
                                        echo "<td>" ."Contact"."</td>";
                                        echo "<td>" ."Email"."</td>";
                                        echo "<td>" ."Book Name"."</td>";
                                        echo "<td>" ."Book Issue Date"."</td>";
                                        echo "<td>" ."Return Book "."</td>";
                                        echo "</tr>";
                                    while($row6 = mysqli_fetch_assoc($result2))
                                    {       echo "<tr>";
                                            echo  "<td>".$row6['stu_name']."</td>";
                                              echo  "<td>".$row6['stu_sem']."</td>";
                                              echo " <td>".$row6['stu_contact']."</td>";
                                              echo  "<td>".$row6['stu_email']."</td>";
                                              echo  "<td>".$row6['book_name']."</td>";
                                              echo  "<td>".$row6['book_issue_date']."</td>";
echo  "<td style='background:blue'>" ;?><a href="return.php?id=<?php echo $row6['id']; ?>" style="color:white">Return Book</a>
                            <?php echo "</td>";
                                            echo "</tr>";
                                    }
                                    }
                                    echo "</table>";
                                    ?>
                            <tr>

                            </tr>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php" ?>