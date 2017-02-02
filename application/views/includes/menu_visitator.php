<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="wowMenu" class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Produse <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php foreach( $categories as $category ){ ?>
              <?php if( $category['parent_id'] == 0 ){ ?>
                <li><a href="<?php echo site_url().$category['slug'] ?>"><?=$category['name'] ?></a></li>
            <?php } } ?>
          </ul>
        </li>
        <li><a href="<?=site_url()?>">Home</a></li>

        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
      </ul>
    </div>
    
  </div>
</nav>