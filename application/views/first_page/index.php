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


    <link rel="stylesheet" href="./assets/slick/slick.css">
    <link rel="stylesheet" href="./assets/slick/slick-theme.css">
    <link rel="stylesheet" href="./assets/acz.css">
    <link rel="stylesheet" href="./assets/index.css">

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

        <?php if( isset( $_SESSION['error'] ) ){?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?=$_SESSION['error']?>
                    </div>
                </div>
            </div>
        <?php }?>

      <div class="row">

      <!--    sidebar navigation      -->
        <div class="col-md-4">
          <ul class="nav nav-pills nav-stacked">
            <?php foreach( $categories as $category ){
                if( $category['parent_id'] ==  0 ){?>
                <li role="presentation"><a href="<?php echo site_url().$category['slug']?>"><?=$category['name']?></a></li>
            <?php }}?>
          </ul>
        </div>
<!--          end of sidebar navigation-->

        <div class="col-md-8">
          <div class="carousel">
            <div><img src="http://placehold.it/1000x500/fafafa" class="img-responsive"></div>
            <div><img src="http://placehold.it/1000x500/aaaaaa" class="img-responsive"></div>
            <div><img src="http://placehold.it/1000x500/dadada" class="img-responsive"></div>
          </div>
        </div>
      </div>

      <?php
      require_once(APPPATH.'views/includes/menu_visitator.php');
      ?>

      <div class="row">
        <div class="col-md-12">
          <h3>Produse recomandate</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">

          <div class="product">
            <div class="row product-image">
              <div class="col-md-12">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
            </div>
            <div class="row product-name">
              <div class="col-md-10 col-md-offset-1">
                Vitrina pentru ingrediente
              </div>
            </div>
            <div class="row product-footer">
              <div class="col-md-2 col-md-offset-9">
                <a href="#">Detalii</a>
              </div>
            </div>


          </div>

        </div>

        <div class="col-md-4">

          <div class="product">
            <div class="row product-image">
              <div class="col-md-12">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
            </div>
            <div class="row product-name">
              <div class="col-md-10 col-md-offset-1">
                Vitrina pentru ingrediente
              </div>
            </div>
            <div class="row product-footer">
              <div class="col-md-2 col-md-offset-9">
                <a href="#">Detalii</a>
              </div>
            </div>


          </div>

        </div>

        <div class="col-md-4">

          <div class="product">
            <div class="row product-image">
              <div class="col-md-12">
                <img src="http://placehold.it/1000x500" class="img-responsive">
              </div>
            </div>
            <div class="row product-name">
              <div class="col-md-10 col-md-offset-1">
                Vitrina pentru ingrediente
              </div>
            </div>
            <div class="row product-footer">
              <div class="col-md-2 col-md-offset-9">
                <a href="#">Detalii</a>
              </div>
            </div>


          </div>

        </div>
      </div>

    </div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="./assets/slick/slick.js"></script>

    <script type="text/javascript">

      $(document).ready(function(){
        $('.carousel').slick({
          dots : true,
          arrows : true,
          autoplay : true,
          slidesToShow: 1
        });
      });
    </script>

  </body>
</html>