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
                <h5 class="breadcrumbs-title">Customer</h5>
                <ol class="breadcrumb">
				 <li><a href="<?php echo $app->urlFor("dashboard"); ?>" class="active">Dashboard</a></li>
                    <li><a href="#" class="active">Customer</a></li>
                   
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
                  <table id="customer-table" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
						<th>Id</th>
						
                            <th>Customer Name</th>
							<th>Company Name</th>
							<th>Email</th>
                           
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
<script type="text/javascript" src="<?= PUBLIC_ROOT ?>js/admin/customer.js"></script>

