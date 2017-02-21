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



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Login</h1>
			<?php echo form_open('user/login'); ?>
				<input type="hidden" name="referrer" value="<?php echo $_SESSION['login_referrer'];?>">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Login</button>
				<?php echo validation_errors(); ?>
				<?php echo isset($error) ? $error : ''; ?>
			</form>
		</div>
	</div>
</div>


</body>
</html>