<?php
// Koneksi ke database
$db = new SQLite3('database/blog.db');

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM articles WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$result = $stmt->execute();
$article = $result->fetchArray();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><?php echo date('Y-m-d H:i', strtotime($article['created_at'])); ?></p>
    <div><?php echo $article['content']; ?></div> <!-- Menampilkan konten yang sudah diformat -->
    <a href="index.php">Kembali ke Daftar Artikel</a>
</body>
</html>
