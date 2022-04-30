<?php
include('./bdd.php');
include('./fonction.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/59ecaaffaa.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>

    <div class="row">
      <div class="container">
        <div class="section">
           <?php
           OneReceipe();
           ?>
        </div>
        </div>
      </div>
    </div>


  </body>
</html>