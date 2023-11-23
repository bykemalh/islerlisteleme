<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isler_test";

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Post metodu ile veri gönderilmiş mi kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id']; // Gönderilen iş ID'sini alma
    $is_completed = isset($_POST['completed']) ? 1 : 0; // Tamamlanma durumunu belirleme

    // İş durumunu güncelleme SQL sorgusu oluşturma
    $sql = "UPDATE jobs SET is_completed='$is_completed' WHERE id='$job_id'";

    // Sorguyu çalıştırma ve işlem sonucunu kontrol etme
    if ($conn->query($sql) === TRUE) {
        echo "İş durumu güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Veritabanı bağlantısını kapatma

$yonlendir = "index.php";
header("Location: " . $yonlendir); // Yönlendirme işlemi
?>
