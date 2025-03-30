<?php 
    session_start();
    include ('includes/dbcon.php');
    include('includes/header.php');
?>

<!-- Begin Page Content -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid px-4">
    <div class="text-center">
        <h3 class="mt-4" style="text-transform:uppercase;">St. Joseph Catholic Cemetery</h3>       
        <ol class="breadcrumb mb-4 justify-content-center">
            <li class="breadcrumb-item active" style="text-transform: uppercase;">
                335 Naga Rd, 1, Las Piñas, 1742 Metro Manila
            </li>
        </ol>
    </div>

    <!-- Bootstrap Table -->
    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reference Number</th>
                    <th>Full Name</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Grave Number</th>
                    <th>Lots</th>
                    <th>Coffin Size</th>
                    <th>Date of Schedule</th>
                    <th>Date of Reservation</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'filter_report.php';?>
                <?php include 'resevation_modal.php'; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Main Content -->

<!-- Print on Page Load -->
<script>
    window.onload = function() {
        // Add a slight delay to ensure the page is fully rendered before printing
        setTimeout(function() {
            window.print();
        }, 500); // 500ms delay
    };

    // Listen for the print dialog being closed (both print and cancel)
    window.onafterprint = function() {
        window.history.back(); // Navigate back to the previous page
    };
</script>

<?php
    include('includes/scripts.php');
?>
