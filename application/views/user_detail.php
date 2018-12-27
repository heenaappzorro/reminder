
<div class="content-wrapper" style="min-height: 760px;">
   
    <section class="content-header">
		<div class="col-md-6">
			<div class="content-header">                         
				<h2>User Detail</h2>
			</div>
        </div>
		<div class="col-md-6">
			<div class="three_btton_sec">
				
			</div>
		</div>
    </section>
    
 <div class="container-fluid">
  <div class="col-md-12 form_section">
    <section class="content" id="user-view">        
      <div class="row">                                                                                                                                                                                                
        <div class="col-md-12">
          <div class="main-strut">
            <div class="inner clearfix">
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin table-bordered">
                    <tbody>
                   
                      <tr>
                        <td>
                          <b>Email</b>
                        </td>
                        <td>
                          <?php echo $Result['email'];?>  
                        </td>
                      </tr>  
                      
                       <tr>
                        <td>
                          <b>Contact</b>
                        </td>
                        <td>
                          <?php echo $Result['country_code'] . '-' . $Result['contact'];?>  
                        </td>
                      </tr>   
                      <tr>
                        <td>
                          <b>Gender</b>
                        </td>
                        <td>
                          <?php if($Result['gender']=='1')
                           {
              							   echo "Male";
              						  }
              						  else
              						   {
              							  echo "Female";   
              							   
              						    }	    
                   ?>  
                        </td>
                      </tr>  
                      <tr>
                        <td>
                          <b>D.O.B</b>
                        </td>
                        <td>
                          <?php echo $Result['dob'];?>  
                        </td>
                      </tr> 

                       <tr>
                        <td>
                          <b>Device Used</b>
                        </td>
                        <td>
                           <?php if($Result['device_type']=='A')
                           {
                               echo "Android";
                            }
                            else
                             {
                              echo "IOS";   
                               
                              }  ?>    
                        </td>
                      </tr> 

                        <tr>
                        <td>
                          <b>Total events</b>
                        </td>
                        <td>
                          <?php echo count($total_events);?>  
                        </td>
                      </tr>  

                       <tr>
                        <td>
                          <b>Self events</b>
                        </td>
                        <td>
                         <?php echo count($self);?> 
                        </td>
                      </tr>  

                       <tr>
                        <td>
                          <b>Single events</b>
                        </td>
                        <td>

                        <a href="" id="<?php echo $Result['user_id'] ?>" onclick="single_event_detail(this.id);" data-toggle="modal" data-target="#myModal"> <?php echo count($single);?></a>
                        </td>
                      </tr>  

                       <tr>
                        <td>
                          <b>Accept events</b>
                        </td>
                        <td>
                          <?php echo count($accept_event);?> 
                        </td>
                      </tr>  

                       <tr>
                        <td>
                          <b>Reject events</b>
                        </td>
                        <td>
                          <?php echo count($reject_event);?> 
                        </td>
                      </tr>  

                       <tr>
                        <td>
                          <b>Complete events</b>
                        </td>
                        <td>
                          <?php echo count($complete_event);?> 
                        </td>
                      </tr> 

                       <tr>
                        <td>
                          <b>Cancel events</b>
                        </td>
                        <td>
                          <?php echo count($cancel_event);?> 
                        </td>
                      </tr>   

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  
   
   <div class="back col-md-2">
    <a id="back" class="btn btn-lg btn-primary btn-block" href="javascript:window.history.go(-1);">Back</a>
   </div>
</div>
</div>
<script type="text/javascript">
  function single_event_detail(id) {
    //alert(id);
    var dataString = 'user_id='+ id;
  
   //alert(dataString);
   $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>Users/user_single_event_detail",
        async : true,
        data: dataString,
        cache: false,
        dataType:"json",
        success: function(data)
        {     
          console.log(data);
           var html = '';
           var i;
           for(i=0; i<data.length; i++){
            if(data[i].status==1)
            {
              var sts="Accept";
            }else if(data[i].status==2){
              var sts="Reject";
            }else if(data[i].status==0){
              var sts="Send";
            }else if(data[i].status==3){
              var sts="Complete";
            }else{
              var sts="Cancel";
            }
                        html += '<tr>'+
                                '<td>'+data[i].to_user+'</td>'+
                                '<td>'+data[i].event_name+'</td>'+
                                '<td>'+data[i].start_date+'</td>'+
                                '<td>'+data[i].complete_date+'</td>'+
                                '<td>'+data[i].priority+'</td>'+
                                '<td>'+sts+'</td>'+
                                '</tr>';
                    }$('#show_data').html(html);
                    //$('#myModal').modal('hide');
        },error: function(data)
        {
          console.log(data);
        }
      });


  }

</script>

<!-- MODAL EDIT -->
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Single Events</h4>
        </div>
        <div class="modal-body">
          <table class="table no-margin table-bordered" id="mydata">
                <thead>
                    <tr>
                        <th>To User</th>
                        <th>Event Name</th>
                        <th>Start Date</th>
                        <th>Complete Date</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
        <!--END MODAL EDIT-->