<?php
session_start();
if(!isset($_SESSION["librarian"]))  {
    ?>
    <script type="text/javascript">
window.location="login.php";
</script>
<?php
}
?><?php

include "connection.php";

$id = $_GET['id'];
$query = "UPDATE student_registration SET status = 'no' where id = $id ";
$result = mysqli_query($connection , $query);

?>

    <script type="text/javascript">
        window.location = "display_student_info.php";
    </script>