<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isler";

// Veritabanı bağlantısını oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Formdan gelen verileri alma
$job_name = $_POST['job_name'];
$added_by = $_POST['added_by'];
$is_completed = isset($_POST['is_completed']) ? 1 : 0;

// SQL sorgusu oluşturma ve iş verilerini ekleyerek veritabanına kaydetme
$sql = "INSERT INTO jobs (job_name, added_by, is_completed, added_at) VALUES ('$job_name', '$added_by', '$is_completed', CURRENT_TIMESTAMP)";

// Sorguyu çalıştırma ve işlem sonucunu kontrol etme
if ($conn->query($sql) === TRUE) {
    echo "Yeni iş başarıyla eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapatma
$conn->close();

// Yönlendirme yapılacak sayfa
$yonlendir = "add_job.php";
header("Location: " . $yonlendir); // Yönlendirme işlemi
?>
