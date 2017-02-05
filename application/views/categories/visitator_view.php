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

    <link rel="stylesheet" href="./assets/acz.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .category{
        border-left: 1px solid #D3D3D3;
        border-right: 1px solid #D3D3D3;
        border-bottom: 1px solid #D3D3D3;
        margin-top: 20px;
        padding-bottom: 5px;
        text-align: center;
        display: block;
      }
      .category-picture{
        width: 100%;
        margin-top: 3px;
      }
      .category-name{
        width: 100%;
        padding: 10px;
        font-size: 130%;
      }
      .product{
        border-left: 1px solid #D3D3D3;
        border-right: 1px solid #D3D3D3;
        border-bottom: 1px solid #D3D3D3;
        margin-top: 20px;
        display: block;
        text-align: center;
      }
      .product-picture{
        height: 190px;
      }
      .product-picture img{
        max-height: 190px;
      }
      .product-price{
        font-size: 150%;
      }
      .product-price-currency{
        font-size: 90%;
      }

    </style>
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
        <div class="col-md-12"><h1><?=$selected_category['name']?></h1></div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <?php foreach( $breadcrumbs as $breadcrumb ){ ?>
            <li><a href="<?php echo site_url().$breadcrumb['slug']; ?>"><?=$breadcrumb['name'] ?></a></li>
            <?php } ?>
          </ol>
        </div>
      </div>


              <!-- show subcategories -->

              <div class="row">
              
              <?php foreach($categories as $category){
                  if($category['parent_id'] == $selected_category['id']){ ?>

                    <div class="col-md-3 col-sm-6">
                    
                      <div class="category">
                      <a href="<?php echo site_url().$category['slug'] ?>">
                      <div class="category-name"><?=$category['name'] ?></div>
                      <div class="category-picture text-center">
                        <img style="max-height: 200px; max-width: 100%;" src="<?php echo site_url().'uploads/categories/'.$category['picture_name'] ?>" alt="">
                      </div>
                        
                      </a>
                      </div>
                      
                    </div>

              <?php }} ?>

              </div>

              <!-- end of subcategories -->

              <!-- show products -->

              <div class="row">

              <?php foreach( $products as $product ){ ?>

              <div class="col-md-3 col-sm-6">

                <div class="product">
                  <div class="row product-picture">
                    <div class="col-md-12">
                      <img src="<?php echo site_url().'uploads/products/'.$product['featured_picture_name']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <span class="product-price"><?php echo ( $product['price'] == 0 ) ? $product['price_list'] : $product['price']; ?></span>
                      <span class="product-price-currency">LEI</span>
                    </div>
                  </div>
                  <div class="row product-name">
                    <div class="col-md-10 col-md-offset-1">
                      <?=$product['name'] ?>
                    </div>
                  </div>
                  <div class="row product-footer">
                    <div class="col-md-2 col-md-offset-9">
                      <a href="<?php echo site_url().$product['slug']; ?>">Detalii</a>
                    </div>
                  </div>


                </div>

              </div>

              <?php } ?>

              </div>

              <!-- end of products -->
              
             

              

              
          

      </div>

      





    </div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>


  </body>
</html>