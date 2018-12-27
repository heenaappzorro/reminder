<?php  
	$user_id=$this->uri->segment(3);
	$result=$this->EventModel->event_detail($user_id);
	
?>
<div class="content-wrapper" style="min-height: 760px;">
   
    <section class="content-header">
		<div class="col-md-6">
			<div class="content-header">                         
				<h2>Event Detail</h2>
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
                          <b>Priority</b>
                        </td>
                        <td>
                          <?php
                           if($result[0]['priority']=='0')
                           {
                               echo "Low";
                            }
                             elseif($result[0]['priority']=='1')
                             {
                               echo "Medium"; 
                              }else{
                               echo "High";
                              }     
                           ?>  
                        </td>
                      </tr>  
                      <tr>
                        <td>
                          <b>Discription</b>
                        </td>
                        <td>
                          <?php echo $result[0]['description'];?>  
                        </td>
                      </tr> 
                       <tr>
                        <td>
                          <b>Distance</b>
                        </td>
                        <td>
                          <?php
                           if($result[0]['comingin']=='1')
                           {
                               echo "Come Out";
                            }
                             else
                             {
                               echo "Come In"; 
                              }     
                           ?> 
                        </td>
                      </tr>   
                      <tr>
                        <td>
                          <b>Start Date</b>
                        </td>
                        <td>
                          <?php echo $result[0]['start_date'];?>
                        
                        </td>
                      </tr>  
                      <tr>
                        <td>
                          <b>Create Date</b>
                        </td>
                        <td>
                          <?php echo $result[0]['date_send'];?>  
                        </td>
                      </tr>  
                       <tr>
                        <td>
                          <b>Due Date</b>
                        </td>
                        <td>
                          <?php echo $result[0]['date'];?>  
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Radius</b>
                        </td>
                        <td>
                          <?php echo $result[0]['radius'];?>  
                        </td>
                      </tr>    
                      <tr>
                        <td>
                          <b>Location</b>
                        </td>
                        <td>
                          <?php echo $result[0]['address'];?>  
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

