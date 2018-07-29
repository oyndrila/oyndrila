<?php
include "connection.php" ;
?>
    <form action='forget_pass.php' method='POST'>
        enter your username: <br> <input type='text' name='username'>
        <p>
            enter your email<br><input type="text" name="email">
            <p>
                <input type="submit" name="submit" value="submit">

    </form>
    <?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
//  echo $email;
$query = "select * from staff_registration where username = '$username' ";
$result = mysqli_query($connection , $query);
$numrow = mysqli_num_rows($result);
 if($numrow != 0)
 {
     while($row = mysqli_fetch_assoc($result))
     { 
         $db_email = $row['email'];
//         echo $row['email'];
//          echo $row['username'];
         
   } 
//         echo $email."<br>";
//          echo $db_email;
     if($email ==  $db_email){
         
         $code = rand(10000, 1000000);
         $to = $db_email;
         $subject = "password";
         $body = "
         this is an automated mail.please do not reply.click below to reset password
         http://localhost/phplms/librarian/forget_pass.php?code = $code$username = $username
         ";
         $query1 = "update staff_registration set passreset = '$code' where username = '$username' ";
         $result1 = mysqli_query($connection , $query1);
         mail($to , $subject , $body);
         echo " check youe email";
     }
     else{
         echo "email is incorrect";
     }
 }
 else
 {
     echo "that user doesn't exist";
 }
}
?>