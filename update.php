<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <style>

            .home a{
                margin: 100px;
            }
            .container{
                margin-top: 200px;
            }
            h1{
                text-align: center;
                text-decoration: underline;
                padding-top: 50px;
            }


            </style>
    </head>
    <body>
    

    <h1>Update faculity Details</h1>
        <div class="container">
            
            <form class="row g-3" method="post" >
                <div class="col-12">
                    <label>Id of faculity</label>
                    <input type="text" class="form-control" name="cid" id="cid" placeholder="Id of student to be changed">
                  </div>
                <div class="col-md-6">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="fname" id="fname">
                </div>
                <div class="col-md-6">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lname" id="lname">
                </div>
                <div class="col-12">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" id="address">
                </div>
                <div class="col-md-6">
                  <label>subject</label>
                  <input type="text" class="form-control" name="subject" id="subject">
                </div>                
                <div class="col-md-6">
                  <label>Id</label>
                  <input type="text" class="form-control" name="id" id="id">
                </div>                
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>





        </div>
<?php
if(isset($_POST['fname']) && isset($_POST['lname'])){
    $sname = "localhost";
    $uname = "root";
    $password = "";
    
    $db_name = "work2";
    
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    
    if (!$conn) {
        echo "Connection failed!";
        exit();
    }
    

    
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}


$fname = validate($_POST['fname']);
$lname = validate($_POST['lname']);
$address = validate($_POST['address']);
$subject = validate($_POST['subject']);
$id = validate($_POST['id']);
$cid = validate($_POST['cid']);


if (empty($fname) || empty($lname) || empty($address) || empty($subject) || empty($id) || empty($cid) ) 
{
    
}
else {

    $sql = "UPDATE `work2` SET `firstname`='$fname',`lastname`='$lname',`address`='$address',`subject`='$subject',`id`='$id' WHERE id = $cid";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Thank You!<br>";
        ?>
        <div class="home">
        <a class="btn btn-dark" href="table.php" role="button">Home</a>
    </div>
        <?php
    }else {
        echo "Your message could not be sent!";
    }
}
}
else {
   
}
?>

        <script src="C:\xampp\htdocs\demo\site\jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>