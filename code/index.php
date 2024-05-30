<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <title>İş Listesi</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="30">
</head>

<body>
    <h2>İş Listesi</h2>
    <div class="container">
        <table>
            <colgroup>
                <col style="width: 30px;">
                <col style="width: 50px;">
                <col style="width: auto;">
                <col style="width: 200px;">
                <col style="width: 250px;">
                <col style="width: 100px;">
            </colgroup>
            <tr>
                <th>✅</th>
                <th>ID</th>
                <th>İş Açıklaması</th>
                <th>Ekleyen Kişi</th>
                <th>Tarih ve Saat</th>
                <th>İşlemler</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "isler";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            $limit = 10;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;

            $total_sql = "SELECT COUNT(*) FROM jobs";
            $total_result = $conn->query($total_sql);
            $total_rows = $total_result->fetch_array()[0];
            $total_pages = ceil($total_rows / $limit);

            $sql = "SELECT id, job_name, added_by, is_completed, added_at FROM jobs ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='" . ($row["is_completed"] == 1 ? "completed" : "") . "'>";
                    // CheckBox iş tamamlama
                    echo "<td align='center'>";
                    echo "<form action='update_job.php' method='post'>";
                    echo "<input type='checkbox' name='is_completed' value='1'";
                    if ($row["is_completed"] == 1) {
                        echo " checked";
                    }
                    echo " onchange='this.form.submit()'>";
                    echo "<input type='hidden' name='job_id' value='" . $row["id"] . "'>";
                    echo "<input type='hidden' name='job_name' value='" . $row["job_name"] . "'>";
                    echo "<input type='hidden' name='added_by' value='" . $row["added_by"] . "'>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["job_name"] . "</td>";
                    echo "<td>" . $row["added_by"] . "</td>";
                    echo "<td>" . $row["added_at"] . "</td>";
                    echo "<td><a href='edit_job.php?id=" . $row["id"] . "'>Düzenle</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Kayıt bulunamadı.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='index.php?page=$i'";
                if ($i == $page) {
                    echo " class='active'";
                }
                echo ">$i</a> ";
            }
            ?>
        </div>
    </div>
</body>

</html>
