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
                <h5 class="breadcrumbs-title">Timeslot</h5>
                <ol class="breadcrumb">
				  <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Timeslot</a></li>
                   
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
                  <table id="timeslot-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						
                            <th>Timeslot Name</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Duration</th>
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
                  <h4 class="header2">Add Time Slot</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="iTimeSlotName" type="text">
                          <label>Time Slot Name</label>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="input-field col s12">
                        <textarea id="iSlotDesc" row="3" class="materialize-textarea"></textarea>
                          <label>Description</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s12">
                          <input id="iStartTime" type="text">
                          <label>Start Time</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s12">
                          <input id="iEndTime" type="text">
                          <label>End Time</label>
                        </div>
                      </div>
					  <div class="row">
                   <div class="col s12">
					 
					       <label>Allowed Days</label>
						    <p>
                       <input type="checkbox" class="filled-in" id="iSunday" checked="checked" value="1" />
                      <label for="iSunday">Sunday</label>
                    </p>
					 <p>
                       <input type="checkbox" class="filled-in" id="iMonday" checked="checked" value="1" />
                      <label for="iMonday">Monday</label>
                    </p>
					<p>
                       <input type="checkbox" class="filled-in" id="iTuesday" checked="checked" value="1" />
                      <label for="iTuesday">Tuesday</label>
                    </p>
					<p>
                       <input type="checkbox" class="filled-in" id="iWednesday" checked="checked" value="1" />
                      <label for="iWednesday">Wednesday</label>
                    </p>
					<p>
                       <input type="checkbox" class="filled-in" id="iThursday" checked="checked" value="1" />
                      <label for="iThursday">Thursday</label>
                    </p>
					<p>
                       <input type="checkbox" class="filled-in" id="iFriday" checked="checked" value="1" />
                      <label for="iFriday">Friday</label>
                    </p>
					<p>
                       <input type="checkbox" class="filled-in" id="iSaturday" checked="checked" value="1" />
                      <label for="iSaturday">Saturday</label>
                    </p>
					  </div>
                      </div>
                       <div class="row">
                        <div class="input-field col s12">
                       <select id="iSlotActive" class="browser-default">
					   <option value="1">IsActive</option>
						  <option value="1">Yes</option>
						   <option value="0">No</option>
						 </select>
                          
                        </div>
                      </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" name="action" onclick="addTimeslot();">Add
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
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/timeslot.js"></script>

