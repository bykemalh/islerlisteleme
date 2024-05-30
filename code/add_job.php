<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <title>İş Ekleme Formu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: calc(100% - 22px);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <h2>İş Ekleme Formu</h2>
    <div class="container">
        <form action="save_job.php" method="post">
            <!-- İş Adı Inputu -->
            <label for="job_name">İş Adı:</label>
            <input type="text" id="job_name" name="job_name" required><br><br>
            <!-- Ekleyen Kişi Inputu -->
            <label for="added_by">Ekleyen Kişi:</label>
            <input type="text" id="added_by" name="added_by" required><br><br>
            <!-- Tamamlandı mı Checkboxu -->
            <input class="hide" type="checkbox" name="is_completed" value="1">
            <!-- İşi Ekle Butonu -->
            <input id="submit" type="submit" value="İşi Ekle">
        </form>
    </div>
</body>

</html>