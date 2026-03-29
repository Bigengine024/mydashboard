<?php include 'includes/db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $body = $_POST['body'];

    $conn->query("UPDATE posts SET title='$title', body='$body' WHERE id=$id");
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="title" value="<?php echo $post['title']; ?>"><br><br>
    <textarea name="body"><?php echo $post['body']; ?></textarea><br><br>
    <button type="submit">Update</button>
</form>