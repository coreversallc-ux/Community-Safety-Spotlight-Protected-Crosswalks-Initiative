<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "coreversallc@gmail.com";  // Destination email
    $subject = "New Community Safety Support Form Submission";

    // Collect form data safely
    $name       = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email      = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone      = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $city       = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $support    = isset($_POST['support_type']) ? htmlspecialchars($_POST['support_type']) : '';
    $amount     = isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : '';
    $message    = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Build the email body
    $body = "A new support form has been submitted:\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Phone: $phone\n"
          . "City: $city\n\n"
          . "Support Type: $support\n"
          . "Estimated Contribution Amount: $amount\n\n"
          . "Message:\n$message\n";

    $headers  = "From: noreply@safecrosswalks.org\r\n";
    if (!empty($email)) {
        $headers .= "Reply-To: $email\r\n";
    }

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your submission has been received. We will follow up with a secure payment link if you indicated a contribution amount.";
    } else {
        echo "There was a problem sending your form. Please try again, or email us directly at Coreversallc@gmail.com.";
    }
} else {
    echo "Invalid request method.";
}
?>
