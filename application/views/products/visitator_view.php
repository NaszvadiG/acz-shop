<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$_SESSION['website_settings']['website_name']?></title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/lightbox/jquery.lightbox.css">


    <link rel="stylesheet" href="<?=base_url()?>assets/acz.css">
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
        <div class="col-md-12">
          <ol class="breadcrumb">
            <?php foreach( $breadcrumbs as $breadcrumb ){ ?>
            <li><a href="<?php echo site_url().$breadcrumb['slug']; ?>"><?=$breadcrumb['name'] ?></a></li>
            <?php } ?>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12"><h1><?=$product['name'] ?></h1></div>
      </div>
      <div class="row">
        <div class="col-md-12"><div class="product-sku">Cod produs: <?=$product['sku'] ?></div></div>
      </div>

      <div class="row">
        <div class="col-md-7">
          
          
            
            
          <div class="row">
            <div class="col-md-12">
              <div class="product-price">
                Pret: <?php echo ( $product['price'] == 0 ) ? $product['price_list'] : $product['price']; ?> Lei
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="product-description">
                  <?=nl2br($product['description']) ?>
                </div>
              </div>
            </div>
         

        </div>
        
        <!-- #################################     GALLERY     #################################### -->
        
        <div class="gallery">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo site_url().'uploads/products/'.$product['featured_picture_name']; ?>"><img src="<?php echo site_url().'uploads/products/'.$product['featured_picture_name']; ?>" class="img-responsive"></a>
              </div>
            </div>
            <div class="row">
              <?php foreach( $product['pictures'] as $picture ){ ?>
                <div class="col-md-3">
                  <a href="<?php echo site_url().'uploads/products/'.$picture['name'] ?>"><img src="<?php echo site_url().'uploads/products/'.$picture['name'] ?>" class="img-responsive"></a>
                </div>
              <?php } ?>
              
            </div>
          </div>
        </div>

        <!-- #################################    END OF GALLERY     #################################### -->

      </div>


 
    </div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/lightbox/jquery.lightbox.js"></script>
    <script>
       $(function()
         {
          $('.gallery a').lightbox(); 
        });
    </script>

  </body>
</html>