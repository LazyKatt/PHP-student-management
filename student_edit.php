<?php 
session_start();

include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
}

$studentId = isset($_GET['id']) ? $_GET['id'] : '';
$studentData = [];

if($studentId) {
    $query = mysqli_query($con, "SELECT * FROM students WHERE STUDENT_ID = $studentId");
    $studentData = mysqli_fetch_assoc($query);
}

if(isset($_POST['submit'])){
    $firstName = $_POST['first_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $updateQuery = mysqli_query($con, "UPDATE students SET FIRST_NAME='$firstName', EMAIL='$email', AGE='$age', ADDRESS='$address' WHERE STUDENT_ID=$studentId");

    if($updateQuery){
        echo "<script>alert('Student profile updated successfully.'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Error occurred while updating.');</script>";
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
    <title>Edit Student Profile</title>
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
            <header>Edit Student Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="first_name">Name</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $studentData['FIRST_NAME']; ?>" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $studentData['EMAIL']; ?>" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $studentData['AGE']; ?>" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $studentData['ADDRESS']; ?>" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>