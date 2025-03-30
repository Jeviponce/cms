<?php
include ('includes/header.php');
include ('includes/dbcon.php');
include ('session.php');
include ('includes/btstrap.php');
?>	


<style>
	.info-box{
		box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
		border-radius: 0.25rem;
		background-color: #fff;
		display: -ms-flexbox;
		display: flex;
		margin-bottom: 1rem;
		min-height: 80px;
		padding: .5rem;
		position: relative;
		width: 100%;
	}


	.info-box .info-box-icon {
		border-radius: 0.25rem;
		-ms-flex-align: center;
		align-items: center;
		display: -ms-flexbox;
		display: flex;
		font-size: 1.875rem;
		-ms-flex-pack: center;
		justify-content: center;
		text-align: center;
		width: 70px;
	}

	.info-box .info-box-content {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		-ms-flex-pack: center;
		justify-content: center;
		line-height: 1.8;
		-ms-flex: 1;
		flex: 1;
		padding: 0 10px;
	}

	.info-box .info-box-number{
		text-align:right;
		color: #343a40 !important;
		display: block;
		margin-top: .25rem;
		font-weight: 700;
	}
	.bg-primary{
		color:#fff;
	}

	.elevation-1{
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
	}

</style>
<div class="container-fluid px-4">
	<h3 class="mt-4">Welcome to DENR-OLMS Dashboard</h3>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| Home / &nbsp;<span style="color:#004AD6">DASHBOARD</span></li>
	</ol>
	<hr class="bg-light">
	<div class="row">
		<!--Content Start Here-->

		<div class="col-12 col-sm-6 col-md-3">

			<div class="info-box">
				<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-th-list"></i></span>
				<div class="info-box-content">
					<?php
						include ('includes/dbcon.php');
						$userlvl = $_SESSION['user_lvl'];
						$offDept = $_SESSION['OffDept'];
						$designation = $_SESSION['designation'];
						$TinNum = $_SESSION['TinNum'];


						if ($userlvl == 'Non-Signatory' || $userlvl == '') {
						    //echo 'user';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE red_sign=' ' AND TinNum='$TinNum'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Application Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						    
						}
						// Signatory user in AD department
						else if($designation == 'Initial') {
						    //echo 'initial';
						   
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE prsnl_stat=' '");
						    $countRow = mysqli_fetch_assoc($query); // renamed variable to avoid conflict
						    $count = $countRow['count'];

						    if($count < 1)
						    {
						    	echo '<span class="info-box-text">Leave Request</span>
						    		<span class="info-box-number text-right"> 0 </span>';
						    }else {
						    	echo '
								    <span class="info-box-text">Leave Request</span>
								    <span class="info-box-number text-right">' . $count . '</span>';
						    } 
								
						}
						else if($designation == 'NA') {  // Fixed comparison operator from '=' to '=='
						    //echo 'personnel';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE dc_sign!=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in ORED (ARDMS) department
						else if ($offDept == 'ARDMS' && $userlvl == 'Signatory') {
						   //echo 'RED';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE prsnl_sign!=' ' AND red_sign=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Leave Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Specific condition for 'Signatory' AND 'Division Chief'
						else if ($designation == 'Division Chief') {
						    //echo 'Division Chief';
							$query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE dc_sign=' ' AND OffDept='$offDept'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Leave Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}

					?>
				</div>
			</div>
		</div>

		<div class="col-12 col-sm-6 col-md-3">	
			<div class="info-box">
				<span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-spinner" style="color:white;"></i></span>
				<div class="info-box-content">
					<?php
					
						include ('includes/dbcon.php');
						$userlvl = $_SESSION['user_lvl'];
						$offDept = $_SESSION['OffDept'];
						$designation = $_SESSION['designation'];
						$TinNum = $_SESSION['TinNum'];

						if ($userlvl == 'Non-Signatory'  || $userlvl == '') {
						    //echo 'user';
						    $query = mysqli_query($conn, "SELECT COUNT(*) AS count
								FROM detsapp_tbl
								WHERE DATEDIFF(NOW(), DteFil) >=3
								AND (red_sign IS NULL OR red_sign = '') AND TinNum='$TinNum'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Pending Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in AD department
						else if($designation == 'Initial') {
						    //echo 'initial';
						    $query = mysqli_query($conn, "SELECT COUNT(*) AS count
									FROM detsapp_tbl
									WHERE DATEDIFF(NOW(), DteFil) >=3
									AND (prsnl_sign IS NULL OR prsnl_sign = '')");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Pending Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						else if($designation == 'NA') {  // Fixed comparison operator from '=' to '=='
						    //echo 'personnel';
						    $query = mysqli_query($conn, "SELECT COUNT(*) AS count
									FROM detsaction_tbl
									WHERE DATEDIFF(NOW(), LeaveCredDte) >=3
									AND (prsnl_stat IS NULL OR prsnl_stat = '')");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Pending Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in ORED (ARDMS) department
						else if ($offDept == 'ARDMS' && $userlvl == 'Signatory') {
						    //echo 'RED';
						    $query = mysqli_query($conn, "SELECT COUNT(*) AS count
								FROM detsapp_tbl
								WHERE DATEDIFF(NOW(), DteFil) >=3
								AND (red_sign IS NULL OR red_sign = '')");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Pending Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Specific condition for 'Signatory' AND 'Division Chief'
						else if ($designation == 'Division Chief') {
						    //echo 'Division Chief';
						    $query = mysqli_query($conn, "SELECT COUNT(*) AS count
								FROM detsapp_tbl
								WHERE DATEDIFF(NOW(), DteFil) >=3
								AND (dc_sign IS NULL OR dc_sign = '') AND OffDept='$dept'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Pending Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}

					?>
				</div>
			</div>
		</div>

		<div class="col-12 col-sm-6 col-md-3">	
			<div class="info-box">
				<span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-thumbs-up text-white"></i></span>
				<div class="info-box-content">
					<?php
						include ('includes/dbcon.php');
						$userlvl = $_SESSION['user_lvl'];
						$offDept = $_SESSION['OffDept'];
						$designation = $_SESSION['designation'];


						if ($userlvl == 'Non-Signatory' || $userlvl == '') {
						    //echo 'user';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE red_sign!=' ' AND TinNum='$TinNum'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Approved Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in AD department
						else if($designation == 'Initial') {
						    //echo 'initial';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE prsnl_sign!=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Approved Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						else if($designation == 'NA') {  // Fixed comparison operator from '=' to '=='
						    //echo 'personnel';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsaction_tbl WHERE prsnl_stat!=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Submitted Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in ORED (ARDMS) department
						else if ($offDept == 'ARDMS' && $userlvl == 'Signatory') {
						    //echo 'RED';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE red_sign!=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Approved Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Specific condition for 'Signatory' AND 'Division Chief'
						else if ($designation == 'Division Chief') {
						    //echo 'Division Chief';
						   	$query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE dc_sign!=' ' AND OffDept='$offDept'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Approved Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
					?>

				</div>
			</div>
		</div>


		<!---Rejected-->
		<div class="col-12 col-sm-6 col-md-3">	
			<div class="info-box">
				<span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-thumbs-down text-white"></i></span>
				<div class="info-box-content">
					<?php
						include ('includes/dbcon.php');
						$TinNum = $_SESSION['TinNum'];
						$userlvl = $_SESSION['user_lvl'];
						$offDept = $_SESSION['OffDept'];
						$designation = $_SESSION['designation'];


						if ($userlvl == 'Non-Signatory' || $userlvl == '') {
						    //echo 'user';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE reject_red !=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Rejected Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in AD department
						else if($designation == 'Initial') {
						    //echo 'initial';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE reject_prsnl!=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Rejected Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						else if($designation == 'NA') {  // Fixed comparison operator from '=' to '=='
						    //echo 'personnel';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE reject_prsnl !=' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Rejected Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Signatory user in ORED (ARDMS) department
						else if ($offDept == 'ARDMS' && $userlvl == 'Signatory') {
						    //echo 'RED';
						   	$query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE reject_red != ' '");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Rejected Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
						// Specific condition for 'Signatory' AND 'Division Chief'
						else if ($designation == 'Division Chief') {
						    //echo 'Division Chief';
						    $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM detsapp_tbl WHERE reject_dc !='  ' AND OffDept='$offDept'");
							$row = mysqli_fetch_assoc($query);
							$count = $row['count'];
							echo '
							<span class="info-box-text">Rejected Request</span>
							<span class="info-box-number text-right">' . $count . '</span>';
						}
					?>
				</div>
			</div>
		</div>
		
		<!--Total of Filed Monthly Report-->
		<div class="container-fluid px-3">
			<hr class="bg-light mb-4 ">
			<div class="card mb-4">
				<div class="card-header bg-primary">
					<i class="fas fa-calendar me-1"></i>
					Monthly Filed Leave
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th>Month</th>
								<th>Year</th>
								<th>Type of Leave</th>
								<th>Sum of Approved File Leave</th>
							</tr>
						</thead>
						<tbody>
							<!--SELECT RECORDS FROM ATTENDANCE_TBL TBL-->
							<?php 
								$TinNum = $_SESSION['TinNum'];
								$query = "SELECT *,
								    YEAR(DteFil) AS year,
								    MONTHNAME(DteFil) AS month,
								    SUM(NumWorkDays) AS total_work_days
								FROM
								    detsapp_tbl
								WHERE 
								    TinNum='$TinNum' AND red_sign<>''
								GROUP BY
								    YEAR(DteFil),
								    MONTH(DteFil)
								ORDER BY
								    year DESC, MONTH(DteFil) DESC"; // Sorting by month and year

								$result = mysqli_query($conn, $query);

								while ($row = mysqli_fetch_assoc($result)) {
								?>
								    <tr>
								        <td><?=$row['month'];?></td>
								        <td><?=$row['year'];?></td>
								        <td><?=$row['TypeLeave'];?></td>
								        <td><?=$row['total_work_days'];?></td> <!-- Showing the sum of workdays -->
								    </tr>
								<?php
								}
							?>
						</tbody>
					</table>

				</div>
			</div>
			<!--Total of Filed Monthly Report-->
<div class="row">
				<div class="col-lg-5 col-md-8 col-sm-12 mb-4">
					<hr class="border-dark">
					<div class="card">
						<div class="card-body">

							<div class="d-flex justify-content-between align-items-center mb-4">
								<h5 class="mb-0">Leave Credits</h5>
								<a href="#"><i class="fa-solid fa-eye fa-lg"></i></a>
							</div>
							<div class="table-responsive">
								<table class="table table-striped">
									<colgroup>
										<col width="25%">
										<col width="25%">
										<col width="25%">
										<col width="25%">
									</colgroup>
									<thead>
										<tr>
											<th class="py-1 px-2">Request No.</th>
											<th class="py-1 px-2">Leave Type</th>
											<th class="py-1 px-2">Less</th>
											<th class="py-1 px-3">Balanced</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$TinNum = $_SESSION['TinNum'];

											$query_action = "SELECT * FROM detsaction_tbl WHERE TinNum='$TinNum' ORDER BY RollNum DESC LIMIT 5";
											$result_action = mysqli_query($conn, $query_action);

											while ($row_action = mysqli_fetch_assoc($result_action)) {
											$TinNum = $row_action['TinNum'];  // TinNum for this row
											$query_leave = "SELECT TypeLeave FROM detsapp_tbl WHERE TinNum='$TinNum'";
											$result_leave = mysqli_query($conn, $query_leave);
											$row_leave = mysqli_fetch_assoc($result_leave);

											// Output the data
											?>
											<tr>
											    <td>
											        <b><?=$row_action['ReqNum'];?></b><br>
											        
											    </td>
											    <td>
											        <b><?=$row_leave['TypeLeave'];?></b><br>
											    </td>
											    <td class="text-center">

											    	<?php 
											    		if($row_leave['TypeLeave']=='Vacation Leave')
											    		{
											    		 	echo $row_action['VLLess'];
											    		}else if($row_leave['TypeLeave']=='Vacation Leave'){
											    			echo $row_action['SLLess'];
											    		}
											    	?>
											    </td>
											    <td class="text-center">

											    	<?php 
											    		if($row_leave['TypeLeave']=='Vacation Leave')
											    		{
											    		 	echo $row_action['VLBal'];
											    		}else if($row_leave['TypeLeave']=='Vacation Leave'){
											    			echo $row_action['SLBal'];
											    		}
											    	?>
											</tr>
											<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				
				
				<div class="col-lg-7 col-md-6 col-sm-12 mb-4">
					<hr class="border-dark">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center mb-2">
								<h5 class="mb-0">Recent Request</h5>
								<a href="LeaveRequest.php"><i class="fa-solid fa-ellipsis fa-xl"></i></a>
							</div>
							<div class="table-responsive">
								<table class="table table-striped">
									<colgroup>
										<col width="25%">
										<col width="25%">
										<col width="25%">
										<col width="25%">
									</colgroup>
									<thead>
										<tr>
											<th class="p-1">Request Number</th>
											<th class="p-1">Leave Type</th>
											<th class="p-1">Date Filed</th>
											<th class="p-1">Days</th>
											<th class="p-1">Status</th>
										</tr>
									</thead>
									<tbody> 
										<?php 
										$query = "SELECT * FROM detsapp_tbl WHERE TinNum='$TinNum' ORDER BY RollNum DESC LIMIT 5";
										$result = mysqli_query($conn, $query);
										while ($row = mysqli_fetch_assoc($result)) {
											?>
											<tr>
												<td><b><?=$row['ReqNum'];?></b></td>
												<td class="px-2"><?=$row['TypeLeave'];?></td>
												<td class="px-2"><?=$row['DteFil'];?></td>
												<td class="px-2"><?=$row['NumWorkDays'];?> Working Day/s</td>
												<td>
													<?php
													$dc_sign = trim($row['dc_sign']);
													$prsnl_sign = trim($row['prsnl_sign']);
													$red_sign = trim($row['red_sign']);

													if (empty($dc_sign)) {
														echo "<p class='bg-warning text-white text-center rounded' style='width:100px; font-size:13px;'<b>For Chief Approval</b></p>";
													} elseif (!empty($dc_sign) && empty($prsnl_sign)) {
														echo "<p class='bg-warning text-white text-center rounded' style='width:100px; font-size:13px;'>For Personnel Approval</p>";
													} elseif (!empty($dc_sign) && !empty($prsnl_sign) && empty($red_sign)) {
														echo "<p class='bg-warning text-white text-center rounded' style='width:100px; font-size:13px;'>For ARDMS Approval</p>";
													} elseif (!empty($dc_sign) && !empty($prsnl_sign) && !empty($red_sign)) {
														echo "<p class='bg-success text-white text-center rounded' style='width:100px; font-size:13px;'>Approved</p>";
													}
													?>
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--END Content-->

	<?php
	include ('includes/footer.php');
	include ('includes/scripts.php');
	?>	


