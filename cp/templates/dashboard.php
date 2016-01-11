<?php include_once("header.php"); ?>
<?php include_once("topbar.php"); ?>
<?php include_once("sidebar.php"); ?>
<!-- START CONTENT -->
            <section id="content">
 <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Dashboard</h5>
                <ol class="breadcrumb">
                    <li><a href="#" class="active">Dashboard</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
                <!--start container-->
                <div class="container">
				<div class="section">
 <!--card stats start-->
                    <!-- <div id="card-stats">
                       <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> New Clients</p>
                                        <h4 class="card-stats-number">566</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                                        </p>
                                    </div>
                                    <div class="card-action  green darken-2">
                                        <div id="clients-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Sales</p>
                                        <h4 class="card-stats-number">$8990.63</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                                        </p>
                                    </div>
                                    <div class="card-action purple darken-2">
                                        <div id="sales-compositebar"></div>

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Today Profit</p>
                                        <h4 class="card-stats-number">$806.52</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 80% <span class="blue-grey-text text-lighten-5">from yesterday</span>
                                        </p>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> New Invoice</p>
                                        <h4 class="card-stats-number">1806</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
                                        </p>
                                    </div>
                                    <div class="card-action  deep-purple darken-2">
                                        <div id="invoice-line"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>-->
                    <!--card stats end-->
					<div class="row">
					 <div class="col s12 m12 19">
					   <h4 class="header2">My booking</h4>
                  <table id="booking-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Location</th>
							<th>Days</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Booked Sec</th>
                            <th>IsActive</th>
							<th>IsPaid</th>
							<th></th>
                        </tr>
                    </thead>
                 
                    
                 
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
					</div>
</div>
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/customer/dashboard.js"></script>