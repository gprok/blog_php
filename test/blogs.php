<html>
<head>
    <title>Blogs</title>
</head>
<body>
    <h1>Blogs</h1>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "test";
    $password = "test";
    $database = "blog_php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get all blogs
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();

        // Display result
        while($row = $stmt->fetch()) {
            echo "<b>" . $row['blog'] . "</b> by " . $row['username'] . "<br>";
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
    ?>
</body>
</html>
