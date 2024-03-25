<?php
function executeQuery($sql, $fetchStyle = PDO::FETCH_ASSOC) {
    try {
        // Database connection details
        $dsn = 'odbc:ClientServerDatabase';
        $user = '';  // Leave empty for Access databases
        $password = ''; // Leave empty for Access databases

        // Connect to the database using PDO
        $db = new PDO($dsn, $user, $password);

        // Set PDO to throw exceptions on error
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL statement
        $stmt = $db->prepare($sql);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetchAll($fetchStyle);

        // Close the database connection
        $db = null;

        return $result;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}
?>

<div class="container">
        <h2>Retrieve Password</h2>
        
        <!-- Button to trigger the PHP script -->
        <form action="retrieve_data.php" method="post">
        <?php
            $sql = 'SELECT password FROM users';
            $passwords = executeQuery($sql, PDO::FETCH_COLUMN);
            ?>

                <table>
                <thead>

                <tr><th>Password</th></tr>
                </thead>

            <?php foreach ($passwords as $password): ?>
              
            <tbody>
            <tr>
                <td><?php echo $password ?></td>;
            </tr>
            </tbody>

            <?php endforeach; ?>
            </table>

            
        </form>

        



    </div>