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
<!-- /top navigation -->

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> </h3>
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
                        <?php
                                $query = "select * from add_book ";
                                $result = mysqli_query($connection , $query);
                                echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                while($row = mysqli_fetch_assoc($result))
                                {   echo "<td>";
                                    ?> <img src="<?php echo $row[" book_image "]; ?> " height="100" width="100">
                            <?php
                                    echo "</td>";
                                }
                                echo "</tr>";
                                echo "</table>";
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php" ?>