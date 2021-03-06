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
          <h1>First page groups</h1>

            <div class="panel panel-warning">
                <div class="panel-body">
                    This page is managed through mysql console. <br>
                    Talk with webmaster for changes.
                </div>
            </div>

          <?php if( count($groups) == 0 ){ ?>
            <div>There are no groups setted yet.</div>
          <?php }else{ ?>
        
            <!-- showing groups tables -->

            <?php foreach( $groups as $group ){ ?>
            
            <div class="row" style="margin-top: 60px;">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Group: <?=$group['name']?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $group['products'] as $product ){ ?>
                                <tr>
                                    <td><?=$product['name']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php } ?>
            
            <!-- end of showing groups tables -->

          <?php } ?>

       
        </div>
      </div>
    </div>


    

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>