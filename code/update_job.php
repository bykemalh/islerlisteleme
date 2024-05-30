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

// Post metodu ile veri gönderilmiş mi kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id']; // Gönderilen iş ID'sini alma
    $job_name = $_POST['job_name']; // İş adını alma
    $added_by = $_POST['added_by']; // Ekleyen kişiyi alma
    $is_completed = isset($_POST['is_completed']) ? 1 : 0; // Tamamlanma durumunu belirleme

    // İş detaylarını güncelleme SQL sorgusu oluşturma
    $sql = "UPDATE jobs SET job_name='$job_name', added_by='$added_by', is_completed='$is_completed' WHERE id='$job_id'";

    // Sorguyu çalıştırma ve işlem sonucunu kontrol etme
    if ($conn->query($sql) === TRUE) {
        echo "İş başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Veritabanı bağlantısını kapatma

$yonlendir = "index.php";
header("Location: " . $yonlendir); // Yönlendirme işlemi
?>
