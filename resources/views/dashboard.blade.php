<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="flex w-full mx-auto justify-center mt-30 max-w-xl gap-3">
        <a href="/user" class="bg-blue-300 p-2 rounded">จัดการผู้ใช้งาน</a>
        <a href="/logout" class="bg-red-300 p-2 rounded">ออกจากระบบ</a>
    </nav>

    <div class="text-center mt-5 flex flex-col gap-4 items-center">
        <p>สวัสดี, {{ $user->name }}</p>
        <p>อีเมล: {{ $user->email }}</p>
        <a href="/profile/edit" class="bg-green-300 p-2 rounded">แก้ไขโปรไฟล์</a>
    </div>

</body>

</html>