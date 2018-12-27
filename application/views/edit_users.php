<?php $user_id = $this->uri->segment(3);
$Result = $this->Users_model->get_user($user_id);
//print_r($Result); exit;?>
<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="content">
        <div class="col-md-12">
          <div class="col-md-4">
            
             <form  action= "<?php echo base_url('Users/updateUser1/'.$this->uri->segment(3)) ?>" method="post"  id= "user_form" name="user_form" enctype="multipart/form-data">
           <div class="form-group">
          <label for="usr">FULLNAME:</label>
          <?php echo form_input(array('name'=>'fullname','id'=> 'fullname','value'=>$Result['fullname'], 'class'=>'form-control','type'=>'text','placeholder'=>'Enter fullname ')); ?>
		  <?php echo form_error('fullname');?>
    </div>
	
    <div class="form-group">
    <label for="pwd">Email</label>
          <?php echo form_input(array('name'=>'email','id'=> 'email','value'=>$Result['email'], 'class'=>'form-control','type'=>'text','placeholder'=>'Enter email')); ?>
		  <?php echo form_error('email');?>
    </div>
    
    
     <div class="form-group">
    <label for="pwd">DOB</label>
          <?php echo form_input(array('name'=>'dob','id'=> 'dob', 'value'=>$Result['dob'],'class'=>'form-control','type'=>'text','placeholder'=>'Enter dob')); ?>
		  <?php echo form_error('dob');?>
    </div>
    
     
            <div class="form-group"> 
			<div class="col-md-6"> 
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="UPDATE">
            </div>
            <div class="col-md-6"> 
                <a id="back" class="btn btn-lg btn-primary btn-block" href="javascript:window.history.go(-1);">CANCEL</a> 
            </div>
			</div>
			</div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  

