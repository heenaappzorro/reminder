<?php $user_id = $this->uri->segment(3);
$Result = $this->EventModel->edit_event($user_id);
//print_r($Result); exit;?>
<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="content">
        <div class="col-md-12">
          <div class="col-md-4">
            
             <form  action= "<?php echo base_url('EventController/updateEvent/'.$this->uri->segment(3)) ?>" method="post"  id= "user_form" name="user_form" enctype="multipart/form-data">
           <div class="form-group">

          <label for="usr">user_name:</label>
          <?php echo form_input(array('name'=>'user_name','id'=> 'user_name','value'=>$Result['user_name'], 'class'=>'form-control','type'=>'text','placeholder'=>' ')); ?>
		  <?php echo form_error('fullname');?>
    </div>
	
    <div class="form-group">
    <label for="pwd">start_date</label>
          <?php echo form_input(array('name'=>'start_date','id'=> 'start_date','value'=>$Result['start_date'], 'class'=>'form-control','type'=>'text','placeholder'=>'')); ?>
		  <?php echo form_error('start_date');?>
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



  

