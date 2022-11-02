<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        

        <style>

.main_div h2{
    text-align: center;
    font-size: xx-large;
    font-family: 'Franklin Gothic Medium';
}
.buttons{
    width: 100%;
    
}
.buttons a{
    margin:100px;
    margin-left: 300px;
    text-align: center;
    width: 200px;
    border-radius: 100px;
}


            </style>

    </head>
    <body>
        <div class="main_div">
            <h2>FACULITY DEATILS</h2>
            <div class="buttons">
                
                <a class="btn btn-dark" href="add.html" role="button">Add</a>                
                
            </div>

            <table class="table">
        <thead id="thead" style="background-color: #26a2af">
        <tr>
            <th>MEMBERS</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>ADDRESS</th>
            <th>SUBJECT</th>
            <th>ID</th>
            <th>EDIT</th>
        </tr>
        </thead>
        <tbody>
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

 
        $common = new Common();
        $records = $common->getAllRecords($connection);
        if ($records->num_rows>0){
            $sr = 1;
            while ($record = $records->fetch_object()) {
                
                $fname = $record->firstname;
                $lname = $record->lastname;
                $address = $record->address;
                $subject = $record->subject;
                $recordId = $record->id;
                ?>
                <tr>
                    <th><?php echo $sr;?></th>
                    <th><?php echo $fname;?></th>
                    <th><?php echo $lname;?></th>
                    <th><?php echo $address;?></th>
                    <th><?php echo $subject;?></th>
                    <th><?php echo $recordId;?></th>
                    <td><a href="delete.php?recordId=<?php echo $recordId?>" class="btn btn-danger btn-sm">Delete</a> </td>
                    <td><a href="update.php" class="btn btn-warning btn-sm">Update</a></td>
                </tr>
                <?php
                $sr++;
            }
        }
        

    

        
        ?>
        </tbody>
    </table>





        </div>




        <script src="C:\xampp\htdocs\demo\jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>