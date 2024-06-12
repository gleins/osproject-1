<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    // Move the uploaded image to the images directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO recipes (title, ingredients, instructions, image) VALUES ('$title', '$ingredients', '$instructions', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "New recipe created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add Recipe</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_recipe.php">Add Recipe</a>
        </nav>
    </header>
    <main>
        <form action="add_recipe.php" method="post" enctype="multipart/form-data">
            <label for="title">Recipe Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" required></textarea><br>

            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" required></textarea><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required><br>

            <input type="submit" value="Add Recipe">
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Food Recipe Website</p>
    </footer>
</body>
</html>
