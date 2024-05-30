# İş Yönetim Sistemi

Bu proje, basit bir iş yönetim sistemi sağlar. Kullanıcılar iş ekleyebilir, düzenleyebilir, tamamlayabilir ve silebilirler.

## Özellikler

- **İş Ekleme:** Kullanıcılar iş açıklaması, ekleyen kişi ve tamamlanma durumu ile yeni işler ekleyebilirler.
- **İş Listeleme:** Tüm işler bir tabloda listelenir.
- **İş Düzenleme:** Kullanıcılar mevcut işleri güncelleyebilir.
- **İş Tamamlama:** İşlerin tamamlanma durumları güncellenebilir.
- **İş Silme:** Kullanıcılar mevcut işleri silebilir.

## Kurulum

1. **Depoyu klonlayın:**

    ```bash
    git clone https://github.com/bykemalh/islerlisteleme
    ```

2. **Veritabanını oluşturun:**

    MySQL veya MariaDB kullanarak bir veritabanı oluşturun ve aşağıdaki SQL komutunu çalıştırın:

    ```sql
    CREATE DATABASE isler;
    USE isler;

    CREATE TABLE jobs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        job_name VARCHAR(255) NOT NULL,
        added_by VARCHAR(255) NOT NULL,
        is_completed BOOLEAN DEFAULT 0,
        added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

3. **Bağlantı bilgilerini güncelleyin:**

    `index.php`, `edit_job.php`, `update_job.php` ve `delete_job.php` dosyalarında veritabanı bağlantı bilgilerini kendi bilgilerinize göre güncelleyin:

    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "isler";
    ```

4. **Proje dosyalarını web sunucunuza yerleştirin:**

    PHP ve MySQL destekleyen bir web sunucusu kullanarak proje dosyalarını çalıştırın.

## Kullanım

1. **İş Ekleme:**

    `add_job.php` sayfasını kullanarak yeni işler ekleyin.

2. **İş Listeleme:**

    `index.php` sayfasında mevcut tüm işleri görüntüleyin.

3. **İş Düzenleme ve Silme:**

    Her işin yanında bulunan "Düzenle" bağlantısını kullanarak işleri düzenleyebilir veya silebilirsiniz.

## Geliştirme

Projeye katkıda bulunmak isteyen herkes hoş geldiniz. Lütfen değişiklik yapmadan önce bir konu açın veya doğrudan bir pull request oluşturun.

### Lisans

Bu proje [GPLv3](https://www.gnu.org/licenses/gpl-3.0.tr.html) lisansı altında lisanslanmıştır. Daha fazla bilgi için LICENSE dosyasına bakın.

---

Proje hakkında geri bildirimlerinizi ve katkılarınızı bekliyoruz. İyi çalışmalar!

