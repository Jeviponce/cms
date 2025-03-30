<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Scanner</title>
  <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
  <style>
    video {
      width: 100%;
      height: auto;
      border: 1px solid black;
    }
    #scanner {
      position: relative;
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
      padding: 10px;
    }
    #result {
      margin-top: 10px;
      font-size: 18px;
    }
    #cameraError {
      margin-top: 10px;
      font-size: 18px;
      color: red;
    }
    button {
      margin-top: 10px;
    }
    input[type="text"] {
      width: 100%;
      height: 30px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div id="scanner">
    <video id="video" width="100%" height="auto" autoplay></video>
    <canvas id="canvas" style="display:none;"></canvas>
    
    <!-- Text box to show the QR result (result1) -->
    <input type="hidden" id="result" readonly placeholder="Scan a QR code" name="result1">
    
    <!-- Text box to copy the result (result2) -->
    <input type="text" id="result2" readonly name="Result2">
    
    <!-- Text box to show camera errors -->
    <p id="cameraError"></p>
    
  </div>

  <script>
    let currentStream = null;
    let activeCamera = 'environment'; // 'environment' for back, 'user' for front
    let videoElement = document.getElementById('video');
    let canvasElement = document.getElementById('canvas');
    let resultElement = document.getElementById('result');
    let result2Element = document.getElementById('result2');
    let cameraErrorElement = document.getElementById('cameraError');

    async function startCamera(cameraType = 'environment') {
      const constraints = {
        video: {
          facingMode: cameraType
        }
      };

      try {
        // Stop any previous stream
        if (currentStream) {
          currentStream.getTracks().forEach(track => track.stop());
        }

        currentStream = await navigator.mediaDevices.getUserMedia(constraints);
        videoElement.srcObject = currentStream;
        cameraErrorElement.innerText = ''; // Clear any previous error messages
        scanQRCode();
      } catch (err) {
        console.error("Error accessing the camera: ", err);
        cameraErrorElement.innerText = "Error accessing the camera: " + err.message;
        // Don't clear the QR result if there's a camera error
      }
    }

    function scanQRCode() {
      const canvas = canvasElement;
      const context = canvas.getContext('2d');
      const videoWidth = videoElement.videoWidth;
      const videoHeight = videoElement.videoHeight;

      // If video dimensions are not ready, return and wait for them
      if (videoWidth === 0 || videoHeight === 0) {
        requestAnimationFrame(scanQRCode);
        return;
      }

      canvas.width = videoWidth;
      canvas.height = videoHeight;

      context.drawImage(videoElement, 0, 0, videoWidth, videoHeight);
      const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
      const code = jsQR(imageData.data, canvas.width, canvas.height);

      if (code) {
        const qrData = code.data;
        // Display the QR data
        resultElement.value = `QR Code Data: ${qrData}`;
        result2Element.value = qrData; // Store the QR data in result2Element
        cameraErrorElement.innerText = ''; // Clear camera error message if QR code is found

        // Check if result2 has a value (not empty), then open it in a new tab
        if (result2Element.value.trim() !== "") {
          window.open(result2Element.value, '_blank');  // Open URL in a new tab
        }
      } else {
        resultElement.value = "Scanning..."; // Show scanning status
      }

      // Continue scanning
      requestAnimationFrame(scanQRCode);
    }

    function toggleCamera() {
      activeCamera = activeCamera === 'environment' ? 'user' : 'environment';
      startCamera(activeCamera);
    }

    // Start with the back camera by default
    startCamera(activeCamera);
  </script>

</body>
</html>
