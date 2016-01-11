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
                <h5 class="breadcrumbs-title">Manage Location</h5>
                <ol class="breadcrumb">
				 <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Location</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
      <div class="container">
	    <div class="card-panel">
<div class="section">

            <div id="table-datatables">
              <div class="row">
                <div class="col s12 m12 19">
                  <table id="location-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						
                            <th>Location Name</th>
							<th>Category</th>
							 <th>Height</th>
							  <th>Width</th>
							   <th>Resolution</th>
							    <th>Pincode</th>
                            <th>IsActive</th>
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
				
			<div class="row">
              <div class="col s12 m12 24">
                <div class="card-panel">
                  <h4 class="header2">Add Location</h4>
                  <div class="row">
				  <!-- half part -->
                   <div class="col s6 m6">
				    <div class="row">
                        <div class="input-field col s12">
                        <select id="iLocCategory" class="browser-default">
						</select>
                        </div>
                      </div>
				    <div class="row">
                        <div class="input-field col s12">
                          <input id="iLocName" type="text">
                          <label>Location Name</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s6">
                          <input id="iScrHeight" type="text">
                          <label>Screen Height</label>
                        </div>
						<div class="input-field col s6">
                          <input id="iScrWidth" type="text">
                          <label>Screen Width</label>
                        </div>
                      </div>
					  
					   <div class="row">
                        <div class="input-field col s12">
                          <input id="iScrResolution" type="text">
                          <label>Screen Resolution</label>
                        </div>
                      </div>
					    <div class="row">
                        <div class="input-field col s12">
                        <textarea id="iLocDesc" row="3" class="materialize-textarea"></textarea>
                          <label>Description</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s12">
                       <select id="iLocActive" class="browser-default">
					   <option value="1">IsActive</option>
						  <option value="1">Yes</option>
						   <option value="0">No</option>
						 </select>
                          
                        </div>
                      </div>
				   </div>
				   <!-- next half -->
				    <div class="col s6 m6">
					<div class="row">
					  <div class="input-field col s12">
                          <input id="iAddress"  placeholder="enter a location" type="text">
                          <label>Full Address</label>
						   <small>Drag & drop marker for exact location</small>
                        </div>
					</div>
					<div class="row">
					<div id="dvMap" style="width: 100%; height: 250px">
					
					 </div>
					 <div class="row">
					  <div class="input-field col s6">
                          <input id="iLatitude" placeholder="latitude" type="text" disabled>
                         
                        </div>
						<div class="input-field col s6">
                          <input id="iLongitude" placeholder="longitude" type="text" disabled>
                         
                        </div>
					</div>
					<div class="row">
					  <div class="input-field col s12">
                          <input id="iPincode" placeholder="pincode" type="text" >
                          <label>Pincode</label>
                        </div>
					</div>
					
					<div class="row">
					  <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="button" onclick="addLocation();" name="action">Add
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
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/location.js"></script>

 