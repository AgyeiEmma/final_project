$(document).ready(function() {
    console.log("something")
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var password = $('#password').val();
        var confirmPassword = $('#password-confirm').val();
        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return; // Stop the form submission
        }

        console.log($('#email').val())

        $.ajax({
            type: 'POST',
            url: '../action/register_action.php',
            data:  JSON.stringify({email: $('#email').val(), password: $('#password').val(), phone: $('#phone').val(), name: $('#name').val()}), //$(this).serialize(),
            dataType: 'JSON',
            success: function(response) {
                console.log(response)
                // Check the response from the server
                if (response.status.trim() === "success") {
                    // Redirect to the home page on success
                    window.location.href = '../view/home_view.php';
                } else {
                    // Inform the user of the failure
                    alert(response);
                }
            },
            error: function(error) {
                console.log(error)
                alert('An error occurred during registration.');
            }
        });
    });
});