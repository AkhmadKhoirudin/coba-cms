<?php
// Lokasi direktori upload
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);

// Periksa apakah file adalah gambar
if (isset($_FILES["file"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // Kembalikan URL untuk gambar
            echo json_encode(['location' => $targetFile]);
        } else {
            echo json_encode(['error' => 'Terjadi kesalahan saat mengunggah gambar.']);
        }
    } else {
        echo json_encode(['error' => 'File yang diunggah bukan gambar.']);
    }
}
?>
