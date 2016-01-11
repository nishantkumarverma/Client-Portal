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
                <h5 class="breadcrumbs-title">Pricing</h5>
                <ol class="breadcrumb">
				  <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Pricing</a></li>
                   
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
                  <table id="pricing-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						
                            <th>Timeslot Name</th>
							<th>Location Name</th>
							<th>Price Per Sec.</th>
							<th>Minimum Sec. Required</th>
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
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Add Pricing Details</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                         <select id="iTimeSlot" class="browser-default">
						</select>
                         
                        </div>
                      </div>
                     <div class="row">
                        <div class="input-field col s12">
                          <select id="iLocation" class="browser-default" multiple>
						</select>
                        </div>
                      </div>
					 <div class="row">
                        <div class="input-field col s12">
                          <input id="iPricePerSec" type="text">
                          <label for="iPricePerSec">Price Per Sec</label>
                        </div>
                      </div>
					   <div class="row">
                        <div class="input-field col s12">
                          <input id="iMinSec" type="text">
                          <label for="iMinSec">Minimum Seconds Required to Book</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                        <textarea id="iPriceDesc" row="3" class="materialize-textarea"></textarea>
                          <label for="iPriceDesc">Description</label>
                        </div>
                      </div>
                       <div class="row">
                        <div class="input-field col s12">
                       <select id="iPriceActive" class="browser-default">
					   <option value="1">IsActive</option>
						  <option value="1">Yes</option>
						   <option value="0">No</option>
						 </select>
                          
                        </div>
                      </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" name="action" onclick="addPricing();">Add
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
				</div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/pricing.js"></script>

