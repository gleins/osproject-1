<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Recipe Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Food Recipe Website</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_recipe.php">Add Recipe</a>
        </nav>
    </header>
    <main>
        <h2>Recipes</h2>
        <?php
        $sql = "SELECT * FROM recipes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='recipe'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<img src='images/" . $row['image'] . "' alt='" . $row['title'] . "' class='recipe-img'>";
                echo "<p><strong>Ingredients:</strong><br>" . nl2br($row['ingredients']) . "</p>";
                echo "<p><strong>Instructions:</strong><br>" . nl2br($row['instructions']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "No recipes found.";
        }

        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Food Recipe Website</p>
    </footer>
</body>
</html>
