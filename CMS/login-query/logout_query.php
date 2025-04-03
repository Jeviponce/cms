<?php 
    session_start();
    $_SESSION['status'] = 'invalid';
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    setcookie(session_name(), '', time() - 3600, '/'); // Expire the session cookie
    echo "<script>
        alert('You have been logged out.');
        window.location.href='/cms';
    </script>"; // Redirect to the home page with a notification
?>