<?php  
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['lvl']) || !isset($_SESSION['mail']) || $_SESSION['status'] !== 'valid') {
        header("Location: ../index.php"); // Redirect to login page
        exit();
    }

    include ('includes/dbcon.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/navbar.php');
    $lvl= $_SESSION['lvl'];
    $mail = $_SESSION['mail'];
?>

<style>
    .info-box {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
        border-radius: 0.5rem;
        background-color: #f8f9fa;
        display: flex;
        margin-bottom: 1.5rem;
        min-height: 100px;
        padding: 1rem;
        position: relative;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .info-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15), 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .info-box .info-box-icon {
        border-radius: 0.5rem;
        align-items: center;
        display: flex;
        font-size: 2rem;
        justify-content: center;
        text-align: center;
        width: 80px;
        height: 80px;
        color: #fff;
    }

    .info-box .info-box-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1.5;
        flex: 1;
        padding-left: 15px;
    }

    .info-box .info-box-text {
        font-size: 1rem;
        font-weight: 600;
        color: #495057;
    }

    .info-box .info-box-number {
        font-size: 1.25rem;
        font-weight: 700;
        color: #343a40;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-secondary {
        background-color: #6c757d !important;
    }

    .breadcrumb {
        background-color: #e9ecef;
        border-radius: 0.25rem;
        padding: 0.75rem 1rem;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    h3 {
        font-weight: bold;
        color: #343a40;
    }
</style>

<!-- Begin Page Content -->
<link rel="stylesheet" href="css/style_tbl_bc.css">
<div class="container-fluid px-4">
    <h3 class="mt-4" style="text-transform:uppercase;">St. Joseph Catholic Cemetery</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| <a href="index.php" style="color:#004AD6;">Home</a></li>
    </ol>
    
    <!--Content Start Here-->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-user-tie"></i></span>
                <div class="info-box-content">
                    <?php 
                        if($lvl==0) {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE UserMail='$mail'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">For Confirmation</span>
                            <span class="info-box-number">' . $count . '</span>';
                        } else {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_tbl WHERE userlvl='0'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Customer</span>
                            <span class="info-box-number">' . $count . '</span>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                    <?php 
                        if($lvl==0) {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM gallery WHERE UserMail='$mail'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Media</span>
                            <span class="info-box-number">' . $count . '</span>';
                        } else {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_tbl WHERE userlvl='1'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number">' . $count . '</span>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php if ($lvl != '0') { ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <?php 
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE status='1'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Confirmed</span>
                            <span class="info-box-number">' . $count . '</span>';
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa-solid fa-file-pen"></i></span>
                    <div class="info-box-content">
                        <?php 
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE status='0'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Reservation</span>
                            <span class="info-box-number">' . $count . '</span>';
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Bar Graph Section -->
    <div class="row">
        <div class="col-md-12">
            <?php if ($lvl == '0') { ?>
                <?php include 'customer-bookings.php'; ?>
            <?php } else { ?>
                <canvas id="reservationChart"></canvas>
            <?php } ?>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        <?php
        // Fetch reservation data grouped by year and month
        $query = mysqli_query($conn, "
            SELECT 
                YEAR(dte) as year, 
                MONTH(dte) as month, 
                COUNT(*) as total 
            FROM schedule_list 
            GROUP BY YEAR(dte), MONTH(dte)
        ");

        $monthNames = [
            '', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $months = [];
        $totals = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $months[] = $monthNames[$row['month']] . ' ' . $row['year'];
            $totals[] = $row['total'];
        }
        ?>

        const labels = <?php echo json_encode($months); ?>;
        const data = <?php echo json_encode($totals); ?>;

        const ctx = document.getElementById('reservationChart').getContext('2d');
        const reservationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Reservations',
                    data: data,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total Reservations by Month'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Reservations'
                        },
                        beginAtZero: true,
                        ticks: {
                            precision: 0 // Ensure whole numbers
                        }
                    }
                }
            }
        });
    </script>
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
