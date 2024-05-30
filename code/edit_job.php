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

if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    // İş detaylarını alma SQL sorgusu
    $sql = "SELECT * FROM jobs WHERE id='$job_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        echo "İş bulunamadı.";
        exit();
    }
} else {
    echo "Geçersiz ID.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <title>İş Güncelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>İş Güncelle</h2>
    <div class="container">
        <form action="update_job.php" method="post">
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <!-- İş Adı Inputu -->
            İş Adı: <input type="text" name="job_name" value="<?php echo $job['job_name']; ?>"><br><br>
            <!-- Ekleyen Kişi Inputu -->
            Ekleyen Kişi: <input type="text" name="added_by" value="<?php echo $job['added_by']; ?>"><br><br>
            <!-- Tamamlandı mı Checkboxu -->
            Tamamlandı mı? <input type="checkbox" name="is_completed" value="1" <?php if ($job['is_completed'] == 1) echo "checked"; ?>><br><br>
            <!-- Güncelle Butonu -->
            <input id="submit" type="submit" value="Güncelle">
        </form>
        <!-- Sil Butonu -->
        <form action="delete_job.php" method="post" onsubmit="return confirm('Bu işi silmek istediğinize emin misiniz?');">
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <input id="delete" type="submit" value="Sil">
        </form>
    </div>
</body>
</html>
