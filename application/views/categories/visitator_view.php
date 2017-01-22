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

    <link rel="stylesheet" href="./assets/acz.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .category{
        border: 1px solid grey;
        margin: 10px;
        background-color: white;
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
        border: 1px solid grey;
        margin: 10px;
        background-color: white;
        display: block;
      }
      .product-picture{
        height: 190px;
      }

      .product-picture img{
        max-height: 190px;
        margin-left: auto;
        margin-right: auto;
      }

    </style>
  </head>
  <body>

    <div class="container-fluid">

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

      <!--    sidebar navigation      -->
        <div class="col-md-4">
          <ul class="nav nav-pills nav-stacked">
            <?php foreach( $all_categories as $category ){
                if( $category['parent_id'] ==  0 ){?>
                <li role="presentation"><a href="<?php echo site_url().$category['slug']?>"><?=$category['name']?></a></li>
            <?php }}?>
          </ul>
        </div>
<!--          end of sidebar navigation-->

          <div class="col-md-8">
              <h1>Selected category: <i><?=$selected_category['name']?></i></h1>

              <!-- show subcategories -->
              
              <?php $counter = 0; foreach($all_categories as $category){
                  if($category['parent_id'] == $selected_category['id']){
                    echo ($counter % 2 == 0) ? '<div class="row">' : ''; ?>

                    <div class="col-md-6">
                    <a href="<?php echo site_url().$category['slug'] ?>">
                      <div class="category">
                      <div class="category-picture text-center">
                        <img style="max-height: 150px; max-width: 450px;" src="<?php echo site_url().'uploads/categories/'.$category['picture_name'] ?>" alt="">
                        </div>
                        <div class="category-name"><?=$category['name'] ?></div>

                      </div>
                      </a>
                    </div>

              <?php echo ($counter % 2 == 1) ? '</div>' : ''; $counter++; }} echo ($counter % 2 == 1) ? '</div>' : ''; ?>

              <!-- end of subcategories -->

              <!-- show products -->

              <?php $counter = 0; foreach( $products as $product ){ 
                echo ($counter % 3 == 0) ? '<div class="row">' : ''; ?>

              <div class="col-md-4">

                <div class="product">
                  <div class="row product-picture">
                    <div class="col-md-12">
                      <img src="<?php echo site_url().'uploads/products/'.$product['featured_picture_name']; ?>" class="img-responsive">
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

              <?php echo ($counter % 3 == 2) ? '</div>' : ''; $counter++; } echo ($counter % 3 != 2) ? '</div>' : ''; ?>

              <!-- end of products -->
              
              </div>

              

              
          </div>

      </div>

      





    </div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  </body>
</html>