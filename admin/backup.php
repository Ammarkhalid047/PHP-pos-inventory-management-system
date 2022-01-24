<?php
include 'session.php';


$tableName  = 'pos';
$backupFile = 'mypet.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($conn,$query);
if($result){
    echo"success";
}
?> 