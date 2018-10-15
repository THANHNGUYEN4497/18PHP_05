<!DOCTYPE html>
<html lang="en"><head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>php_mvc_2.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>vendor/jquery.fileupload.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap4.css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>php_mvc_2.css">
</head>
<body >
	<h1 class="text-center display-3">LIST OF CLERKS</h1>
	<hr>
	<div class="container thumbnailClerk">
		<div class="row ">
			<?php foreach ($dataClerk as $key => $value): ?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 thumbnail">
	            <img class="img-fluid" src="<?= $value['Avartar'] ?>" alt="">
				<h4><strong>Name:</strong><?= $value['Name'] ?></h4>
				<h5><strong>Age:</strong><?= $value['Age'] ?></h5>
				<p><strong>Phone Number:</strong><?= $value['PhoneNumber'] ?></p>
				<p><strong>NumberOfOrder:</strong><span class="badge badge-danger"><?= $value['NumberOfOrder'] ?></span> </p>
				<p><strong>Email:</strong><?= $value['Email'] ?></p>
				<hr>
				<p class="text-muted pull-right"><small>Last update 3 minutes</small></p>
				<div class="button pull-left">
					<a href="<?= base_url() ?>index.php/manageClerkController/deleteData/<?= $value['Id'] ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
					<a href="<?= base_url() ?>index.php/manageClerkController/editData/<?= $value['Id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
				</div>
		    </div>
		    <?php endforeach ?>
		</div>
	</div>
	<hr>
		<h1 class="text-center display-3">ADD OF CLERKS</h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 text-center">
				<form action="<?= base_url() ?>index.php/manageClerkController/insertData" method="post" role="form" enctype="multipart/form-data">
				 <div class="row">
				 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="name" class="form-control-label">Name of Clerk</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="name" value="" placeholder="Name Of Clerk" class="form-control" id="name" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 ">
							<label for="avartar" class="">AvartarProcessByAjax</label>
						</div>
						<div class=" col-lg-8 ">
						  <input type="file" name="files[]" value="Your Avartar" placeholder="Your Avartar" class="form-control" id="avartar">
						</div>
						 <div class=" col-lg-4 ">
							<label for="avartar" class="">AvartarProcessByPhp</label>
						</div>
						<div class=" col-lg-8 ">
						  <input type="file" name="avartar" value="Your Avartar" placeholder="Your Avartar" class="form-control" id="avartar">
						</div>
						</div>
					</div>
                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="age" class="form-control-label">Age of Clerk</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="age" value="" placeholder="Age Of Clerk" class="form-control" id="age" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="phone" class="form-control-label">Phone Number</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="phone" value="" placeholder="Phone Number" class="form-control" id="phone" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="numberOfOrder" class="form-control-label">Number of Order</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="numberOfOrder" value="" placeholder="Age Of Clerk" class="form-control" id="numberOfOrder" >
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group text-right">
						<div class="row">
						<div class=" col-lg-4 " >
							<label for="email" class="form-control-label">Email</label>
						</div>
						<div class="col-lg-8 ">
						  <input type="text" name="email" value="" placeholder="Age Of Clerk" class="form-control" id="email" >
						</div>
						</div>
					</div>
					<div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 button">
						<button type="submit" class="btn btn-info">Submit</button>
						<button type="button" class="btn btn-success buttonJqueryAjax">ProcessByJqueryAjax</button>
						<button type="reset" class="btn btn-primary">Reset</button>
					</div>
	        </form>
			</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	linkUrl = '<?php echo base_url() ?>';
	$('#avartar').fileupload({
		url:linkUrl+'/index.php/manageClerkController/uploadFilesJquery',
		dataType : 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file){
               nameOfFile = file.url;
            });
        }
	}) 
	$('.buttonJqueryAjax').click(function(){
       $.ajax({
	  url: 'insertDataByAjax',
	  type: 'POST',
	  dataType: 'json',
	  data: {
	  name: $('#name').val(),
      age: $('#age').val(),
      phone : $('#phone').val(),
      avartar : nameOfFile,
      numberOfOrder : $('#numberOfOrder').val(),
      email : $('#email').val()
    },
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
		addContent ='<div class="container thumbnailClerk">'
		addContent+='<div class="row ">'
		addContent+='<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 thumbnail">';
		addContent+='<img class="img-fluid" src=" '+nameOfFile+' " alt="">'
		addContent+='<h4><strong>Name:</strong> '+ $('#name').val() + '</h4>';
		addContent+='<h5><strong>Age:</strong> '+ $('#age').val() +' </h5>';
		addContent+='<p><strong>Phone Number:</strong> '+ $('#phone').val() +' </p>';
		addContent+='<p><strong>NumberOfOrder:</strong><span class="badge badge-danger"> '+ $('#numberOfOrder').val() +' </span> </p>';
		addContent+='<p><strong>Email:</strong> '+ $('#email').val() +' </p>';
		addContent+='	<hr>';
		addContent+='<p class="text-muted pull-right"><small>Last update 3 minutes</small></p>';
		addContent+='<div class="button pull-left">';
		addContent+='<a href="<?= base_url() ?>index.php/manageClerkController/deleteData/<?= $value['Id'] ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>';
		addContent +='<a href="<?= base_url() ?>index.php/manageClerkController/editData/<?= $value['Id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>';
		addContent+='</div>';
		addContent+=' </div>';
		addContent+='</div>';
		addContent+=' </div>';
        $('.thumbnailClerk').append(addContent);
		$('#name').val('');
		$('#age').val('');
		$('#phone').val('');
		$('#numberOfOrder').val('');
		$('#email').val('');
		});
});
</script>