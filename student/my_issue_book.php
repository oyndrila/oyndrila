<?php include "header.php" 

    ?>
    
<?php include "connection.php" ?>


        <!-- /top navigation -->

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>                           </h3>
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
                                <h2>My issue books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <table class="table table-bordered">
                                <th>
                                Enrollment no
                                   </th>
                                   <th>
                                   Book Name
                                   </th>
                                <th>
                                   Issued Book Date
                                   </th>
                                   <?php
                        $query1 =       "select * from issue_book where stu_username = '$_SESSION[username]' ";
                        $result1 = mysqli_query($connection , $query1);
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo "<tr>";
                            echo "<td>";
                            echo  $row1["stu_enrollment"];
                            echo "</td>";
                            echo "<td>";
                            echo  $row1["book_name"];
                            echo "</td>";
                            echo "<td>";
                            echo  $row1["book_issue_date"];
                            echo "</td>";
                            echo "</tr>";
                            
                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php include "footer.php" ?>