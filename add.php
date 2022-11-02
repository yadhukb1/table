<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css">


        <style>

            .home a{
                margin: 100px;
            }

            </style>
    </head>
    <body>
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


if (empty($fname) || empty($lname) || empty($address) || empty($subject) || empty($id) ) {
    header("Location: add.html");
}
else {

    $sql = "INSERT INTO `work2`(`firstname`, `lastname`, `address`, `subject`, `id`) VALUES ('$fname','$lname','$address','$subject','$id')";
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
    header("Location: add.html");
}
?>

<script src="C:\xampp\htdocs\demo\site\jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>