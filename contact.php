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


      <section style="min-height:90vh;" class="contact_area section_gap">
      <div class="container">
       
            <!--================ end map =================-->

    <!--================start Contact with our dealers form =================-->
<center>
<h1>Fill it</h1>
</center>
<br>
        <div class="row">
          <div class="col-lg-3">
            <div class="contact_info">
              <div class="info_item">
              <i class="fa-solid fa-location-dot"></i>
                <h6>Karachi, Pakistan</h6>
                <p>Aptech North Nazimabad</p>
              </div>
              <div class="info_item">
              <i class="fa-solid fa-phone-volume"></i>
                <h6><a href="#">+92 293123121</a></h6>
                <p>Mon to sun 9am to 9pm</p>
              </div>
              <div class="info_item">
              <i class="fa-solid fa-globe"></i>     
                <h6><a href="index.php">onlinebookstore@gmail.com</a></h6>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>
      
          <div class="col-lg-9">
          <div class="contact-form">
    <form action="" method="POST" id="contactform" onsubmit="alert('Thank you for your message!we will get back to you soon.')";>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="text" class="form-control" name="firstname" placeholder="Your First Name" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="lastname" placeholder="Your Last Name" required>
                </div>
                <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email"
                 required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <textarea class="form-control" name="message" placeholder="Your Message" rows="5" required></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning" value="submit">Submit</button>
    </form>
</div>




      </div>
      
    </section>


      <?php require('partials/_footer.php')  ?>


    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    </body>
</html>