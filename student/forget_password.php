<!DOCTYPE html>
<html>
<body>

<?php
$date=date_create("2018-07-29");
date_add($date,date_interval_create_from_date_string("3 days"));
echo date_format($date,"Y-m-d");
?>

</body>
</html>