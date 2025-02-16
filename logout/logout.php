<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = []; // Clear all session variables
session_destroy(); // Destroy the session

// Use JavaScript to update localStorage and then redirect to the login page
echo "<script>
    window.onload = function() {
        // Create a custom logout success modal
        var modal = document.createElement('div');
        modal.id = 'logout-modal';
        modal.style.position = 'fixed';
        modal.style.top = '50%';
        modal.style.left = '50%';
        modal.style.transform = 'translate(-50%, -50%)';
        modal.style.backgroundColor = '#4CAF50';
        modal.style.color = '#fff';
        modal.style.padding = '20px 30px';
        modal.style.borderRadius = '10px';
        modal.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        modal.style.textAlign = 'center';
        modal.style.zIndex = '1000';
        modal.style.fontFamily = 'Arial, sans-serif';
        modal.innerHTML = '<h2>You have been logged out successfully!</h2><p>Loading...</p>';

        document.body.appendChild(modal); // Append the modal to the body

        // Ensure modal is displayed properly
        setTimeout(function() {
            // Redirect after the modal message
            localStorage.setItem('isLoggedIn', 'false'); // Set isLoggedIn to false
            window.location.href = '../index.html'; // Redirect to the login page
        }, 3000); // 3 seconds delay for the modal to be visible
    }
</script>";
exit();
