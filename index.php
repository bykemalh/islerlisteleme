<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <title>İş Listesi</title>
    <link rel="stylesheet" href="style.css"> <!-- Stil dosyası bağlantısı -->
    <meta http-equiv="refresh" content="30"> <!-- Sayfanın 30 saniyede bir yenilenmesi -->
</head>

<body>
    <h2>İş Listesi</h2>
    <div class="container">
        <table>
            <colgroup>
                <col style="width: 30px;"> <!-- Sütun genişliği -->
                <col style="width: 400px;"> <!-- Sütun genişliği -->
                <col style="width: 200px;"> <!-- Sütun genişliği -->
                <col style="width: 200px;"> <!-- Sütun genişliği -->
            </colgroup>
            <tr>
                <th>✅</th> <!-- Başlık sütunu - İş tamamlama -->
                <th>İş Açıklaması</th> <!-- Başlık sütunu - İş Açıklaması -->
                <th>Ekleyen Kişi</th> <!-- Başlık sütunu - Ekleyen Kişi -->
                <th>Tarih ve Saat</th> <!-- Başlık sütunu - Tarih ve Saat -->
            </tr>
            <?php
            // Veritabanı bağlantısı
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "isler_test";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantı kontrolü
            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            // İşleri veritabanından alma
            $sql = "SELECT id, job_name, added_by, is_completed , added_at FROM jobs ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // CheckBox iş tamamlama
                    echo "<td align='center'>";
                    echo "<form action='update_job.php' method='post'>";
                    echo "<input type='checkbox' name='completed' value='1'";
                    if ($row["is_completed"] == 1) {
                        echo " checked";
                    }
                    echo " onchange='this.form.submit()'>";
                    echo "<input type='hidden' name='job_id' value='" . $row["id"] . "'>";
                    echo "</form>";
                    echo "</td>";
                    // İş Açıklaması
                    echo "<td>" . $row["job_name"] . "</td>";
                    // Ekleyen kişi
                    echo "<td>" . $row["added_by"] . "</td>";
                    // Tarih ve saat sütunu
                    echo "<td>" . $row["added_at"] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Kayıt bulunamadı.</td></tr>"; // Kayıt yoksa mesaj
            }
            $conn->close(); // Veritabanı bağlantısını kapatma
            ?>
        </table>
    </div>
</body>

</html>