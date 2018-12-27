
<?php
 $event_id = $this->uri->segment(3);
 $Result = $this->EventModel->get_events();?>

<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Single Events</h4>
          <p class="category"></p>
        </div>
        <div class="content table-responsive table-full-width">
          <table class="table table-striped" id="dataTables">
            <thead>
              <th>User name</th>
              <th>Title</th>
              <th>To</th>
              <th>From</th>
              <th>Start date<a href="#"><i class="fa fa-caret-down" aria-hidden="true"></i></a></th>
              <th>Status</th>
              <!-- <th>ACTION</th> -->
            </thead>
            <tbody>
                <?php foreach($Result2 as $users): /*print_r($users);die;*/ ?>
					<tr>
                <td><a href="<?php echo base_url() . 'EventController/event_detail/' .  $users['event_id'] ?>"><?php echo $users['user_name']; ?></a></td>
                <td><?php echo $users['event_name']; ?></td>
                 <td><?php echo $users['to_user']; ?></td>
                <td><?php echo $users['from_user']; ?></td>
                <td><?php echo $users['start_date']; ?></td>
                
                <td id="my"><?php if($users['status']=='0')
                           {
                 echo "Send";
               }elseif ($users['status']=='1') {
                echo "Accept";
               }elseif ($users['status']=='2') {
                echo "Reject";
               }
               else
               {  
                 echo "Complete";   
                 
                }   ?>   

                </a></td>  

               
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(document).on("click", "#my", function(e) {
  var cval = $(this).text();
   alert(cval);
   $.ajax({
        type: "GET",
        url:"<?php echo base_url(); ?>EventController/single_event_filter", 
        data:{'cval': cval},
        dataType : "json",

        success: function(data){
        //$("#div1").html(result);
        //response = jQuery.parseJSON(data);
         console.log(data);
        },error:function(data){
          console.log(data);
        }

      });
   //return false;
    
  }); 
}); 

</script>