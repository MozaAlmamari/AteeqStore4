<?php
// define a Profile class to store profile information
class Profile {
    // declare public properties for the profile information
    public $name;   // name of the person
    public $email;  // email address
    public $phone;  // phone number
    public $address; // home address

    // constructor to initialize the profile data when a new Profile object is created
    public function __construct($name, $email, $phone, $address) {
        // initialize the profile properties with the provided values
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    // function to generate a table row for displaying the profile in HTML
    public function toTableRow() {
        // return an HTML table row (<tr>) containing the profile details
        return "<tr>
                    <td>{$this->name}</td>
                    <td>{$this->email}</td>
                    <td>{$this->phone}</td>
                    <td>{$this->address}</td>
                </tr>";
    }
}

// array to store all profile objects
$profiles = [];

// check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve the data submitted through the form using POST
    $name = $_POST['name'];      // get the 'name' field from the form
    $email = $_POST['email'];    // get the 'email' field from the form
    $phone = $_POST['phone'];    // get the 'phone' field from the form
    $address = $_POST['address']; // get the 'address' field from the form

    // create a new Profile object using the retrieved form data and add it to the profiles array
    $profiles[] = new Profile($name, $email, $phone, $address);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processed Profile Information</title>
</head>
<body>
    <h2>Submitted Profile Information</h2>

    <!-- create a table to display the profile data -->
    <table border="1">
        <thead>
            <!-- table headers to describe the columns -->
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // iterate over the $profiles array and display each profile's data in a table row
                foreach ($profiles as $profile) {
                    // call the toTableRow method of each profile object to generate a table row with its details
                    echo $profile->toTableRow();
                }
            ?>
        </tbody>
    </table>

    <br>
    <!-- link to submit another profile -->
    <a href="profile_form.html">Submit Another Profile</a>
</body>
</html>
