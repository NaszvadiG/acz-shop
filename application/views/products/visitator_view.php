<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$_SESSION['website_settings']['website_name']?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=base_url()?>assets/main.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/product.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">

      <div class="row header">
        <div class="col-md-3 logo">
          <a href="<?=$_SESSION['website_settings']['website_url']?>"><?=$_SESSION['website_settings']['website_name']?></a>
        </div>
        <div class="col-md-4 col-md-offset-5 contacts">
          <a href="mailto:<?=$_SESSION['website_settings']['email']?>" class="email"><?=$_SESSION['website_settings']['email']?></a>
            <a href="tel:<?=$_SESSION['website_settings']['phone']?>"><?=$_SESSION['website_settings']['phone']?></a>
        </div>
      </div>

      <?php
        require_once(APPPATH.'views/includes/menu_visitator.php');
      ?>

      <div class="row">
        <div class="col-md-7">
          
          <div class="product">
            
            <div class="row">
              <div class="col-md-12">
                <h3><?=$product['name'] ?></h3>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="well">
                  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <?=nl2br($product['description']) ?>
              </div>
            </div>
          </div>

          <pre><?php print_r($product); ?></pre>

        </div>
        
        <!-- #################################     GALLERY     #################################### -->
        
        <div class="gallery">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-12">
                <img src="<?php echo site_url().'uploads/products/'.$product['featured_picture_name']; ?>" class="img-responsive">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
              <div class="col-md-4">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
              <div class="col-md-4">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
            </div>
          </div>
        </div>

        <!-- #################################    END OF GALLERY     #################################### -->

      </div>


 
    </div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>