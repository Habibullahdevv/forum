<?php
        $showerror = "false";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $showalert = false;
        
    require('_db.php'); 

    $username = $_POST['username'];
    $useremail = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    $existssql = "SELECT * FROM `users` WHERE user_email='$useremail'";  
        $result = mysqli_query($conn, $existssql);
    echo "$username";
    $numrows = mysqli_num_rows($result);
      if($numrows>0){

                $showerror = 'Email already exists';
       }
        else{

         if($pass == $cpass){

            $hashpass = password_hash($pass, PASSWORD_DEFAULT);
             $sql = "INSERT INTO `users` (`username`, `user_email`, `user_pass`, `timestamp`) VALUES ('$username', '$useremail', '$hashpass', current_timestamp());";   
         
             $result = mysqli_query($conn,$sql);
            if($result){
                $showalert = true;
header("location: /forums/index.php?signupsuccess=true");
exit();
            }
            }
            else{
            $showerror = "Password do not match";
            

            }
        }
        header("location: /forums/index.php?signupsuccess=false&error=$showerror");

        // header("location: /forums/index.php?");
    }
?>