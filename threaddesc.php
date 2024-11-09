<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
      <?php require('partials/_header.php')  ?>
      <?php require('partials/_db.php')  ?>

<?php

$id = $_GET['threadid'];

$sql = "SELECT * FROM `threads` WHERE thread_id=$id";


$noResult = true;

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $noResult = false;


    $thread_title = $row ['thread_title'];
    $id = $row ['thread_id'];
    $thread_desc = $row ['thread_desc'];
    $thread_user_id = $row['thread_user_id'];
    $sql2 = "SELECT username FROM `users` where sno = '$thread_user_id'";

$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);
$posted_by = $row2['username'];




}



?>

<?php
$showAlert =false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){

$comment = $_POST['comment'];
$sno = $_POST["sno"];

$comment = str_replace("<","&lt;",$comment);
$comment = str_replace(">","&gt;",$comment);

$sql = "INSERT INTO `comments` ( `comment_by`, `comment_content`, `thread_id`, `comment_time`) 
VALUES ( '$sno', '$comment', '$id', current_timestamp());";
$result = mysqli_query($conn, $sql);
$showAlert =true;

if($showAlert){

  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success! </strong>Your comment has been added!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  }

}

?>


      <div class="container mt-4 p-5 bg-secondary text-white rounded">
  <h1><?php echo $thread_title ?></h1>
  <p><?php echo $thread_desc ?></p>

<hr class="my-5">

<p> <h4>Froums Rules :</h3> 
Be civil. Don't post anything that a reasonable person would consider offensive, abusive, or hate speech.
Keep it clean. Don't post anything obscene or sexually explicit. <br>
Respect each other. Don't harass or grief anyone, impersonate people, or expose their private information.
Respect our forum.</p>

<p >Posted by:<b class='text-warning'> <?php echo $posted_by ?></b></p>

</div>
    <?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  echo '

<div class="container ">

<h1 class="py-4 px-4">Post a Comment</h1>
<form class="mb-5 " action=" '.$_SERVER["REQUEST_URI"] .'" method="post">

<div class="mb-3 form-group">
  <label for="exampleFormControlTextarea1" class="form-label">Type your Comment</label>
  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">

</div>
<button type="submit" class="btn btn-primary">Post Comment</button>

</form>
</div>';
    }
else{
  echo '
  <div class="container">
  <h1 class=" pt-4">Post Comment</h1>
  
  <div class="alert alert-info mb-5 mt-5" role="alert">
   Please Login to post a comment! 
  </div>
  </div>
  ';
  
}

?>

<div style="margin-bottom:333px;" class="container">

<h1  class="py-4 px-4">Browse Discussion</h1>

<?php

$id = $_GET['threadid'];

$sql = "SELECT * FROM `comments` WHERE thread_id=$id";
$noResult = true;

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $noResult = false;

$id = $row ['comment_id'];
$content = $row ['comment_content'];
$comment_time = $row['comment_time']; 
$thread_user_id = $row['comment_by']; 
$sql2 = "SELECT username FROM `users` where sno = '$thread_user_id'";

$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);






echo '<div class="d-flex pb-3">
  <div class="flex-shrink-0">
    <img src="https://tse1.mm.bing.net/th?id=OIP.Sr4fxChDzgG6T-SG4zCS8wHaHa&pid=Api&P=0&h=220" style="width:64px; height:64px; " alt="...">
  </div>
  <div class="flex-grow-1 ms-3 media-body">
<p class="fw-bold my-0">'.$row2['username'].' '.$comment_time.'</p>

  ' . $content . '
  </div>
</div>';



}
if($noResult){
echo '<div class="alert alert-info mb-5" role="alert">
  Be the first person to ask a Question!  
</div>';
}

?>


</div>

<?php require('partials/_footer.php')  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>