<?php include "header.php" ?>
<?php
if(!isset($_SESSION["librarian"]) ) {
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?><?php

if(!isset($_SESSION["librarian"]))
{  ?>
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
                <h3>Display Books</h3>
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
                        <h2></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post">

                            <input type="text" placeholder="search book" name="search" class="form-control">
                            <input type="submit" value="search book" name="submit"class="btn btn-primary" style="margin:2px;">
                        </form>
                        <?php
                                    if(isset($_POST["submit"])){
                                        $query="SELECT * FROM add_book WHERE book_name Like ('%$_POST[search]%' )  ";
                                    $result=mysqli_query($connection,$query);
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"."Books_name"."</th>"; 
                                    echo "<th>"."Image"."</th>"; 
                                    echo "<th>"."Author_Name"."</th>"; 
                                    echo "<th>"."publication_name"."</th>"; 
                                    echo "<th>"."purchase_date"."</th>"; 
                                    echo "<th>"."price"."</th>"; 
                                    echo "<th>"."Quantity"."</th>"; 
                                    echo "<th>"."Available_Quantity"."</th>"; 
                                    echo "</tr>";
                                    while($row=mysqli_fetch_assoc($result))
                                    {echo "<tr>";
                                      echo "<td>";echo $row['book_name']; echo "</td>";
                                        echo "<td>";?> <img src="../librarian/<?php echo $row["book_image"]; ?> " height = "100" width = "100">
                            <?php echo "</td>";
                                        echo "<td>";echo $row['book_author_name']; echo "</td>";
                                        echo "<td>";echo $row['book_publication_name']; echo "</td>";
                                         echo "<td>";echo $row['book_purchase_date']; echo "</td>";
                                        echo "<td>";echo $row['book_price']; echo "</td>";
                                        echo "<td>";echo $row['book_qty']; echo "</td>";
                                        echo "<td>";echo $row['available_qty']; echo "</td>";
                                     echo "<td>";?><a href="delete_book.php?id=<?php echo $row['id'] ; ?> " class="btn btn-primary" role="button"onclick="return confirm('Are you sure you want to delete this item?');">Delete Book</a> <?php echo "</td>";
                                     echo "</tr>";
                                    }
                                    echo "</table>";
                                    }
                                    else{
                                    $query="SELECT * FROM add_book";
                                    $result=mysqli_query($connection,$query);
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"."Books_name"."</th>"; 
                                    echo "<th>"."Image"."</th>"; 
                                    echo "<th>"."Author_Name"."</th>"; 
                                    echo "<th>"."publication_name"."</th>"; 
                                    echo "<th>"."purchase_date"."</th>"; 
                                    echo "<th>"."price"."</th>"; 
                                    echo "<th>"."Quantity"."</th>"; 
                                    echo "<th>"."Available_Quantity"."</th>"; 
                                    
                                    echo "</tr>";
                                    while($row=mysqli_fetch_assoc($result))
                                    {echo "<tr>";
                                      echo "<td>";echo $row['book_name']; echo "</td>";
                                        echo "<td>";?>  <img src="../librarian/<?php echo $row["book_image"]; ?> " height = "100" width = "100">
                            <?php echo "</td>";
                                        echo "<td>";echo $row['book_author_name']; echo "</td>";
                                        echo "<td>";echo $row['book_publication_name']; echo "</td>";
                                         echo "<td>";echo $row['book_purchase_date']; echo "</td>";
                                        echo "<td>";echo $row['book_price']; echo "</td>";
                                        echo "<td>";echo $row['book_qty']; echo "</td>";
                                        echo "<td>";echo $row['available_qty']; echo "</td>";
                                      echo "<td>";?><a href="delete_book.php?id=<?php echo $row['id'] ; ?> " class="btn btn-primary" role="button"onclick="return confirm('Are you sure you want to delete this item?');"style="margin-top:33px; margin-left:20px">Delete Book</a> <?php echo "</td>";
                                     echo "</tr>";
                                    }
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

<?php include "footer.php" ;?>