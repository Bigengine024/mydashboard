<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "INSERT INTO posts (title, body) VALUES ('$title', '$body')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Post Title" required><br><br>
    <textarea name="body" placeholder="Post Content" required></textarea><br><br>
    <button type="submit">Create Post</button>
</form>