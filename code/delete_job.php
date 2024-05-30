<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isler";

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id']; // Gönderilen iş ID'sini alma

    // İş silme SQL sorgusu oluşturma
    $sql = "DELETE FROM jobs WHERE id='$job_id'";

    // Sorguyu çalıştırma ve işlem sonucunu kontrol etme
    if ($conn->query($sql) === TRUE) {
        echo "İş başarıyla silindi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Veritabanı bağlantısını kapatma

$yonlendir = "index.php";
header("Location: " . $yonlendir); // Yönlendirme işlemi
?>
