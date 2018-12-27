
<?php
 $event_id = $this->uri->segment(3);
 $Result = $this->EventModel->get_events();?>

<div class="container-fluid">
  <div class="col-md-12 form_section">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Rejected Events</h4>
          <p class="category"></p>
        </div>
        <div class="content table-responsive table-full-width">

          <form method="post" action="" id="formoid">
            <input type="text" name="sname" placeholder="Enter  name" id="sname">
            <select id="dropDownId">
                <option value="">Select Task</option>
                <option value="0">Send</option>
                <option value="1">Accept</option>
                <option value="2">Reject</option>
                <option value="3">Complete</option>
          </select> 
            <input type="submit" value="Search" >
          </form>

          <table class="table table-striped" id="tblProducts">
    <thead>
             <th>User name</th>
              <th>Title</th>
              <th>To</th>
              <th>From</th>
              <th>Start date</th>
              <th>Status</th>
</thead>
    <tbody>
    </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</div>

 <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                               GRUNTWORK
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; GRUNTWORK
                </div>
            </div>
        </footer>
        </div>
</div>
        

    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/validation.js');?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="<?php echo base_url('assets/js/bootstrap-checkbox-radio.js');?>"></script>

  <!--  Charts Plugin -->
  <script src="<?php echo base_url('assets/js/chartist.min.js');?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>

    <!--  Google Maps Plugin    -->
<!--
     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyB5FoObqg-zvUkmAyPhCw_ehuz3naVgDpw"></script>
     <script src="<?php echo base_url('assets/js/map.js');?>"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
  <script src="<?php echo base_url('assets/js/paper-dashboard.js');?>"></script>

  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assets/js/demo.js');?>"></script> 
     <!-----Date Picker----->
  
  <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
  <script src="<?php echo base_url('assets/jquery-ui-1.12.1/jquery-ui.js');?>"></script>
 
   
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  
     
     
    
     
     
<!--------------refresh cancel orders on dashboard -------------------->  

 <script>
$(document).ready(function() { 
  $("#formoid").submit(function(event) {
    /* stop form from submitting normally */
      event.preventDefault();
       var name= $('#sname').val();     
       var status= $('#dropDownId').val(); 
       var status2= $('#dropDownId :selected').text(); 
       //$('#dropDownId :selected').text();
        /*alert(status2); 
        return false;*/
        if(name=="" || status=="")
        {
          alert("please select the both");
        }else{
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'EventController/add_filter'?>",
            data:{'name':name,'status':status},
            cache: false,
            dataType: "json",// using json, jquery will make parse for  you
            success: function(response)
            {
              var len = response.length;
              //console.log(len);
             var rows;
              for (var i = 0; i < len; i++) {
                  //console.log(response[i].event_name);
                   
                   rows += "<tr>"
                    + "<td>" + response[i].user_name + "</td>"
                    + "<td>" + response[i].event_name + "</td>"
                    + "<td>" + response[i].to_user + "</td>"
                    + "<td>" + response[i].from_user + "</td>"
                    + "<td>" + response[i].start_date + "</td>"
                    + "<td>" + status2 + "</td>"
                    + "</tr>";
                    
              }
            $('#tblProducts tbody').append(rows);
            
             //alert(obj['event_name']);
             
               
            }, error: function (response) {
                alert(response);
              }
         });//end ajax
        }
          


  });

});
</script>  



</body>
</html>

