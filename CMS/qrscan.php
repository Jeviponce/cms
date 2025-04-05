<?php
require_once('includes/dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cemetery Map</title>
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
  <style>
    table.striped tbody tr:nth-child(odd) {
    background-color: transparent; /* Removes the striped effect */
}

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
    
    /* Remove table stripes */
    table.striped tbody tr:nth-child(odd) {
        background-color: transparent; /* Removes the striped effect */
    }
</style>


<body>

    <!-- Navbar -->
    <nav class="nav-extended teal lighten-2">
    <div class="nav-wrapper container">
        <a class="brand-logo" style="text-decoration: none;"><i class="fa-solid fa-cross"></i>St. Joseph Catholic Cemetery</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="dashboard.php" style="text-decoration: none;">Home</a></li>
        </ul>
    </div>
</nav>

    
  <div id="qrcode"></div>
    <div class="container">
        <br>
        <h3 class="header-title">QR CODE SCANNER</h3>

        <div class="form-image-upload">
           
                <div class="col s12 m6">
                    <label for="title">QR Code Result: </label><p id="description-output"></p>
                    <!-- Text box to show the QR result (result1) -->
                    <input type="hidden" id="result" readonly placeholder="Scan a QR code" name="result1">
                    <!-- Text box to copy the result (result2) -->
                    <input type="text" id="result2" readonly name="Result2" placeholder="Result">
                </div>

                <div class="col s12">
                    <button class="btn-upload" onclick="toggleCamera()" >Switch Camera</button>
                </div>
            
        </div>

        <div class="row">
            <?php include 'includes/scanner.php'; ?>
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

        // Function to handle QR code scanning result
        function handleQRCodeResult(result) {
            document.getElementById('result').value = result; // Set hidden input value
            if (result) {
                window.location.href = result; // Redirect to the scanned QR code link
            }
        }
    </script>
    <!-- Include scanner logic -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <script src="includes/scanner.js"></script>
    <!-- Ensure scanner.js calls handleQRCodeResult(result) when a QR code is scanned -->
  
</body>
</html>
