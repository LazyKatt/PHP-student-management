<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>
   
        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['username'];
                $res_Email = $result['email'];
                $res_Address = $result['address'];
                $res_id = $result['id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>Your Address: <b><?php echo $res_Address ?></b>.</p> 
            </div>
          </div>
       </div>

        

    </main>
    <div class="add-student">
    <button class="btn" onclick="window.location.href='student_add.php';">Add Student</button>
    </div>
    <div class="tapcha">
        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <!-- <th>Status</th> -->
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php                  
                    $query = 'SELECT `STUDENT_ID`, `FIRST_NAME`, `EMAIL`, `AGE`, `ADDRESS` FROM `students`';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                    
                            while ($row = mysqli_fetch_assoc($result)) {
                                                
                                echo '<tr>';
                                echo '<td>'. $row['STUDENT_ID'].'</td>';
                                echo '<td>'. $row['FIRST_NAME'].'</td>';
                                echo '<td>'. $row['EMAIL'].'</td>';
                                echo '<td>'. $row['AGE'].'</td>'; // Thêm cột 'AGE' thay cho 'NAME'
                                echo '<td>'. $row['ADDRESS'].'</td>'; // Thêm cột 'ADDRESS'
                                echo '<td>';
                                echo ' <a  type="button" class="btn" href="student_edit.php?action=edit & id='.$row['STUDENT_ID'] . '">Edit</a> ';
                                echo '<a type="button" class="btn" href="studentdel.php?type=student&delete&id=' . $row['STUDENT_ID'] . '" onclick="return confirm(\'Are you sure you want to delete this student?\')">Delete</a> </td>';
                                echo '</tr> ';
                    }
                ?> 
                                        
                                    </tbody>
                                </table>
                            </div>
    </div>
    
</body>
</html>