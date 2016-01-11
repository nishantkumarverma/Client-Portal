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
				   <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="adminrole.php" class="active">Adminrole</a></li>
                   
                </ol>
              </div>
            </div>
          </div>
        </div>
      <div class="container">

				
				 <div class="row">
             	 <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">ADD Admin Roles</h4>
                  <div class="row">
                  <div id="borderless-table">
            
              <div class="row">
                
              </div>
            </div>
			<div class="row">
			<div class="col s12 m12 l12">
              <div class="card-panel">
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
                </div>
				</div>
				</div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/adminrole.js"></script>