
<div class="container-fluid">
        	<div class="col-md-12 form_section">
               <div class="row">
			   <div class="content">
			   <div class="col-md-6">
			   <div class="col-md-6">
			<?php 
			$fattr = array('class' => 'form-signin');
			echo form_open('', $fattr); ?>
			<div class="form-group">
    <label for="usr">FULLNAME:</label>
          <?php echo form_input(array('name'=>'fullname','id'=> 'fullname','value'=>$fullname, 'class'=>'form-control','type'=>'text','placeholder'=>'Enter fullname ')); ?>
		  <?php echo form_error('fullname');?>
    </div>
    
 
	
    <div class="form-group">
    <label for="pwd">Email</label>
          <?php echo form_input(array('name'=>'email','id'=> 'email','value'=>$email, 'class'=>'form-control','type'=>'text','placeholder'=>'Enter email')); ?>
		  <?php echo form_error('email');?>
    </div>
    
  
    
     <div class="form-group">
    <label for="pwd">DOB</label>
          <?php echo form_input(array('name'=>'dob','id'=> 'dob', 'value'=>$dob,'class'=>'form-control','type'=>'text','placeholder'=>'Enter dob')); ?>
		  <?php echo form_error('dob');?>
    </div>
           
			  <input type="hidden" value="<?php echo $user_id; ?>" id="user_id" name="user_id">	
    
    <div class="form-group">
	<button type="button" class="btn btn-lg btn-primary btn-block" id="updateLocation"  onclick="updateUsers()">UPDATE</button>
	<button type="button" class="btn btn-lg btn-primary btn-block" id="cancelLocation"  onclick="cancelUsers()">CANCEL</button>
    <?php echo form_close(); ?>
   </div>
   </div>
   </div>	   
   </div>
   </div>
   </div>
   </div>
  

