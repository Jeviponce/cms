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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="mt-2 text-primary">CALENDAR</h3>
        </div>
        <div class="card-body">
            <ol class="breadcrumb mb-4 bg-light p-2 rounded">
                <li class="breadcrumb-item active" style="text-transform: uppercase;">
                    You're Here&nbsp;| DASHBOARD/<span style="color:#004AD6">CALENDAR</span>
                </li>
            </ol>
            <div class="card mb-2">
                <div class="card-body">
                    <?php include 'calendar_backend.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php
    include('includes/footer.php');
    include('includes/scripts.php');
?>



