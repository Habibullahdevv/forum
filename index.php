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
    

      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img style="height:600px; width: 100%;" src="https://tse2.mm.bing.net/th?id=OIP.4TzG2Zjoh9yM6Zag_5I7xwHaEw&pid=Api&P=0&h=220" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item"> 
            <img style="height: 600px; width: 100%;   "  src="https://images.pexels.com/photos/574071/pexels-photo-574071.jpeg?auto=compress&cs=tinysrgb&w=400" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item background-size: contain; background-repeat: no-repeat; background-position: top;">
            <img style="height: 600px; width: 100%;" src="https://images.pexels.com/photos/4709286/pexels-photo-4709286.jpeg?auto=compress&cs=tinysrgb&w=400" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



   
  <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

  <h2 class="text-center my-3">iDiscuss - Categories</h2>


    <div class="row">

                <!-- fetch all categories -->
   <?php
   
   $sql = "SELECT * FROM `categories`";

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){

  $category = $row ['category_name'];
  $id = $row ['category_id'];
  $description = $row ['category_description'];

    echo '
    
        <div class="col-md-4">

        <div class="card mb-4" style="width: 18rem;">
          <img  src="https://images.unsplash.com/photo-1594904351111-a072f80b1a71?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHB5dGhvbiUyMGNvYWRpbmd8ZW58MHx8MHx8fDA%3D" style="height: 250px; width: auto;" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="threads.php?catid=' . $id . '"> ' . $category . '</a></h5>
            <p class="card-text">' .  substr($description, 0, 90) . '...</p>
            <a  href="threads.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
          </div>
        </div>


      </div>';



  }


   ?>



     

    </div>



  </div>


      <?php require('partials/_footer.php')  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>