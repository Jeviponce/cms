<h6 class="mt-4" style="text-transform:uppercase;">Reservation Status</h6>
<hr>
<div class="card mb-4">
    <div class="card-header">
        
        <a class="" data-bs-toggle="modal" data-bs-target="#filterModal">
     	  <i class="fa-solid fa-filter"></i><i class="fa-solid fa-sort-down"></i>
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
                  	<th>Service</th>
                  	<th>Description</th>
                  	<th>Grave Number</th>
                  	<th>Lots</th>
                  	<th>Coffin Size</th>
                    <!--<th>Burial Permit</th>-->
                    <!--<th>Re-Burial Permit</th>-->
                    <!--<th>Death Certicate</th>-->
                    <th>Date of Schedule</th>
                    <th>Date of Reservation</th>
                    <th>Status</th>
                    <th>View</th>
                   	
                </tr>
            </thead>
            <tbody>
            	<?php include 'filter_customer_bookings.php';?>
				<?php include 'customer_booking_modal.php'; ?>
            </tbody>
        </table>
    </div>
</div>