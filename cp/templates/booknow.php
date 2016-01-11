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
                <h5 class="breadcrumbs-title">Book Screens</h5>
                <ol class="breadcrumb">
				   <li><a href="<?php echo $app->urlFor("customer-dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Book Screens</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
      <div class="container">
	    
			 <div class="row">
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">New booking</h4>
                  <div class="row">
                    <div class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                         <select id="iLocation" class="browser-default">
						</select>
						<input type="hidden" id="iLocCategory"/>
                         
                        </div>
                      </div>
					  <div id="step2">
					  <div class="row">
                        <div class="input-field col s12">
						<table id="locationDetails" class="responsive-table display" cellspacing="0" style="background-color:#F0F0F0;">
						
						</table>
						<br>
						<div id="dvMap" style="width: 100%; height: 200px" />
						
						</div>
					</div>
					   <div class="row">
                        <div class="input-field col s12">
                        <table id="pricing-table" class="responsive-table display" cellspacing="0">
						<thead>
						<tr>
						<th></th>
						<th>Timeslot Name</th>
						<th>Start</th>
						<th>End </th>
						<th>Min. Seconds</th>
						<th>Available Seconds</th>
						<th>Price/Sec</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
                        </div>
                      </div>
                     
					  <div class="row">
                        <div class="input-field col s12">
                         <select id="iContentType" class="browser-default">
						  <option value="none">Content Type</option>
						 <option value="Photo">Photo</option>
						 <option value="Video">Video</option>
						</select>
                        
                        </div>
                      </div>
					  <div class="row" id="photoContent">
					
                        <div class="input-field col s12">
					<form id="formuploadImg" enctype="multipart/form-data" method="post">
                          <input type="file" name="iPhoto" id="iPhoto" />
						  <input type="hidden" name="BookingID" id="BookingID" value="0" />
						  </form>
                        </div>
                      </div>
					  <div class="row" id="videoContent">
                        <div class="input-field col s12">
                          <input id="iVideoURL" type="text">
                          <label>Video Public URL (like Youtube)</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s12">
                          <input id="iTotalSeconds" type="text">
                          <label for="iTotalSeconds">Total Seconds</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                        <textarea id="iBookingDesc" row="3" class="materialize-textarea"></textarea>
                          <label for="iBookingDesc">Comment</label>
                        </div>
                      </div>
					  
                      
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" name="action" onclick="drafBooking();">Preview Details
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
					  </div>
                    </div>
                  </div>
                </div>
              </div>
			  <div class="col s12 m12 l6" id="previewDiv">
			 
                <div class="card-panel">
                  <h4 class="header2">Preview</h4>
                  <div class="row">
                     <form class="col s12">
                  
                  <div class="row">
                    <table id="preview-table" class="responsive-table display" cellspacing="0">
					<thead>
					
					</thead>
					
					<tr>
					<table id="priceTable" class="responsive-table display" cellspacing="0">
					<thead>
					<tr><th>#</th><th>Timing</th><th>Days</th><th>Duration</th><th>Unit Price</th><th>Total</th></tr>
					</thead>
					<tbody>
					
					</tbody>
					</table>
					</tr>
					   </table>
                  </div>
				  <div class="row">
                        <div class="input-field col s12">
                         <select id="iPaymentMethod" class="browser-default">
						</select>
                        
                        </div>
                      </div>
				   <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" name="action" onclick="confirmBooking();">Confirm & Pay
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                </form>
                  </div>
                </div>
              </div>
				</div>	
			<input type="hidden" id="iBookingCode" value="<?php echo mt_rand_str(6, 'TUVWXYZ256ABCDEFGH34IJKLMN789OPQR01S');?>" />
			  
				</div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/customer/booknow.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<?php 
function mt_rand_str ($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
    return $s;
}
?>