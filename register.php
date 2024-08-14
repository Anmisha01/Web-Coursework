<?php
// Assuming you have a database connection file included here
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $permanent_address = $_POST['permanent_address'];
    $temporary_address = $_POST['temporary_address'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    // Perform validation and sanitization here
    // For example:
    // $username = mysqli_real_escape_string($conn, $username);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $sql = "INSERT INTO users (username, email, password, permanent_address, temporary_address, contact_number, gender, birthday) 
            VALUES ('$username', '$email', '$hashed_password', '$permanent_address', '$temporary_address', '$contact_number', '$gender', '$birthday')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to login page after successful registration
        header('Location: login.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
