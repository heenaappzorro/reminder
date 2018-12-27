<?php error_reporting(0); $event_id = $this->uri->segment(3);?>
<?php $Users = $this->Dashboard_model->get_users();?>
<?php $Events = $this->Dashboard_model->get_events();?>
<?php $Self = $this->Dashboard_model->get_self_task();?>
<?php $Single = $this->Dashboard_model->get_single_task();?>
<?php $TT = $this->Dashboard_model->get_total_tickets(); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2 red">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Users</p>
                                           <i class="fa fa-user"></i> &nbsp;
                                           <div id="events" class="total_transactions_content"><?php echo $Users[0]['id']; ?></div>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div1" name="reload_div1" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2 green">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Events</p>
                                           <i class="fa fa-credit-card"></i> &nbsp;
                                           <div id="events" class="total_transactions_content"><?php echo $Events[0]['id']; ?></div>
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div1" name="reload_div1" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2 blue">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Admin Commission</p>
                                            $&nbsp;12
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div" name="reload_div" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2" style="color:#fff;background-color: #ff9900;">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-credit-card"></i>&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Tickets</p>
                                            <i class="fa fa-credit-card"></i> &nbsp;
                                            <?php echo count($TT);?>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div" name="reload_div" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    


                     <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2" style="color:#fff;background-color: #ff9900;">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-credit-card"></i>&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Self Tasks</p>
                                            <i class="fa fa-credit-card"></i> &nbsp;
                                            <?php echo count($Self);?>
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div" name="reload_div" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-3 col-sm-6">
                        <div class="card dashboard-stat2" style="color:#fff;background-color: #990099;">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big">
                                            <i class="fa fa-credit-card"></i>&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Single Tasks</p>
                                            <i class="fa fa-credit-card"></i> &nbsp;
                                            <?php echo count($Single);?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload_div" name="reload_div" onclick="refresh_main()"></i> Updated now
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    
             <div class="portlet-form">
                <div class="row">
            
					<!-- <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                      <div>
                                       Total Users: 
                                       <div id="users" class="users"><?php echo $Users[0]['id']; ?>
                                       </div>
                                       </div>
                                       <div>
									   Total Events:
									   <div id="events" class="total_transactions"><?php echo $Events[0]['id']; ?>
                                       </div>
                                       </div>
                                       <div>
                                       Canceled Transactions:
                                       <div id="cancel_orders" class="cancel_orders">13
                                       </div>
                                       </div>
                                    </div>
                                   
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats text-color">
                                        <i class="fa fa-refresh fa-x" id="reload" name="reload" onclick="refresh_blog()"></i> Updated now
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                   


				<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    	<div class="row">
                        <div class="">
                            <div id="chart_div"></div> 
                        
                            
                        </div>
                    </div>
				</div>
                 <div class="col-md-6">
                        <div class="row">
                        <div class="">
                          <div id="donut_chart"></div> 
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
</div>
