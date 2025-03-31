<?php  
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['lvl']) || !isset($_SESSION['mail'])) {
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
<!-- Begin Page Content -->
<link rel="stylesheet" href="css/style_tbl_bc.css">
<div class="container-fluid px-4">
    <h3 class="mt-4" style="text-transform:uppercase;">St. Joseph Catholic Cemetery</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| <span style="color:#004AD6">HOME</span></li>
    </ol>
    
    <!--Content Start Here-->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">

              <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-user-tie" style="color:white;"></i></span>
                <div class="info-box-content">
                    <?php 

                        if($lvl==0)
                        {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE UserMail='$mail'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">For Confirmation</span>
                            <span class="info-box-number text-right">' . $count . '</span>';

                        }else{
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_tbl WHERE userlvl='0'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Customer</span>
                            <span class="info-box-number text-right">' . $count . '</span>';
                        }

                        
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">  

            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i>

                </span>
                <div class="info-box-content">
                    <?php 

                        if($lvl==0)
                        {
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM gallery WHERE UserMail='$mail'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total Media</span>
                            <span class="info-box-number text-right">' . $count . '</span>';
                            
                        }else{
                            $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM user_tbl WHERE userlvl='1'");
                            $row = mysqli_fetch_assoc($query);
                            $count = $row['count'];
                            echo '
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number text-right">' . $count . '</span>';
                        }
                     
                    ?>
                </div>

            </div>
          
        </div>

       <?php if ($lvl != '0') { ?>
            <div class="col-12 col-sm-6 col-md-3">  
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-thumbs-up text-white"></i></span>
                    <div class="info-box-content">
                        <?php 
                          $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE status='1'");
                          $row = mysqli_fetch_assoc($query);
                          $count = $row['count'];
                          echo '
                          <span class="info-box-text">Total Confirmed</span>
                          <span class="info-box-number text-right">' . $count . '</span>';
                        ?>
                    </div>
                </div>
            </div>

            <!--- Rejected -->
            <div class="col-12 col-sm-6 col-md-3">  
                <div class="info-box">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa-solid fa-file-pen text-white"></i></span>
                    <div class="info-box-content">
                        <?php 
                          $query = mysqli_query($conn, "SELECT COUNT(*) as count FROM schedule_list WHERE status='0'");
                          $row = mysqli_fetch_assoc($query);
                          $count = $row['count'];
                          echo '
                          <span class="info-box-text">Total Reservation</span>
                          <span class="info-box-number text-right">' . $count . '</span>';
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
