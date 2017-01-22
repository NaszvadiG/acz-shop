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
      .small-pic{
        max-width: 170px;
        margin-bottom: 3px;
      }
    </style>

  </head>
  <body>
    <?php
      require_once(APPPATH.'views/includes/menu_admin.php');
    ?>

    <div class="container">
      <?php if(isset($_SESSION['error'])){ ?>
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
        <div class="col-md-8 col-md-offset-2">
          <h1>Upload pictures to product</h1>
          <dl class="dl-horizontal">
            <dt>SKU</dt>
            <dd><?=$product['sku']?></dd>
            <dt>Name</dt>
            <dd><?=$product['name']?></dd>
            <dt>Category</dt>
            <dd><?=$product['category_name']?></dd>
          </dl>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?php echo form_open_multipart('product/upload_pictures_action');?>

          <input type="hidden" name="entity" value="product">
          <input type="hidden" name="entity_id" value="<?=$product['id']?>">

          <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
          </div>
          
          <button type="submit" class="btn btn-success">Upload</button>
          <a href="<?=site_url('product/index')?>" class="btn btn-default">Back</a>

          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <?=$product['featured_picture_name']?><br>
          <img src="<?=site_url()?>/uploads/products/<?=$product['featured_picture_name']?>">
        </div>
        <div class="col-md-6">
          <!-- SMALL PICTURES -->

          <?php $counter = 1; foreach( $product['pictures'] as $picture ){ 
            if( $counter % 2 != 0 ){ ?>
              <div class="row" style="padding-top: 15px">
                <div class="col-md-6">
                  <?=$picture['name']?><br>
                  <img src="<?=site_url()?>uploads/products/<?=$picture['name']?>" class="small-pic img-thumbnail" alt=""><br>
                  <div class="btn-group" role="group">
                    <a href="<?=site_url('product/set_default_picture')?>/<?=$product['id']?>/<?=$picture['id']?>" class="btn btn-default">Set as default</a>
                    <a href="<?=site_url('product/delete_picture')?>/<?=$product['id']?>/<?=$picture['id']?>" class="btn btn-default">Delete</a>
                  </div>
                </div>
            <?php }else{ ?>
              <div class="col-md-6">
                <?=$picture['name']?><br>
                <img src="<?=site_url()?>uploads/products/<?=$picture['name']?>" class="small-pic img-thumbnail" alt=""><br>
                <div class="btn-group" role="group">
                  <a href="<?=site_url('product/set_default_picture')?>/<?=$product['id']?>/<?=$picture['id']?>" class="btn btn-default">Set as default</a>
                  <a href="<?=site_url('product/delete_picture')?>/<?=$product['id']?>/<?=$picture['id']?>" class="btn btn-default">Delete</a>
                </div>
              </div>
              </div><!-- end of row -->
            <?php }
           $counter++; } ?>

          <!-- END OF SMALL PICTURES -->
        </div>
      </div>

    </div>


    

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>