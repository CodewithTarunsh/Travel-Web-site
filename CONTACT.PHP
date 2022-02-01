<?php 

if (isset($_POST['submit'])) {
    $to = $_POST['email']; 
    $subject = $_POST['name'];
    $message = getRequestURI();
    $from = "zenphoto@example.com";
    $headers = "From:" . $from;

    if (mail($to, $subject, $message, $headers)) {
        echo "Mail Sent.";
    }
    else {
        echo "failed";
    }
}

?> What is the code to send an email in PHP? php html email Share Follow edited Dec 9 '15 at 8:47 Markus Amalthea Magnuson 7,89144 gold badges3939 silver badges4949 bronze badges asked Aug 22 '13 at 11:33 fusi0n 1,00933 gold badges1212 silver
                badges2121 bronze badges Can you show the full code, including your HTML? – Amal Murali Aug 22 '13 at 11:39 I don't understand what you want to do. Do you want to send a copy of the message to the person who filled in the form? – Funk
                Forty Niner Aug 22 '13 at 12:44 Add a comment 8 Answers 169 EDIT (#1) If I understand correctly, you wish to have everything in one page and execute it from the same page. You can use the following code to send mail from a single page,
                for example index.php or contact.php The only difference between this one and my original answer is the
                <form action="" method="post"> where the action has been left blank. It is better to use header('Location: thank_you.php'); instead of echo in the PHP handler to redirect the user to another page afterwards. Copy the entire code below into one file.
                    <?php 
if(isset($_POST['submit'])){
    $to = "email@example.com"; // this is your Email address
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