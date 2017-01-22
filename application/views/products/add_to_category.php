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
        <div class="col-md-8 col-md-offset-2">
          <h1>Add product to category</h1>
          <dl class="dl-horizontal">
            <dt>SKU</dt>
            <dd><?=$product['sku']?></dd>
            <dt>Name</dt>
            <dd><?=$product['name']?></dd>
            <dt>Current category</dt>
            <dd><?=$product['category_name']?></dd>
          </dl>
          <p>Select a category from below.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <table class="table">
            <?php foreach( $categories as $category ){
              if( $category['parent_id'] == 0 ){ ?>
                <tr>
                  <td><a href="<?=site_url('product/add_to_category_action')?>/<?=$product['id']?>/<?=$category['id']?>"><?=$category['name']?></a></td>
                </tr>
                  <?php foreach( $categories as $subcategory ){
                    if ( $subcategory['parent_id'] == $category['id'] ){ ?>
                      <tr>
                        <td style="padding-left: 20px;">
                          <a href="<?=site_url('product/add_to_category_action')?>/<?=$product['id']?>/<?=$subcategory['id']?>"><?=$subcategory['name']?></a>
                        </td>
                      </tr>
                      <?php foreach( $categories as $subsubcategory ){
                        if ( $subsubcategory['parent_id'] == $subcategory['id'] ){ ?>
                          <tr>
                            <td style="padding-left: 40px;">
                              <a href="<?=site_url('product/add_to_category_action')?>/<?=$product['id']?>/<?=$subsubcategory['id']?>"><?=$subsubcategory['name']?></a>
                            </td>
                          </tr>
                      <?php } } ?>
                  <?php } } ?>
            <?php } } ?>
          </table>
          <div class="btn-group" role="group">
            <a href="<?=site_url('product/index')?>" class="btn btn-default">Cancel</a>
            <a href="<?=site_url('product/add_to_category_action')?>/<?=$product['id']?>/0" class="btn btn-default">None</a>
            <a href="<?=site_url('category/index')?>" class="btn btn-default">New category</a>
          </div>
        </div>
      </div>
    </div>


    

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>