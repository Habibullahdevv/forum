<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>

    .container{
min-height:100vh;

    }
  </style>
  <body>
      <?php require('partials/_db.php')  ?>
      <?php require('partials/_header.php')  ?>




     <div class="container my-3 ">

<h1 class="mb-5">Search Results For "<b><em><?php echo $_GET['query']  ?></em></b>"</h1>


<?php

$noResult = true;
$query = $_GET['query'];
$sql = "SELECT * FROM `threads` WHERE match (thread_title, thread_desc) against ('$query')";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $thread_title = $row ['thread_title'];
  $id = $row ['thread_id'];
  $thread_desc = $row ['thread_desc'];
  $noResult = false;

$url = "threaddesc.php?threadid=".$id;
echo '

     <div class="results ">
          <h3><a href="'.$url.'" class="text-dark text-decoration-none">'.$thread_title.'</a></h3>
        <p >'.$thread_desc.'</p>
        </div>

';


  }
  if($noResult){
    echo '<div class="alert alert-info mb-5" role="alert">
<h3 class="mb-5">Your search "<b><em> '.$query.' </em></b>" - did not match any Query.</h1>


    Suggestions:

<ul> Make sure that all words are spelled correctly. 
<li>Try different keywords.</li>
<li>Try more general keywords.</li>
<li>Try fewer keywords.</li>
</ul>
</div>';
    }
?>

             </div>


      <?php require('partials/_footer.php')  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>