# E-Certificate

Sebuah proyek yang berasal dari hasil Uji Sertifikasi Kompetensi. Proyek ini bertujuan untuk memberikan solusi kepada perusahaan yang membutuhkan website untuk pembuatan sertifikat secara otomatis berdasarkan kelulusan pelatihan yang diselenggarakan. Dengan e-certificate, perusahaan dapat menghemat waktu dan sumber daya dalam proses pembuatan sertifikat.

## Fitur

-   Menambah Pelatihan
-   Menambah Peserta
-   Mengganti Tanda Tangan

## Jalankan Secara Lokal

-   Pastikan sudah terinstall php 8.2+ untuk menjalankan laravel 10

**Clone**

```shell
git clone https://github.com/khmalz/lsp-certificate.git e-certificate
```

**Go to Directory**

```shell
cd e-certificate
```

**Install Dependencies**

```shell
composer install
```

```shell
npm install
```

**Config Environment**

```shell
cp .env.example .env
```

**Generate Key**

```shell
php artisan key:generate
```

**Setting Database Config in Env**

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

**Build Assets**

```shell
npm run build
```

**Migrate Database**

```shell
php artisan migrate --seed
```

**Run Local Server**

```shell
php artisan serve
```

## Environment Variables

Untuk memastikan gambar yang terupload akan muncul, Anda perlu mengkonfigurasi pada file .env. Sesuaikan dengan url dan host yang dijalankan di browser anda saat menjalankan project ini.

contoh: `http://127.0.0.1:8000`

```
APP_URL
```

## Login Admin

Untuk ke halaman login, silahkan ke url ini `/login` dan login menggunakan akun dibawah ini:

`email: admin@gmail.com`

`password: password`

## Developer

-   [@khmalz](https://github.com/khmalz)
