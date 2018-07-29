<?php
include "connection.php"
 $query1 = "select * from staff_registration";
                            $result1 = mysqli_query($connection , $query1);
                            while($row1 = mysqli_fetch_assoc($result1))
                        {
                                $fullname = $row1["first_name"]." ".$row1["last_name"];
                             
                         }
   echo  $fullname ;

?>