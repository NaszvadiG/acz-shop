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

    <script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: '#description',
        theme: 'modern',
        relative_urls: false,
        remove_script_host : false,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor responsivefilemanager'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | responsivefilemanager',
        image_advtab: true ,
        external_filemanager_path:"<?php echo base_url(); ?>assets/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "<?php echo base_url(); ?>assets/filemanager/plugin.min.js"}
      });
    </script>

  </head>
  <body>
    <?php
      require_once(APPPATH.'views/includes/menu_admin.php');
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Edit product</h1>
          <h3><?=$product['name']?></h3>

          <?php echo form_open('product/edit/'.$product['id']); ?>

          <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control" value="<?=$product['sku']?>" />
          </div>

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?=$product['name']?>" />
          </div>

          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?=$product['slug']?>" />
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?=$product['description']?></textarea>
          </div>

          <div class="form-group">
            <label for="price_list">Price List</label>
            <input type="text" name="price_list" id="price_list" class="form-control" value="<?=$product['price_list']?>">
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="<?=$product['price']?>">
          </div>

          
          <?php echo validation_errors(); ?>
          <a href="<?php echo site_url('product/index'); ?>" class="btn btn-default">Back</a>
          <button type="submit" class="btn btn-success">Update</button>

        </form>
        </div>
      </div>
    </div>


    

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>