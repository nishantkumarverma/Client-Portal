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
                <h5 class="breadcrumbs-title">Manage Admin</h5>
                <ol class="breadcrumb">
				   <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Admin</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
      <div class="container">
	   <div class="card-panel">
	   <h4 class="header2">Admin List</h4>
<div class="section">
            <div id="table-datatables">
              <div class="row">
                <div class="col s12 m12 19">
                  <table id="admin-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						<th></th>
						
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                          
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
                  <h4 class="header2">Add Admin</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                         
                          <input id="iName" type="text">
                          <label for="first_name">Name</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                        
                          <input id="iEmail" type="email">
                          <label for="email">Email</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                         
                          <input id="iPassword" type="password">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                       
						  <select id="iAdminRole" class="browser-default">
						  <option value="none">Select Role</option>
		</select>
                        
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" onclick="addAdmin();" name="action">Add
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  <div class="col s12 m12 l6">
			  <div class="card-panel">
                  <h4 class="header2">Manage Role</h4>
                  <div class="row">
				    <table id="role-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>#</th>
						<th>Name</th>
						
                        </tr>
                    </thead>
					<tbody>
					</tbody>
					</table>
				  </div>
				  </div>
                <div class="card-panel">
                  <h4 class="header2">Add Role</h4>
                  <div class="row">
                     <form class="col s12">
                  
                  <div class="row">
                    <div class="input-field col s4">
                     
                      <input id="rRoleName" type="text" >
                      <label for="icon_prefix">Role Name</label>
                    </div>
                    <div class="input-field col s4">
                       <select id="rRoleActive" class="browser-default">
					   <option value="1">IsActive</option>
						  <option value="1">Yes</option>
						   <option value="0">No</option>
						 </select>
                     
                    </div>
                    <div class="input-field col s4">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light" type="button" id="addRoleBtn"> Add Role</button>
                      </div>
                    </div>
                  </div>
                </form>
                  </div>
                </div>
              </div>
				</div>
				</div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/admin.js"></script>