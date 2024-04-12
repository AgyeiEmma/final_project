// Example: Add a simple script to dynamically change the year in the footer
document.addEventListener('DOMContentLoaded', function() {
    const footerText = document.querySelector('footer p');
    footerText.textContent = `© ${new Date().getFullYear()} EventBooker. All rights reserved.`;
});

document.getElementById('overlay').addEventListener('click', function() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'block';
    setTimeout(function() {
        overlay.style.opacity = 1;
    }, 10); // Slight delay to ensure the transition can occur
});

// Existing code for dynamic footer text...

// Form validation for the user profile
document.getElementById('profileForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting normally to demonstrate validation
    
    // Basic validation example
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    
    if (name.trim() === '') {
        alert('Please enter your name.');
        return false;
    }
    
    if (email.trim() === '') {
        alert('Please enter your email.');
        return false;
    }
    
    // Email validation
    if (!/\S+@\S+\.\S+/.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }
    
    // Phone validation
    if (phone && !/^\d{3}-\d{3}-\d{4}$/.test(phone)) {
        alert('Please enter a valid phone number in the format 123-456-7890.');
        return false;
    }
    
    // If all validations pass
    alert('Profile updated successfully!');
    // Here, you would typically submit the form or perform an action
});
// Existing code for dynamic footer and other functionalities...

// Form validation for guest booking
document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting to demonstrate validation

    // Basic validation for demonstration
    let eventName = document.getElementById('eventName').value;
    let guestName = document.getElementById('guestName').value;
    let guestEmail = document.getElementById('guestEmail').value;

    if (eventName === '') {
        alert('Please select an event.');
        return false;
    }
    
    if (guestName.trim() === '') {
        alert('Please enter your name.');
        return false;
    }
    
    if (!/\S+@\S+\.\S+/.test(guestEmail)) {
        alert('Please enter a valid email address.');
        return false;
    }
    
    // If all validations pass
    alert('Booking submitted successfully!');
    // Here you would typically handle the form submission
});
document.addEventListener('DOMContentLoaded', function() {
    var signupModal = document.getElementById('signupModal');
    var loginModal = document.getElementById('loginModal');

    document.getElementById('showSignup').onclick = function() {
        signupModal.style.display = 'block';
    };

    document.getElementById('showLogin').onclick = function() {
        loginModal.style.display = 'block';
    };

    document.querySelectorAll('.close').forEach(function(element) {
        element.onclick = function() {
            signupModal.style.display = 'none';
            loginModal.style.display = 'none';
        };
    });

    // Prevent closing modal when clicking inside the modal content
    window.onclick = function(event) {
        if (event.target == signupModal || event.target == loginModal) {
            signupModal.style.display = 'none';
            loginModal.style.display = 'none';
        }
    };
});
// JavaScript code to handle the login form submission
document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.getElementById('loginForm');
    
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Here you would add your logic to handle the login.
        // This might involve sending the email and password to a server
        // For example, using fetch API:
        /*
        fetch('your_login_endpoint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            // Handle success such as redirecting to a new page
        })
        .catch((error) => {
            console.error('Error:', error);
            // Handle errors here
        });
        */
    });
});
// Example JavaScript to handle password confirmation
document.addEventListener('DOMContentLoaded', function() {
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('password-confirm');

    confirmPassword.addEventListener('input', function() {
        if (confirmPassword.value !== password.value) {
            confirmPassword.setCustomValidity("Passwords don't match!");
        } else {
            confirmPassword.setCustomValidity('');
        }
    });
});
