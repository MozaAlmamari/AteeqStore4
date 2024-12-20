<?php
// check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve the 'Name' input value from the form submission
    $name = $_POST['name'];
    
    // retrieve the 'Email' input value from the form submission
    $email = $_POST['email'];
    
    // retrieve the 'Message' input value from the form submission
    $message = $_POST['message'];

    // risplay a heading indicating that the message has been received
    echo "<h1>Message Received</h1>";
    
    // risplay the sender's name as entered in the form
    echo "<p><strong>Name:</strong> $name</p>";
    
    // risplay the sender's email address as entered in the form
    echo "<p><strong>Email:</strong> $email</p>";
    
    // risplay the sender's message as entered in the form
    echo "<p><strong>Message:</strong> $message</p>";
}
?>
