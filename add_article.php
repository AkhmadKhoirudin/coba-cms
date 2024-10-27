<?php
// Koneksi ke database
$db = new SQLite3('database/blog.db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Simpan artikel ke database
    $stmt = $db->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");
    $stmt->bindValue(':title', $title, SQLITE3_TEXT);
    $stmt->bindValue(':content', $content, SQLITE3_TEXT);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <!-- Tambahkan TinyMCE melalui CDN -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="./tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',  // Target semua textarea
        plugins: 'image table link lists code textcolor',  // Menambahkan plugin warna teks
        toolbar: 'undo redo | styleselect |formatselect  |fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image link | bullist numlist | table code',
        menubar: false,
        height: 600,
        width:1310,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        automatic_uploads: true,
        images_upload_url: 'upload_image.php', // Upload gambar
        file_picker_types: 'image',
        images_reuse_filename: true,
        
        // Tambahkan menu format teks dan heading
        style_formats: [
            {title: 'Heading 1', block: 'h1'},
            {title: 'Heading 2', block: 'h2'},
            {title: 'Heading 3', block: 'h3'},
            {title: 'Paragraph', block: 'p'},
            {title: 'Font Size 12px', inline: 'span', styles: {fontSize: '12px'}},
            {title: 'Font Size 14px', inline: 'span', styles: {fontSize: '14px'}},
            {title: 'Font Size 18px', inline: 'span', styles: {fontSize: '18px'}},
            {title: 'Font Size 24px', inline: 'span', styles: {fontSize: '24px'}}
        ],
        fontsize_formats: "12pt 14pt 16pt 18pt 24pt 36pt 48pt",
    });
</script>

</head>
<body>
    <h1>Tambah Artikel</h1>
    <form action="add_article.php" method="post" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="title" required>
        <br>
        <label>Konten:</label>
        <textarea name="content"></textarea>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
