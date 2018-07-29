<?php
session_start();
if(!isset($_SESSION["librarian"]) ) {
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?>
<?php
include "connection.php";


if(isset($_GET["id"]))
   {$id = $_GET["id"];
$query = "delete from add_book where id = '$id'";
$result = mysqli_query($connection , $query);
       ?>
    <script type="text/javascript">
        window.location = "display_books.php";
    </script>
    <?php
}
   else{
?>
        <script type="text/javascript">
            window.location = "display_books.php";
        </script>
        <?php
   }

?>