<?php 
session_start();

include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    $firstName = $_POST['first_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $insertQuery = mysqli_query($con, "INSERT INTO students (FIRST_NAME, EMAIL, AGE, ADDRESS) VALUES ('$firstName', '$email', '$age', '$address')");

    if($insertQuery){
        echo "<script>alert('Student added successfully.'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Error occurred while adding the student.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Add Student</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <header>Add New Student</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="first_name">Name</label>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Add Student">
                </div>
            </form>
        </div>
    </div>
</body>
</html>