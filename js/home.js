$(document).ready(function() {
    // Bind the form submission event
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission behavior

        // Create a JSON object with the form data
        var formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        // Send an AJAX request to the PHP script
        $.ajax({
            type: 'POST', // Method of request
            url: '../action/home_action.php', // Path to the PHP script
            contentType: "application/json", // Type of data you're sending
            data: JSON.stringify(formData), // Convert the JavaScript object to a JSON string
            success: function(response) {
                // Process the JSON response from the server
                if (response.status === 'success') {
                    // Redirect to home page or show success message
                    window.location.href = '../view/user_dashboard_view.php'; // Adjust the redirection URL as needed
                } else {
                    // Show an error message
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle any AJAX errors
                alert('Error: ' + error);
            }
        });
    });
});