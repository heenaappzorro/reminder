
<?php
 $event_id = $this->uri->segment(3);
 $Result = $this->EventModel->get_events();?>

<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Self Events</h4>
          <p class="category"></p>
        </div>
        <div class="content table-responsive table-full-width">
          <table class="table table-striped" id="dataTables">
            <thead>
              <th>User name</th>
              <th>Title</th>
              <th>Start date</th>
              <th>Status</th>
              <!-- <th>ACTION</th> -->
            </thead>
            <tbody>
                <?php foreach($Result as $users):/* print_r($users); die;*/ ?>
					<tr>

                <td><a href="<?php echo base_url() . 'EventController/event_detail/' .  $users['event_id'] ?>"><?php echo $users['user_name']; ?></a></td>
                <td><?php echo $users['event_name']; ?></td>
                <td><?php echo $users['start_date']; ?></td>
                <td><?php if($users['status']=='0')
                           {
                 echo "Send";
               }elseif ($users['status']=='1') {
                echo "Accept";
               }
               else
               {
                 echo "Complete";   
                 
                }   ?>   

                </td>  

               <!--  <td><?php //echo $users['to_user']; ?></td>
                <td><?php //echo $users['from_user']; ?></td> -->
                
               <!--  <td> -->
<!--
                <td><a href="<?php echo base_url() . 'EventController/edit_Event/' .  $users['event_id'] ?>" class="fa fa-pencil" aria-hidden="true"></i></a>
-->
               <!--  <a href="<?php echo base_url('EventController/event_detail/' . $users['event_id']) ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                 <a onclick="event_Delete(<?php echo $users['event_id']; ?>)" ><i class="fa fa-scissors" aria-hidden="true"></i></a> -->
                 <!-- </td> -->
              </tr>
              <?php endforeach; ?>
				 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
