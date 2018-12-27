
<?php
 $user_id = $this->uri->segment(3);
 $Result = $this->Users_model->get_users();?>

<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Register Users</h4>
          <p class="category"></p>
        </div>
        <div class="content table-responsive table-full-width">
          <table class="table table-striped" id="dataTables">
            <thead>
              <th>User ID</th>
              <th>Fullname</th>
              <!-- <th>Email</th> -->
              <th>CONTACT</th>
              <!-- <th>GENDER</th>
              <th>DOB</th> -->
              <th>ACTION</th>
            </thead>
            <tbody>
                <?php foreach($Result as $users): ?>
					<tr>
                <td><?php echo $users['user_id']; ?></td>
                <td><?php echo $users['fullname']; ?></td>
                <td><?php echo $users['country_code'] . '' . $users['contact']; ?></td>
                <!-- <td><?php //echo $users['email']; ?></td>
                
                <td><?php  //if($users['gender']=='1')
                           {
							   //echo "Male";
						   }
						  // else
						   {
							 // echo "Female";   
							   
						    }	    
                   ?></td>
                <td><?php //echo $users['dob']; ?></td> -->
                <td>
<!--
                <td><a href="<?php base_url();?>Users/edit_Users/<?php echo $users['user_id']; ?>" class="fa fa-pencil" aria-hidden="true"></i></a>
-->
<!-- <a href="<?php echo base_url() . 'Users/single_user_detail/' .  $users['user_id'] ?>"> -->
                <a href="<?php echo base_url('Users/single_user_detail/' . $users['user_id']) ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                 <a onclick="userDelete(<?php echo $users['user_id']; ?>)" ><i class="fa fa-scissors" aria-hidden="true"></i></a>
                 </td>
              </tr>
              <?php endforeach; ?>
				 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
