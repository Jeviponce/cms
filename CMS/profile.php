<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['lvl']) || !isset($_SESSION['mail']) || $_SESSION['status'] !== 'valid') {
        header("Location: ../index.php"); // Redirect to login page
        exit();
    }

    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/navbar.php');
    include('includes/dbcon.php');

    try {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM user_tbl WHERE Id='$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    } catch (Exception $e) {
        echo $e;
    }
?>

<link rel="stylesheet" type="text/css" href="css/profile-style.css">
<link rel="stylesheet" href="css/style_tbl_bc.css">

<style>
    .card {
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
        margin-bottom: 1.5rem;
    }

    .card-header {
        font-weight: bold;
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        text-transform: uppercase;
    }

    .card-body {
        padding: 1.5rem;
    }

    .img-thumbnail {
        border-radius: 50%;
        border: 3px solid #007bff;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        padding: 0.75rem;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
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
<div class="container-fluid">
    <h3 class="mt-4" style="text-transform:uppercase;">Your Profile</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| HOME/<span style="color:#004AD6">PROFILE</span></li>
    </ol>
    <div class="row">
        <!-- Profile Picture Section -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <form method="POST" action="profile_update_query.php" enctype="multipart/form-data" autocomplete="off">
                        <?php 
                            if($row['img'] != '') {
                                echo '<img src="img/'.$row['img'].'" alt="Profile Picture" id="cimg" class="img-fluid img-thumbnail">';
                            } else {
                                echo '<img src="img/no-image-available.png" alt="No Image" id="cimg" class="img-fluid img-thumbnail">';
                            }
                        ?>
                        <div class="small font-italic text-muted mb-4 my-2">JPG or PNG no larger than 5 MB</div>
                        <input type="file" id="image" class="form-control" name="img" placeholder="Select Image" autocomplete="off" onchange="readURL(this);">
                        <input type="hidden" class="form-control" name="old_img" value="<?php echo $row['img']; ?>">
                </div>
            </div>
        </div>

        <!-- Account Details Section -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Full Name</label>
                        <input class="form-control" id="inputUsername" name="fname" type="text" placeholder="Enter your full name" value="<?php echo $row['FName']; ?>">
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputEmail">Email Address</label>
                            <input class="form-control" id="inputEmail" name="mail" type="email" placeholder="Enter your email" value="<?php echo $row['Mail']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputContact">Contact Number</label>
                            <input class="form-control" id="inputContact" name="cnum" type="text" placeholder="Enter your contact number" value="<?php echo $row['CNumber']; ?>">
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputAddress">Address</label>
                            <input class="form-control" id="inputAddress" name="address" type="text" placeholder="Enter your address" value="<?php echo $row['Address']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputUserType">User Type</label>
                            <input class="form-control" id="inputUserType" type="text" readonly value="<?php echo $row['userlvl'] == 0 ? 'Client' : 'Administrator'; ?>">
                        </div>
                    </div>
                    <input class="btn btn-success float-right" type="submit" name="submit" value="Confirm Changes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->

<?php
        include('includes/scripts.php');
?>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#cimg').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
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