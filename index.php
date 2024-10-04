<?php
$insert = false;
if(isset($_POST['name'])) {
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";



    // crearte a database connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection succses
    if (!$con) {
        die("connection to databse failed" . mysqli_connect_error());
    }
    //  echo "Successfully connected to the database"

    // collect post variable
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $Mobile = $_POST['Mobile'];
    $description = $_POST['description'];
    // $other = $_POST['other'];
    $sql= "INSERT INTO `formfirst` . `formfirst` (`name`, `gender`, `age`, `email`, `Mobile`, `description`, `other`) VALUES ('$name', '$gender', '$age', '$email', '$Mobile', '$description', current_timestamp());";


    // echo $sql;

    // execute the query
    if($con->query($sql)==true) {
        // echo "succesfully connected to Database";

        // flag for succesfull insertion
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
        // $not_insert = true;
    }

    // close the databse connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img class= "bg" src="bg.jpg" alt="Travel form">
    <div class="container">
        <h1>Wellcome to the travel partner</h1>
        <p>Fill the below form </p>
        <?php
        if($insert == true) {
       echo "<p class='Submiting'>Thanks for submitting the Form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text"  name="name" id="name " placeholder="Enter your name as per Adhar Card">
            <input type="text"  name="gender" id="gender " placeholder="Enter your gender">
            <input type= "number" name= "age" id="age " placeholder="Enter your age">
            <input type="email" name="email" id="email " placeholder="Enter your email">
            <input type="tel" name="Mobile" id="Mobile" placeholder="Enter your Mobile number">
            <textarea name = "description" id="description" cols="10" rows="10" placeholder="write some aditional informartion"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>


        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>