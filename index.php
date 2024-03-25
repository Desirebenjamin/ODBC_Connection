<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form fields are set
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        // Get form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    

        // Database connection details
        $dsn = 'odbc:ClientServerDatabase';

        $user = '';  // Leave empty for Access databases
        $pass = ''; // Leave empty for Access databases

        try {
            // Connect to the database using PDO
            $db = new PDO($dsn, $user, $pass);

            // Set PDO to throw exceptions on error
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement with placeholders
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

            // Prepare the SQL statement
            $stmt = $db->prepare($sql);

            // Bind parameters to avoid SQL injection
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);

            // Execute the statement
            $stmt->execute();

            // alert("Data Submitted!");

            // Check for success or failure
            echo "Data inserted Successfully";

            // Close the database connection
            $db = null;

        } catch (PDOException $e) {
            echo "Error Encountered: " . $e->getMessage();
        }
        } else {
            echo "One or more fields is required!!!";
        }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>

    <div class="container">
        <h2>Register</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
           
            <button type="submit">Register</button>

        </form>
    </div>



    <div class="container">
        <h2>Retrieve Password</h2>
        
        <!-- Button to trigger the PHP script -->
        <form action="retrieve_data.php" method="post">


            <button type="submit">Retrieve Passwords</button>
        </form>

        



    </div>



















    


<?php




?>


    <script src="script.js"></script>
</body>
</html>
