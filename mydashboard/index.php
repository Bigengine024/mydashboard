<?php
include 'includes/db.php';

// Fetch posts from database
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");
?>

<?php include 'includes/header.php'; ?>

<!-- PAGE CONTENT -->
<div class="container">
    <!-- Create Post Button -->
    <a href="create.php">
        <button>Create New Post</button>
    </a>

    <h1>Latest Posts</h1>

    <div class="card-container">
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['body']); ?></p>

                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL -->
<div class="modal" id="modal">
    <div class="modal-content">
        <button class="close">&times;</button>
        <h2>Welcome</h2>
        <p>This dashboard shows posts from your database.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>