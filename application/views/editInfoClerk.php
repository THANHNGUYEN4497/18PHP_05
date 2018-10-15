<!DOCTYPE html>
<html lang="en"><head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>php_mvc_2.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap4.css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>php_mvc_2.css">
</head>
<body >
	<h1 class="text-center display-3">EDIT INFO CLERKS</h1>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 text-center">
				<form action="<?= base_url() ?>index.php/manageClerkController/updateData" method="post" role="form" enctype="multipart/form-data">
				 <div class="row">
				 	<?php foreach ($dataEachClerk as $key => $value): ?>
				 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-right">
				 		 <input type="hidden" name="id" value="<?= $value['Id'] ?>" placeholder="ID of Database" class="form-control" id="name" >
					</div>
				 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="name" class="form-control-label">Name of Clerk</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="name" value="<?= $value['Name'] ?>" placeholder="Name Of Clerk" class="form-control" id="name" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 ">
							<label for="avartar" class="">Avartar</label>
						</div>
						<div class=" col-lg-8 ">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-3">
									<img class="img-responsive img-fluid" src="<?= $value['Avartar'] ?>"></img>
								</div>
							</div>
						  <input type="file" name="avartar" value="" placeholder="Your Avartar" class="form-control">
						  <input type="hidden" name="avartar2" value="<?= $value['Avartar'] ?>" placeholder="">
						</div>
						</div>
					</div>
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="age" class="form-control-label">Age of Clerk</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="age" value="<?= $value['Age'] ?>" placeholder="Age Of Clerk" class="form-control" id="age" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="phone" class="form-control-label">Phone Number</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="phone" value="<?= $value['PhoneNumber'] ?>" placeholder="Phone Number" class="form-control" id="phone" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="numberOfOrder" class="form-control-label">Number of Order</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="numberOfOrder" value="<?= $value['NumberOfOrder'] ?>" placeholder="Age Of Clerk" class="form-control" id="numberOfOrder" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="email" class="form-control-label">Email</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="email" value="<?= $value['Email'] ?>" placeholder="Age Of Clerk" class="form-control" id="email" >
						</div>
						</div>
					</div>
					<div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 button">
						<button type="submit" class="btn btn-success">Save And Changes</button>
						<button type="reset" class="btn btn-primary">Reset</button>
					</div>
					<?php endforeach ?>
				</form>
			</div>
			</div>
		</div>
	</div>
</body>
</html>