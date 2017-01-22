<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$_SESSION['website_settings']['website_name']?> - admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      require_once(APPPATH.'views/includes/menu_admin.php');
    ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>Products Management</h1>
          <p><a href="<?=site_url('product/create')?>">Create a new product</a></p>
          <table class="table">
            <thead>
              <tr><th>Picture</th><th>SKU</th><th>Name<br><small><i>Slug</i></small></th><th>Price List</th><th>Price</th><th>Category</th><th></th></tr>
            </thead>
            <tbody>
              <?php foreach( $products as $product ) { ?>
                <tr>
                  <td><img src="<?=site_url()?>uploads/products/<?=$product['featured_picture_name']?>" alt="" class="img-thumbnail" style="max-width: 60px; max-height: 60px;"><br><a href="<?=site_url('product/upload_pictures')?>/<?=$product['id']?>"><small><i>Manage</i></small></a></td>
                  <td><?=$product['sku']?></td>
                  <td><?=$product['name']?><br><small><i><?=$product['slug']?></i></small></td>
                  <td><?=$product['price_list']?></td>
                  <td><?=$product['price']?></td>
                  <td>
                    <?=$product['category_name']?><br>
                    <a href="<?=site_url('product/add_to_category')?>/<?=$product['id']?>"><small><i>Change</i></small></a>
                  </td>
                  <td>
                    <a href="<?=site_url('product/edit')?>/<?=$product['id']?>">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          
        </div>
      </div>
    </div>


    

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>