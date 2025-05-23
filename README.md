# 🚀 Laravel CRUD Project (Simple + Bootstrap)

[![Made with Laravel](https://img.shields.io/badge/Laravel-Framework-red?style=flat&logo=laravel)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/UI-Bootstrap-blue?style=flat&logo=bootstrap)](https://getbootstrap.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-blueviolet?style=flat&logo=php)](https://www.php.net)

> ระบบจัดการผู้ใช้งานแบบ CRUD สร้างด้วย Laravel + Bootstrap สำหรับมือใหม่ก็เขียนได้! 🎯

---

## 📌 ฟีเจอร์

✅ เพิ่ม / แก้ไข / ลบ / ดูข้อมูลผู้ใช้  
✅ ค้นหาชื่อหรืออีเมล  
✅ แบ่งหน้า (Pagination)  
✅ แจ้งเตือนด้วย SweetAlert2  
✅ UI สะอาดสวยงามด้วย Bootstrap 5

---

## 🧰 Tech Stack

- 💻 Laravel 8+
- 🐘 PHP 8.x
- 🎨 Bootstrap 5
- 💾 MySQL (XAMPP)
- 🔔 SweetAlert2 (CDN)

---

## 🚀 วิธีติดตั้งและใช้งาน

```bash
git clone https://github.com/B0atByte/crud-laravel-simple.git
cd crud-laravel-simple
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
✅ จากนั้นเปิดเบราว์เซอร์ไปที่: http://localhost:8000

📁 โครงสร้างโปรเจกต์

├── app/
│   └── Http/
│       └── Controllers/
│           └── UserInfoController.php
├── app/Models/UserInfo.php
├── database/migrations/xxxx_create_user_infos_table.php
├── resources/views/users/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── routes/web.php
└── public/
    └── screenshots/



🧠 ผู้พัฒนา
พัฒนาเพื่อฝึก Laravel และใช้เป็นผลงานแสดงความสามารถ
👤 B0atByte + ChatGPT

⭐ ฝากกด Star ด้วยนะครับ!
หากโปรเจกต์นี้ช่วยให้คุณเรียน Laravel ได้ง่ายขึ้น
ฝากกด ⭐ ที่มุมขวาบนของ repo ด้วยครับ! 🙏






