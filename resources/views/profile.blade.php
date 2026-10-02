<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">แก้ไขโปรไฟล์</h1>
            <a href="/dashboard" class="bg-gray-300 p-2 rounded">กลับ</a>
        </div>

        <form method="POST" action="/profile/edit" class="bg-white rounded-lg shadow p-6 flex flex-col gap-4">
            @csrf
            @method('PUT')

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded">{{ $errors->first() }}</div>
            @endif

            <div class="flex flex-col gap-1">
                <label for="name">ชื่อ</label>
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="border border-gray-300 rounded p-2">
            </div>

            <div class="flex flex-col gap-1">
                <label for="email">อีเมล</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="border border-gray-300 rounded p-2">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password">รหัสผ่านใหม่</label>
                <input id="password" type="password" name="password" autocomplete="new-password"
                    class="border border-gray-300 rounded p-2">
                <small class="text-gray-500">เว้นว่างไว้ถ้าไม่ต้องการเปลี่ยนรหัสผ่าน</small>
            </div>

            <button type="submit" class="bg-green-300 p-2 rounded">บันทึก</button>
        </form>
    </div>
</body>

</html>
