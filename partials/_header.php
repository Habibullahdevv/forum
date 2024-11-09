<?php
session_start();
   require('partials/_db.php');

echo  '

<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top  Categories
          </a>
          <ul class="dropdown-menu">';
          

          $sql = "SELECT category_name, category_id FROM `categories` LIMIT 5 ";

          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
  $catid = $row['category_id'];

  echo '
            <li><a class="dropdown-item" href="threads.php?catid='.$catid.'">'.$row['category_name'].'</a></li>
            ';
          
          }
            echo '
            </ul>
          </li>
          
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
        <form class="d-flex" role="search" action="search.php" method="get"> 
          <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
        
        <p class="text-light mx-3 my-0  ml-3">
          welcome&nbsp;' . $_SESSION['username'] . '
        </p>';
        
        echo '
        <a href="partials/_logout.php" class="btn btn-outline-danger">Logout</a>';
      }
else{

      echo'
      <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
      <div class="mx-2">

    <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
  }


    echo'

    </div>
  </div>
</nav>';

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true" ){
echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
          <strong>Success! </strong>Your can now login!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" ){
echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
          <strong>Not registered! </strong>you are not signup please signup again.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}



if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true" ){
echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
          <strong>Success! </strong>Your are loggedin
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" ){
echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
          <strong>Wrong password! </strong>you are not login.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "emaildonotexists" ){
echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
          <strong>email donot exists! </strong>please signup.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
?>