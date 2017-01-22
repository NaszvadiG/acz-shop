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
    <style>
      #categories-table tr td:nth-child(1){
        width:50%;
      }
    </style>
  </head>
  <body>
    <?php
      require_once(APPPATH.'views/includes/menu_admin.php');
    ?>

    <div class="container">

        <?php if( isset($_SESSION['error']) ){?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?=$_SESSION['error']?>
                    </div>
                </div>
            </div>
        <?php } ?>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1>Category Page</h1>
          <table class="table" id="categories-table">
            <thead>
              <tr><th>Category Name</th><th>Slug</th><th>Add SubCategory</th><th>Edit</th></tr>
            </thead>
            <tbody>
            <tr>
              <td>Main category</td>
              <td></td>
              <td><a href="<?=site_url('category/create/0')?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td>
              <td></td>
            </tr>
            <?php foreach( $categories as $category ){
              if( $category['parent_id'] == 0 ){ ?>
                <tr>
                  <td><?=$category['name']?></td>
                  <td><?=$category['slug']?></td>
                  <td><a href="<?=site_url('category/create/'.$category['id'])?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td>
                  <td><a href="<?=site_url('category/edit/'.$category['id'])?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                </tr>
                  <?php foreach( $categories as $subcategory ){
                    if ( $subcategory['parent_id'] == $category['id'] ){ ?>
                      <tr>
                        <td style="padding-left: 20px;"><?=$subcategory['name']?></td>
                        <td><?=$subcategory['slug']?></td>
                        <td><a href="<?=site_url('category/create/'.$subcategory['id'])?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td>
                        <td><a href="<?=site_url('category/edit/'.$subcategory['id'])?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                      </tr>
                      <?php foreach( $categories as $subsubcategory ){
                        if ( $subsubcategory['parent_id'] == $subcategory['id'] ){ ?>
                          <tr>
                            <td style="padding-left: 40px;"><?=$subsubcategory['name']?></td>
                            <td><?=$subsubcategory['slug']?></td>
                            <td></td>
                            <td><a href="<?=site_url('category/edit/'.$subsubcategory['id'])?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                          </tr>
                      <?php } } ?>
                  <?php } } ?>
            <?php } } ?>
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