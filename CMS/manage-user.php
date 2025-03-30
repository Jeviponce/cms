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
   	<h3 class="mt-4">MANAGE USER</h3>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| Dashboard/<span style="color:#004AD6">MANAGE USER</span></li>
	</ol>
    
	<div class="card mb-4">

	    <div class="card-header">
	        
	        <a class="#" data-bs-toggle="modal" data-bs-target="#filterModal">
         	  <i class="fa-solid fa-filter"></i><i class="fa-solid fa-sort-down"></i>
    		</a>
    			&nbsp;|&nbsp; 
    		
    		<a class="text-color:warning;" href="register-user.php">
         	  <i class="fa-solid fa-user-plus"></i>
    		</a>
    	

	    </div>
	    <div class="card-body">
	        <table id="myTable">
	            <thead>
	                <tr>
	                	<th>#</th>
	                  	<th>Full Name</th>
	                  	<th>E-Mail</th>
	                  	<th>Contact Number</th>
	                  	<th>Address</th>
	                  	<th>Date Registered</th>
	                  	<th>Status</th>
	                    <th>Edit</th>
	                    <th>Deactivate</th>
	                   
	                </tr>
	            </thead>
	            <tbody>
	            	<?php include 'filter_user.php';?>
					<?php include 'user_modal.php';?>
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

