<?php 
	session_start();
	include ('includes/dbcon.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<link rel="stylesheet" href="css/map_style.css">
<div class="container-fluid px-4">
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h3 class="mt-2 text-primary">RESERVE GRAVE SLOT</h3>
       </div>
       <div class="card-body">
           <ol class="breadcrumb mb-4 bg-light p-2 rounded">
               <li class="breadcrumb-item active" style="text-transform: uppercase;">
                   You're Here&nbsp;| Dashboard/<span style="color:#004AD6">RESERVE GRAVE SLOT</span>
               </li>
           </ol>
           <?php include 'booking_map.php'?>
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
