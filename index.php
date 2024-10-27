<?php
// Koneksi ke database
$db = new SQLite3('database/blog.db');
// Ambil semua artikel dari database
$result = $db->query("SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Sederhana</title>
</head>
<body>
    <h1>Blog Sederhana</h1>
    <a href="add_article.php">Tambah Artikel</a>
    <hr>

    <?php while ($row = $result->fetchArray()): ?>
        <h2><a href="article.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a></h2>
        <p><?php echo date('Y-m-d H:i', strtotime($row['created_at'])); ?></p>
        <hr>
    <?php endwhile; ?>
</body>
</html>
