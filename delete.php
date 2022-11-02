<?php
$hostName = "localhost"; 
$username = "root";  
$password = ""; 
$databaseName = "work2";

$connection = new mysqli($hostName,$username,$password,$databaseName);
if (!$connection) {
    die("Error in database connection". $connection->connect_error);
}


        class Common
{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM work2";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }

    public function deleteRecordById($connection,$recordId) {
        $query = "DELETE FROM work2 WHERE id='$recordId'";
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
}


if (isset($_GET['recordId'])){
    $recordId = $_GET['recordId'];
    $common = new Common();
    $delete = $common->deleteRecordById($connection,$recordId);
    if ($delete){
        echo '<script>alert("Record deleted successfully !")</script>';
        echo '<script>window.location.href="student.php";</script>';
    }
}
?>