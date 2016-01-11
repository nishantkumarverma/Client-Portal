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
                <h5 class="breadcrumbs-title">Bookings</h5>
                <ol class="breadcrumb">
				   <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Bookings</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
      <div class="container">
	    <div class="card-panel">
<div class="section">

            <div class="row">
					 <div class="col s12 m12 19">
					   <h4 class="header2">Booking</h4>
                  <table id="booking-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						 <th>Customer</th>
                            <th>Location</th>
							<th>Days</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Booked Sec</th>
							<th>Total Amount</th>
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
                </div>
				
				
			  
				</div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/bookings.js"></script>

