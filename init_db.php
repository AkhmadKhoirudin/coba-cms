<?php
// init_db.php
$db = new SQLite3('database/blog.db');

// Buat tabel artikel jika belum ada
$query = "CREATE TABLE IF NOT EXISTS articles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
$db->exec($query);

echo "Database initialized successfully.";
?>
