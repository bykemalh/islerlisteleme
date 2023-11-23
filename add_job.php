<!DOCTYPE html>
<html>

<head>
    <title>İş Ekleme Formu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>İş Ekleme Formu</h2>
    <div class="container">
        <form action="save_job.php" method="post">
            <!-- İş Adı Inputu -->
            İş Adı: <input type="text" name="job_name"><br><br>
            <!-- Ekleyen Kişi Inputu -->
            Ekleyen Kişi: <input type="text" name="added_by"><br><br>
            <!-- Tamamlandı mı Checkboxu -->
            <label class="hide">Tamamlandı mı?</label>
            <input class="hide" type="checkbox" name="is_completed" value="1"><br><br>
            <!-- İşi Ekle Butonu -->
            <input id="submit" type="submit" value="İşi Ekle">
        </form>
    </div>
</body>

</html>
