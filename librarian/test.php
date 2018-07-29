<?php include "connection.php" ?>
<?php
//                                    if(isset($_POST["submit"])){
                                    $query = "select book_issue_date from issue_book ";
                                    $result = mysqli_query($connection , $query);
                        while($row = mysqli_fetch_assoc($result)){
                            $issue_date = $row['book_issue_date'];
                            $date=date_create($issue_date);
                            date_add($date,date_interval_create_from_date_string("5 days"));
                                $return_date = date_format($date,"Y-m-d");
                            echo $return_date . "<br>" ;
                            $current_date = date("Y-m-d");
                            echo $current_date;
                            if($current_date >  $return_date){
                               echo "you should return library book" ; 
                            }
                        }


?>