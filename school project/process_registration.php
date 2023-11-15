<?php
// Include the Database class
include ('Database.php');

// Function to sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstName = sanitizeInput($_POST['firstName']);
    $middleName = sanitizeInput($_POST['middleName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $repeatPassword = sanitizeInput($_POST['repeat-passWord']);

    // Validate passwords match
    if ($password !== $repeatPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        // Configuration for the database connection
        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'project_leerjaar_3',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
        ];

        // Create an instance of the Database class
        $database = new Database($config);

        // Insert the user data into the database (simplified example)
        $query = "INSERT INTO users (firstName, middleName, lastName, email, password) VALUES (:firstName, :middleName, :lastName, :email, :password)";
        $params = [
            ':firstName' => $firstName,
            ':middleName' => $middleName,
            ':lastName' => $lastName,
            ':email' => $email,
            ':password' => $password, // Note: In a real application, you would hash the password
        ];

        // Execute the query
        $result = $database->query($query, $params);

        if ($result) {
            $successMessage = 'Registration successful!';
            // Perform any additional actions (e.g., redirect to a login page)
        } else {
            $errorMessage = 'Registration failed. Please try again.';
        }
    }
}
?>