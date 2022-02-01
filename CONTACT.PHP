<?php 

if (isset($_POST['submit'])) {
    $to = $_POST['email']; 
    $subject = $_POST['name'];
    $message = getRequestURI();
    $from = "tarunhpr2001@gmail.com";
    $headers = "From:" . $from;

    if (mail($to, $subject, $message, $headers)) {
        echo "Mail Sent.";
    }
    else {
        echo "failed";
    }
}
 <form action="" method="post"> where the action has been left blank. It is better to use header('Location: thank_you.php'); instead of echo in the PHP handler to redirect the user to another page afterwards. Copy the entire code below into one file.
                    <?php 
if(isset($_POST['submit'])){
    $to = "tarunhpr2001@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>