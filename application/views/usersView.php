 <?php 
 $this->uri->segment(3);
 $users=$this->UserModel->getuser();
  ?>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>insert</h2>
			</div>
		<div class="pull-right">

   </div>
  	</div>
</div>
<div id="form">
				
</div>			
		<?php echo $this->session->flashdata('success_msg'); ?>
			<?php echo $this->session->flashdata('error_msg'); ?>
		<div style="float:right">	<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#create-item" id="create"  ><span class="glyphicon glyphicon-plus-sign" ></span></button></div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">name</th>
      <!-- <th scope="col">email</th> -->
      <th scope="col">contact</th>
      <!-- <th scope="col">gender</th>
      <th scope="col">date-of-birth</th>
      <th scope="col">profile_pic</th>
      <th scope="col">device_type</th> -->
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
	  <?php foreach($users as $user): ?>
    <tr>
      
      <td><?php echo $user->fullname ?></td>
     <!--  <td><?php //echo $user->email ?></td> -->
      <td><?php echo $user->contact ?></td>
      <!-- <td><?php //echo $user->gender ?></td>
      <td><?php //echo $user->dob ?></td>
      <td><?php //echo $user->profile_pic ?></td>
      <td><?php //echo $user->device_type ?></td> -->
     <td> <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#create-item" id="create"  ><span class="glyphicon glyphicon-plus-sign" ></span></button>
     <a href=""> <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"  ><span class="glyphicon glyphicon-pencil" ></span></button></a>
     <a href=""><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></a>
     <a href=""> <button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button><td></td></a>
    </tr>
    <?php endforeach ?>
  
  </tbody>
</table>

<!-------------------------insert data----------------------------------------->

<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="modal-title" id="myModalLabel">Create Item</h4>
      </div>
	<div class="modal-body">
		<form data-toggle="validator" id="cform" action="<?php echo site_url('UserController/getUser'); ?>" method="POST">
			<?php echo validation_errors(); ?>  
			<?php echo form_open('form'); ?>
				<div class="form-group">
					
					<label class="control-label" for="name">name:</label>
					 <input type="text" name="name" class="form-control" data-error="Please enter name." required />
					 <div class="help-block with-errors"></div>
				 </div>
				<div class="form-group">
				  <label class="control-label" for="designation">designation:</label>
				  <input type="text" name="designation" class="form-control" data-error="Please enter designation." required />
				  <div class="help-block with-errors"></div>
				</div>  
				<div class="form-group">
				  <label class="control-label" for="status">Status:</label>
				  <input type="text" name="active" class="form-control" data-error="Please enter status." required />
				  <div class="help-block with-errors"></div>
				</div>
			
				<div class="form-group">
						<button type="submit" class="btn crud-submit btn-success"  >Submit</button>
				</div>
            </form>
      </div>
    </div>
  </div>
</div>
