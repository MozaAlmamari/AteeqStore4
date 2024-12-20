<?php
// check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve the 'Name' input from the feedback form
    $name = $_POST['feedbackName'];
    
    // retrieve the 'Email' input from the feedback form
    $email = $_POST['feedbackEmail'];
    
    // retrieve the 'Satisfaction' level selected by the user
    $satisfaction = $_POST['satisfaction'];
    
    // check if the 'Service Quality' checkbox is checked
    $serviceQuality = isset($_POST['serviceQuality']) ? "Yes" : "No";
    
    // check if the 'Pricing' checkbox is checked
    $pricing = isset($_POST['pricing']) ? "Yes" : "No";
    
    // check if the 'Customer Support' checkbox is checked
    $support = isset($_POST['support']) ? "Yes" : "No";
    
    // retrieve the 'Comments' section of the feedback form
    $comments = $_POST['feedbackMessage'];

    // display a heading to indicate feedback is received
    echo "<h1>Feedback Received</h1>";
    
    // display the user's name as submitted in the feedback form
    echo "<p><strong>Name:</strong> $name</p>";
    
    // display the user's email as submitted in the feedback form
    echo "<p><strong>Email:</strong> $email</p>";
    
    // display the user's satisfaction level as selected in the form
    echo "<p><strong>Satisfaction:</strong> $satisfaction</p>";
    
    // display whether the user checked the 'Service Quality' checkbox
    echo "<p><strong>Service Quality:</strong> $serviceQuality</p>";
    
    // display whether the user checked the 'Pricing' checkbox
    echo "<p><strong>Pricing:</strong> $pricing</p>";
    
    // display whether the user checked the 'Customer Support' checkbox
    echo "<p><strong>Customer Support:</strong> $support</p>";
    
    // display the comments provided by the user in the feedback form
    echo "<p><strong>Comments:</strong> $comments</p>";
}
?>
