<?php 
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("Location:admin-login.php");
}
include 'includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'includes/header.php'; ?>
    <link href="assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'includes/preloader.php'; ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
	<?php include 'includes/top-navigation.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      <?php include 'includes/left-navigation.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?php include 'includes/breadcrump.php'; ?>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Income Management</h5>
                                <form class="form-horizontal m-t-30" method="POST" action="">
                                    <div class="form-group">
                                        <!-- <label class="col-md-12" for="example-text">Invoice Number</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="example-text" class="form-control" placeholder="">
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="income_date">Date</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="bdate" name="income_date" class="form-control mydatepicker" placeholder="Select Date" required="">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12" for="bdate2">Date of Sent</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="bdate2" name="bdate" class="form-control mydatepicker" placeholder="">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-md-12" for="bdate3">Date of Due</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="bdate3" name="bdate" class="form-control mydatepicker" placeholder="">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-12">Account Type</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="account" required>
                                                <option>Select Account</option>
                                                <?php 
                                                $fetch_accounts=mysqli_query($con, "SELECT ac_id,ac_name from chart_of_accounts WHERE ac_group_id = 1") or die(mysqli_error($con));

                                                if(mysqli_num_rows($fetch_accounts)){

                                                while($accounts=mysqli_fetch_array($fetch_accounts)){
                                                	?>
                                                	<option value="<?php echo $accounts['ac_id']; ?>"><?php echo $accounts['ac_name']; ?></option>
                                                	<?php
                                                }}

                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="amount">Amount</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Amount">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12" for="example-text3">Client Name</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text3" name="example-text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="example-text4">Price</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text4" name="example-text" class="form-control" placeholder="">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-sm-12">Attachment</label>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-12">Narration</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" name="narration" placeholder="Narration"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="add_income">Submit</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php 
                    	if(isset($_POST['add_income']))
                    	{
                    		$date=mysqli_real_escape_string($con,$_POST['income_date']);
             				$amount= mysqli_real_escape_string($con,$_POST['amount']);
             				$narration=mysqli_real_escape_string($con,$_POST['narration']);
             				$ac_type=mysqli_real_escape_string($con,$_POST['account']);
							$date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
             				$income_add=mysqli_query($con,"INSERT INTO income(ac_id,particulars,amount,date_of_entry) VALUES($ac_type,'$narration',$amount,'$date')") or die(mysqli_error($con));
             				if($income_add)
             				{
             					echo "<script>alert('Income Added!!');</script>";
             				}
             				else
             				{
             					echo "<script>alert('Something went wrong!!');</script>";
             				}
                    	}
                     ?>
					<div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Income Table</h5>
                                <!-- <p class="text-muted">this is the sample data here for crm</p> -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Narration</th>
                                                <th>Amount</th>
                                                <th>Account Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                        	$icn=mysqli_query($con,"SELECT a.*,i.* FROM income i INNER JOIN chart_of_accounts a ON a.ac_id = i.ac_id WHERE a.ac_group_id=1") or die(mysqli_error($con));

                                        	 	if(mysqli_num_rows($icn)){
                                        	 	while($income_retrieve=mysqli_fetch_array($icn)){
                                        			?>
                                        	<tr>
                                                <td><?php echo $income_retrieve['income_id']; ?></td>
                                                <td><?php echo $income_retrieve['date_of_entry']; ?></td>
                                                <td><?php echo $income_retrieve['particulars']; ?></td>
                                                <td><?php echo $income_retrieve['amount']; ?></td>
                                                <td><?php echo $income_retrieve['ac_name']; ?></td>
                                            </tr>
                                        			<?php
                                        		}
                                        	}
                                        	 ?>
                                        </tbody>
                                        <tfoot>
                                        	<tr>
                                        		<?php $total_income=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) as sum FROM income")); ?>
                                        		<th colspan="3">Total</th>
                                        		<th><?php echo $total_income['sum']; ?></th>
                                        	</tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
               	<?php include 'includes/right-sidebar.php'; ?>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include 'includes/footer.php'; ?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    // Date Picker
    jQuery('.mydatepicker').datepicker();
    </script>
    <script src="js/jasny-bootstrap.js"></script>
    <script src="js/mask.js"></script>
    <!--Style Switcher -->
</body>

</html>