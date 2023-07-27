<?php
// error_reporting(0);
$insert=false;
if(isset($_POST['name'])){
    //Set connection variables
$server ="localhost";
$username ="root";
$password ="";

//Create a database connection
$con= mysqli_connect($server ,$username ,$password);

//check for connection success
if(!$con)
{
    die("connection to this data failed due to" .mysqli_connect_error());
}
//echo "success connecting to the db";


//Collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];


$sql=" INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', '2023-07-27 18:41:08.000000');";

//echo $sql;

//Execute the query

//Flag for successfull insertion
if($con->query($sql) == true){
   // echo "Successfully inserted";
   $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
//Close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Roboto:wght@300&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="LNCT Bhopal" >
    <div class="container">
        <h1>Welcome To LNCT US trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert ==true)
        {
       echo  "<p class='submitMsg'>Thanks for submitting the form .We are happy that you wanna join with us.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">submit</button>
           
        </form>
    </div>
    <script src="index.js"></script>

    
</body>
</html>