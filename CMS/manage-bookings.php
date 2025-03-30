<?php 
	session_start();
	include ('includes/dbcon.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<link rel="stylesheet" href="css/style_tbl_bc.css">
<div class="container-fluid px-4">
   	<h3 class="mt-4">MANAGE RESERVATION</h3>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| Dashboard/<span style="color:#004AD6">MANAGE RESERVATION</span></li>
	</ol>
    
	<div class="card mb-4">
	    <div class="card-header">
	        
	        <a class="" data-bs-toggle="modal" data-bs-target="#filterModal">
         	  <i class="fa-solid fa-filter"></i><i class="fa-solid fa-sort-down"></i>
    		</a>
    		&nbsp;|&nbsp; 
    		 <a class="" data-bs-toggle="modal" data-bs-target="#ReportfilterModal">
         	  <i class="fas fa-fw fa-book fa0"></i>
    		</a>
    	
	    </div>
	    <div class="card-body">
	        <table id="myTable">
	            <thead>
	                <tr>
	                	<th>#</th>
	                	<th>Reference Number</th>
	                  	<th>Full Name</th>
	                  	<!--<th>Valid ID</th>-->
	                  	<!--<th>Service</th>-->
	                  	<th>Description</th>
	                  	<th>Grave Number</th>
	                  	<th>Lots</th>
	                  	<!--<th>Coffin Size</th>-->
	                    <!--<th>Burial Permit</th>-->
	                    <!--<th>Re-Burial Permit</th>-->
	                    <!--<th>Death Certicate</th>-->
	                    <th>Date of Schedule</th>
	                    <th>Date of Reservation</th>
	                    <th>Status</th>
	                    <th>View</th>
	                   	<th>Action</th>
	                </tr>
	            </thead>
	            <tbody>
	            	<?php include 'filter_reservation.php';?>
	         

				   <?php include 'resevation_modal.php'; ?>
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
</div>
<!-- End of Main Content -->

<?php
    include('includes/footer.php');
    include('includes/scripts.php');

?>

<!--Sweetalert link and script-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!---->

<!--Notification-->
<?php 
if (isset($_SESSION['msg']) && $_SESSION['msg'] !='' && $_SESSION['icon'])
{
    ?>
    <script>
        swal({
            title: '<?php echo $_SESSION['msg']; ?>',
            text: '<?php echo $_SESSION['msg_txt'];?>',
            icon: '<?php echo $_SESSION['icon'];?>',
            confirmButtonText: 'Okay',
              customClass: {
            title: 'swal-title',  // Custom class for title
            content: 'swal-content'  // Custom class for content
        },
        html: true
        });
    </script>
    <?php 
      unset($_SESSION['msg']);
      unset($_SESSION['msg_txt']);
      unset($_SESSION['icon']);
}
?>

