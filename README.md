<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

##  Info
App ini menggunakan framework <strong>laravel 9</strong> dan database <strong>MariaDB</strong>

## Cara Menjalankan App
- pastikan database aktif dan terdapat database dengan nama <b>laravel</b>
- jalankan migration: <strong>php artisan migrate</strong>
- jalankan server: <strong>php artisan serve</strong>
- akses browser: http://127.0.0.1:8000



note:<br>
* Database masih dalam keadaan kosong, tambahkan data baru untuk melihat fungsionalitas operasi CRUD
* untuk meng-upload file lebih dari 40 MB, ubah pengaturan php.ini berikut:<br>
post_max_size=40M (ubah sesuai ukuran maksimal yang diinginkan, ex: 2G)<br>
upload_max_filesize=40M (ubah sesuai ukuran maksimal yang diinginkan, ex: 2G)<br>
