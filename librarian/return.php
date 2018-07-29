<?php
session_start();
if(!isset($_SESSION["librarian"])){
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?><?php
include "connection.php";
$id = $_GET["id"];
$a = date("d-m-Y");
$query = "update  issue_book set book_return_date = '$a' where id = $id";
$result = mysqli_query($connection , $query);
$query1 = "select * from issue_book where id='$id'";
$result1 = mysqli_query($connection , $query1);
while($row = mysqli_fetch_assoc($result1))
{
    $book_name = $row["book_name"];
}
mysqli_query($connection , "update add_book set available_qty available_qty+1 where book_name = '$book_name' ");
mysqli_query($connection , "delete  from issue_book  where book_return_date = '$a' and id=$id");

?>
    <script type="text/javascript">
        window.location = "return_book.php";
    </script>