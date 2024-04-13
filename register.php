<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];

            // Kiểm tra mật khẩu nhập lại
            if($password !== $re_password){
                echo "<div class='message'><p>Passwords do not match. Please try again.</p></div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                exit;
            }

            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Kiểm tra email đã tồn tại chưa
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message'>
                          <p>This email is used, Try another One Please!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                // Chèn dữ liệu vào bảng users
                mysqli_query($con,"INSERT INTO users(Username,Email,Password,Address,Gender) VALUES('$username','$email','$hashed_password','$address','$gender')") or die("Error Occured");

                echo "<div class='message'>
                          <p>Registration successfully!</p>
                      </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="re_password">Re-enter Password</label>
                    <input type="password" name="re_password" id="re_password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>