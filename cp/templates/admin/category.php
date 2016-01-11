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
                <h5 class="breadcrumbs-title">Manage Category</h5>
                <ol class="breadcrumb">
				  <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="category.php" class="active">Category</a></li>
                   
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
                  <table id="category-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						
                            <th>Category Name</th>
                            <th>IsActive</th>
                           
                          
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
                  <h4 class="header2">Add Category</h4>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="iCatName" type="text">
                          <label for="first_name">Category Name</label>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="input-field col s12">
                        <textarea id="iCatDesc" row="3" class="materialize-textarea"></textarea>
                          <label>Description</label>
                        </div>
                      </div>
                       <div class="row">
                        <div class="input-field col s12">
                       <select id="iCatActive" class="browser-default">
					   <option value="1">IsActive</option>
						  <option value="1">Yes</option>
						   <option value="0">No</option>
						 </select>
                          
                        </div>
                      </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="button" onclick="addCategory();" name="action">Add
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
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/category.js"></script>