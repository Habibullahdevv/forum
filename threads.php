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

$id = $_GET['catid'];

$sql = "SELECT * FROM `categories` WHERE category_id=$id";

$result = mysqli_query($conn, $sql);



while($row = mysqli_fetch_assoc($result)){
$category = $row ['category_name'];
$id = $row ['category_id'];
$description = $row ['category_description'];



}
?>


<?php
$showAlert =false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){

$title = $_POST['title'];

$title = str_replace("<","&lt;",$title);
$title = str_replace(">","&gt;",$title);

$desc = $_POST['desc'];

$desc = str_replace("<","&lt;",$desc);
$desc = str_replace(">","&gt;",$desc);

$sno = $_POST["sno"];
$sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) 
VALUES ('$title', '$desc', '1', '$sno', current_timestamp())";
$result = mysqli_query($conn, $sql);
$showAlert =true;

if($showAlert){

  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success! </strong>Your thread has been added please wait for community to respond.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  }

}

?>


      <div class="container mt-4 p-5 bg-secondary text-white rounded">
  <h1>Welcome To <?php echo $category ?> Forums</h1>
  <p><?php echo $description ?></p>

<hr class="my-5">

<p> <h4>Froums Rules :</h3> 
Be civil. Don't post anything that a reasonable person would consider offensive, abusive, or hate speech.
Keep it clean. Don't post anything obscene or sexually explicit. <br>
Respect each other. Don't harass or grief anyone, impersonate people, or expose their private information.
Respect our forum.</p>

<button class="btn btn-warning">View Python Thread</button>
</div>

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  echo'
  <div class="container ">
  
  <h1 class="py-4 px-4">Comment</h1>
  <form class="mb-5 " action="'. $_SERVER["REQUEST_URI"].'" method="post">
  <div class="mb-3 form-group">
  <label for="exampleFormControlInput1"  class="form-label">Problem Title</label>
  <input type="text" id="title" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
  <small class="form-text text-muted">Keep your title as short and crisp as possible</small>
  </div>
  <div class="mb-3 form-group">
  <label for="exampleFormControlTextarea1" class="form-label">Problem description</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
  <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">


</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>';
}
else{
echo '
<div class="container">
<h1 class=" pt-4">Post Comment</h1>

<div class="alert alert-info mb-5 mt-5" role="alert">
 Please Login to ask a Question! 
</div>
</div>
';

}

?>

<div class="container" id='ques'>

<h1 class="pb-5 px-0">Browse Questions Here</h1>

<?php

$id = $_GET['catid'];

$sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
$noResult = true;

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $noResult = false;

$thread_title = $row ['thread_title'];
$id = $row ['thread_id'];
$thread_desc = $row ['thread_desc'];
$comment_time = $row['timestamp']; 
$thread_user_id = $row['thread_user_id'];
$sql2 = "SELECT username FROM `users` where sno = '$thread_user_id'";

$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);



echo '<div class="d-flex pb-5">
  <div class="flex-shrink-0">
    <img src="https://tse1.mm.bing.net/th?id=OIP.Sr4fxChDzgG6T-SG4zCS8wHaHa&pid=Api&P=0&h=220" style="width:64px; height:64px; " alt="...">
  </div>
  <div class="flex-grow-1 ms-3">
<p class="fw-bold my-0">'.$row2['username'].' at '.$comment_time.'</p>
    <h5 "><a style="text-decoration:none;" class="text-dark" href="threaddesc.php?threadid=' . $id . '" >' . $thread_title . '
</a></h4>
  <p class="text-muted">' . $thread_desc . '</p>
  </div>
</div>';



}
if($noResult){
echo '<div class="alert alert-warning mb-5" role="alert">
  Be the first person to ask a Question!  
</div>';
}

?>


</div>

<?php require('partials/_footer.php')  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>