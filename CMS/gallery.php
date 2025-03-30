<?php
require_once('includes/dbcon.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="css/gallery_style.css">
   
</head>
 <style>
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      display: inline-block;
      margin-right: 10px;
    }
    a {
      text-decoration: none;
      color: blue;
      cursor: pointer;
    }
  </style>
<body>

    <!-- Navbar -->
    <nav class="nav-extended teal lighten-2">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo"><i class="fa-solid fa-cross"></i>St. Joseph Catholic Cemetery</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="#" onclick="generateQRCode()">QR Code</a></li>
                <input type="hidden" id="text-input" placeholder="Enter text to encode" value="https://27.110.165.6:8083/cms/CMS/">
            </ul>
        </div>
    </nav>
    
  <div id="qrcode"></div>
    <div class="container">

        <h3 class="header-title">Upload to Gallery</h3>

        <form action="./imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">
            <!-- Show error messages -->
            <?php if (!empty($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <li><?php echo $_SESSION['error']; ?></li>
                    </ul>
                </div>
            <?php unset($_SESSION['error']); } ?>

            <!-- Show success messages -->
            <?php if (!empty($_SESSION['success'])) { ?>
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo $_SESSION['success']; ?></strong>
                </div>
            <?php unset($_SESSION['success']); } ?>

            <div class="row">
                <div class="col s12 m6">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="validate" placeholder="Enter image title" required>
                </div>
                <div class="col s12 m6">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="validate" required>
                </div>
                <div class="col s12">
                    <button type="submit" class="btn-upload">Upload</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php
                $sql = "SELECT *, SUBSTRING_INDEX(image, '.', -1) AS file_extension FROM gallery;";
                $images = mysqli_query($conn, $sql);

                if ($images) {
                    while ($image = mysqli_fetch_assoc($images)) {
                        $filePath = './uploads/' . $image['image'];
                        $NoImage = './uploads/no-image-available.png';
                        $fileExtension = strtolower($image['file_extension']);
            ?>
                <div class="col s12 m4 l3">
                    <div class="gallery-card">
                        <?php if ($fileExtension === 'png' || $fileExtension === 'jpeg' || $fileExtension === 'jpg') { ?>
                            <a class="fancybox" rel="ligthbox" href="<?php echo $filePath; ?>">
                                <img alt="" src="<?php echo $filePath; ?>" />
                            </a>
                        <?php } else { ?>
                            <a class="fancybox" rel="ligthbox" href="<?php echo $filePath; ?>">
                                <img alt="" src="<?php echo $NoImage; ?>" />
                            </a>
                        <?php } ?>

                        <div class="card-content">
                            <small><?php echo $image['title']; ?></small>
                        </div>
                        <form action="./imageDelete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $image['id']; ?>">
                            <button type="submit" class="close-icon btn btn-danger"><i class="mdi mdi-delete"></i></button>
                        </form>
                    </div>
                </div>
            <?php
                    }
                } else {
                    echo "Error: Unable to fetch images.";
                }

                mysqli_close($conn);
            ?>
        </div>

    </div>

    <!-- Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <span class="footer-text">Copyright &copy; Rest in Digital Peace System 2024</span>
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none",
            });

            // Materialize initialization
            M.AutoInit();  
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
      <script>
        function generateQRCode() {
          // Get the text input
          const text = document.getElementById("text-input").value;

          if (text) {
            // Create a new window
            const newWindow = window.open("", "_blank");

            // Generate the QR code
            const qrCodeContainer = document.createElement("div");
            new QRCode(qrCodeContainer, {
              text: text,
              width: 200,
              height: 200,
              colorDark: "#000000",
              colorLight: "#ffffff",
            });

            // Wait for the QR code to be generated
            setTimeout(() => {
              // Extract the generated <img> element
              const qrCodeImage = qrCodeContainer.querySelector("img");

              if (qrCodeImage) {
                // Insert the QR code image into the new window
                newWindow.document.write(`
                  
                      <img src="${qrCodeImage.src}" alt="QR Code">
                   
                `);
                newWindow.document.close();
              } else {
                alert("QR code generation failed. Please try again.");
              }
            }, 100); // Delay to ensure the QR code is rendered
          } else {
            alert("Please enter text to generate a QR code.");
          }
        }
      </script>
</body>
</html>
