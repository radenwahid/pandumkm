<?php
// Process form submission and perform registration here
// You can use your existing code for registration

$response = array(); // Initialize response array

if (isset($_POST["daftar"])) {
    // Perform registration
    // Replace this with your registration logic
    $registration_successful = true; // Example variable indicating success or failure

    if ($registration_successful) {
        // If registration is successful
        $response['title'] = 'Success!';
        $response['message'] = 'Registration successful!';
        $response['icon'] = 'success';
    } else {
        // If registration fails
        $response['title'] = 'Oops...';
        $response['message'] = 'Registration failed. Please try again later.';
        $response['icon'] = 'error';
    }
}

// Return JSON response
echo json_encode($response);
