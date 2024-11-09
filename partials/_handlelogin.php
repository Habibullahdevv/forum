<?php
    
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $showalert = false;

    require('_db.php'); 
    
    $email = $_POST["loginemail"]; 
    $pass = $_POST["loginpass"];
   
    
$sql = "SELECT * FROM users where user_email='$email' ";     
$result = mysqli_query($conn, $sql);

$numrows = mysqli_num_rows($result);
  if($numrows==1){
   $rows = mysqli_fetch_assoc($result);
   if(password_verify($pass, $rows['user_pass'])){

session_start();

$_SESSION['loggedin'] = true;
$_SESSION['useremail'] = $email;
$_SESSION['username'] = $rows['username'];
$_SESSION['sno'] = $rows['sno'];
  echo "logged in as " . $_SESSION['username'];

   
   
  $showalert = true;

   header("location: /forums/index.php?loginsuccess=true");
exit();
// echo "unable to login"; 
}
else{
   header("location: /forums/index.php?loginsuccess=false&error=wrongpassword");


}


}

else{
   header("location: /forums/index.php?loginsuccess=emaildonotexists");


}
}


?>