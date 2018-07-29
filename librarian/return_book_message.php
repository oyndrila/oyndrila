
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
<!--
                            <table class="table table-bordered">
                                <tr>
                                    <td><select class="form-control " name="enr">
                                                <?php
                                $query = "select stu_enrollment from issue_book where book_return_date='' ";
                                $result = mysqli_query($connection , $query);
                                while($row = mysqli_fetch_assoc($result)){
                                   echo  "<option>". $row['stu_enrollment']."</option>";
                                }?>
                                
                            
                            </select>
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-success form-control"></td>
                                </tr>
-->
<!--                            </table>-->
                        </form>

                        <?php
//                                    if(isset($_POST["submit"])){
                                    $query = "select book_issue_date from issue_book ";
                                    $result = mysqli_query($connection , $query);
                        while($row = mysqli_fetch_assoc($result)){
                            $issue_date = $row['book_issue_date'];
                            $date=date_create($issue_date);
                            date_sub($date,date_interval_create_from_date_string("5 days"));
//echo date_format($date,"Y-m-d");
                             $return_date = date_format($date,"Y-m-d");
                        }
                                $current_date = date("Y-m-d");
                            if($current_date >  $return_date){
                            
                                         echo "<table class = 'table table-bordered'>";
                                        echo "<tr>";
                                        echo "<td>" ."Student Name"."</td>";
                                        echo "<td>" ."Semister"."</td>";
                                        echo "<td>" ."Contact"."</td>";
                                        echo "<td>" ."Email"."</td>";
                                        echo "<td>" ."Book Name"."</td>";
                                        echo "<td>" ."Book Issue Date"."</td>";
                                        echo "<td>" ."Message "."</td>";
                                        echo "</tr>";
                                 $query1 = "select * from issue_book ";
                                    $result1 = mysqli_query($connection , $query1);
                                    while($row1 = mysqli_fetch_assoc($result1))
                                    {       echo "<tr>";
                                            echo  "<td>".$row1['stu_name']."</td>";
                                              echo  "<td>".$row1['stu_sem']."</td>";
                                              echo " <td>".$row1['stu_contact']."</td>";
                                              echo  "<td>".$row1['stu_email']."</td>";
                                              echo  "<td>".$row1['book_name']."</td>";
                                              echo  "<td>".$row1['book_issue_date']."</td>";
echo  "<td style='background:blue'>" ;?><a href="send_notification_student.php?id=<?php echo $row1['id']; ?>" style="color:white">Message</a>
                            <?php echo "</td>";
                                            echo "</tr>";
                                    }
//                                    }
                                    echo "</table>";
                            }
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