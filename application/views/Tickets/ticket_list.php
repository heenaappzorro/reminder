

<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Support Chat</h4>
          <p class="category"></p>
        </div>
        <div class="content table-responsive table-full-width">
          <table class="table table-striped" id="dataTables">
            <thead>
              <!-- <th>User ID</th> -->
              <th>User Email</th>
              <!-- <th>Email</th> -->
              <th>User Query</th>
              <th>Status</th>
              <!-- <th>DOB</th> -->
              <th>ACTION</th>
            </thead>
            <tbody>
              <?php  foreach($msg as $m){ ?>
             <tr>
                <td><?php echo $m['user_email']?></td>
               <td><?php echo $m['query']?></td>
               <td><?php if($m['status']==0) {echo "Open";} else{ echo "Closed";} ?></td>
               
               
               <td>
                <!--show alert on response button if topic closed-->
                 <?php if($m['status']==1){?>
                 <button type="button" class="btn btn-primary" id="<?php echo $m['user_id']?>" onclick="show_alert(this.id);"><span class="fa fa-reply"></span>Reopen</button>
                <?php } else{ ?>

                <button type="button" class="btn btn-primary" id="<?php echo $m['id']?>" name="reject" value="6" data-toggle="modal" data-target="#exampleModal" onclick="openForm(this.id)"><span class="fa fa-reply"></span>Response</button>
               

                <button type="button" class="btn btn-danger" id="<?php echo $m['user_id']?>" name="closeTicket" value="6" onclick="closeTicket(this.id)" ><span class="fa fa-remove"></span>Close</button>
                <?php } ?>
                <!-- <a onclick="userDelete(<?php echo $users['user_id']; ?>)" ><i class="fa fa-scissors" aria-hidden="true"></i></a> -->
                 </td>
               </tr>
                  <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="admin_response" method="post">

        <div class="form-group" id="recipient_email"></div>

         <!-- <div class="form-group" class="chat-box" style="height:100px;width:100px;border:2px solid black;">
           <h4 style="width:30px;margin-top:-10px;margin-left:5px;background:white;">Query</h4> -->
           <div class="form-group" id="custom_price"></div>
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message_text"></textarea>
          </div>
       <!--  </div> -->
       
      </div>
      <div class="modal-footer">
        
         <input type="submit" class="btn btn-primary" value="Reply">
         <input type="hidden" name="user_id" value="" id='user_id2'>
         <input type="hidden" name="query_id" value="" id='query_id2'>

        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
      </div>
      
        </form>
    </div>
  </div>
</div>


<!--send admin response to user-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


<script type="text/javascript">
function openForm(query_id)
{
  //alert(query_id);
  $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'TicketController/support_chat2'?>",
            data:{'query_id':query_id},
            cache: false,
            dataType: "json",// using json, jquery will make parse for  you
            success: function(response)
            {
              console.log(response);
              $("#user_id2").val(response[0].user_id);
              $("#query_id2").val(response[0].query_id);
              var email =  $('<input>', {
                          type: 'text',
                          class:'form-control pull-right',
                          readonly:'readonly',
                          name:'field',
                          val: response[0].user_email,

                      });
               $( "#recipient_email" ).append('<div><label for="name">Email</label></div>');
                $("#recipient_email").append(email);
                 var len = response.length;
                 for (var i = 0; i < len; i++) {

                       var row =  $('<input>', {
                          type: 'text',
                          class:'form-control pull-right',
                          readonly:'readonly',
                          name:'field',
                          val: response[i].message,

                      });
                      if(response[i].flag==0)
                      {
                        $( "#custom_price" ).append('<div><label for="name">'+response[i].user_name+'</label></div>');
                      }else{
                        $( "#custom_price" ).append('<div><label for="name">Admin</label></div>');
                      }

                      $("#custom_price").append(row);
                    
                    
                  }//end for loop
             
             
            }, error: function (response) {
                alert("error");
              }
         });//end ajax

}
</script>

<script type="text/javascript">
$(document).ready(function() { 
  $("#admin_response").submit(function(event) {
    event.preventDefault();
    //alert("dsfgd");
      var message = $('#message_text').val();
      var user_id=$('#user_id2').val();
      //alert(user_id);
      //return false;
      var query_id=$('#query_id2').val();
      if(message=='')
      {
        alert("Please enter you message");
      }else{
          //alert(query_id);
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'TicketController/send_email'?>",
                    data:{'query_id':query_id,'message':message,'user_id':user_id},
                    cache: false,
                    dataType: "json",// using json, jquery will make parse for  you
                    success: function(response)
                    {
                       swal("Done!", "Response Sent!", "success");
                       setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 2000);
                        
                       
                    }, error: function (response) {
                        console.log(response);
                        //swal("Oops", "We couldn't connect to the server!", "error");
                      }
                 });//end ajax
            return false;
           }//end else
  });
});
</script>


<script type="text/javascript">
  function closeTicket(user_id)
  {
     //alert(user_id);
     $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'TicketController/closeTicket'?>",
                    data:{'user_id':user_id},
                    cache: false,
                    dataType: "json",// using json, jquery will make parse for  you
                    success: function(response)
                    {
                      if(response==1)
                      {
                        swal("Done!", "Ticket Closed!", "success");
                        setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 2000);
                      }else{
                         swal("Oops", "Someting went wrong!", "error");
                      }
                    
                    }, error: function (response) {
                        //console.log(response);
                        swal("Oops", "We couldn't connect to the server!", "error");
                      }
                 });//end ajax
    
           
    
  }

</script>

<script type="text/javascript">
  function show_alert(user_id)
  {
    swal({
          title: "This ticket is closed!",
          text: "Do you want to reopen it?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
      .then((willDelete) => {
        if (willDelete) {
              $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'TicketController/reopenTicket'?>",
                    data:{'user_id':user_id},
                    cache: false,
                    dataType: "json",// using json, jquery will make parse for  you
                    success: function(response)
                    {
                      if(response==1)
                      {
                        swal("Done!", "Ticket Reopen!", "success");
                        setTimeout(function(){// wait for 2 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 2000);
                      }else{
                         swal("Oops", "Someting went wrong!", "error");
                      }
                    
                    }, error: function (response) {
                        console.log(response);
                      }
                 });//end ajax

          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Ticket remain closed!");
        }
      });
  }
</script>