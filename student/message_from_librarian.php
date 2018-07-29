<?php include "header.php" 

    ?>


    <?php
include "connection.php" ;   
    $query = "update message set read1 = 'y' where dusername = '$_SESSION[username]'";
$result = mysqli_query($connection , $query);
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
                        <h2>Message from librarian</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <th>Title</th>
                            <th>Meassage</th>
                        </tr>
                        <?php
                        $query = "select * from message where dusername = '$_SESSION[username]' order by id desc";
                            $result = mysqli_query($connection , $query);
                        echo "<tr>";
                       
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $query1 = "select * from staff_registration  ";
                            $result1 = mysqli_query($connection , $query1);
                            while($row1 = mysqli_fetch_assoc($result1))
                        {
                                $fullname = $row1["first_name"]." ".$row1["last_name"];
                                
                         }
                         
                             echo "<tr>";
                            echo "<td>";echo  $fullname ;echo "</td>";
                            echo "<td>". $row["title"] ."</td>";
                            echo "<td>". $row["msg"] ."</td>";
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

<?php include "footer.php" ;