<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">แก้ไขผู้ใช้งาน id: {{ $user->id }}</h1>
            <a href="/user" class="bg-gray-300 p-2 rounded">กลับ</a>
        </div>

        <form method="POST" action="/user/{{ $user->id }}" class="bg-white rounded-lg shadow p-6 flex flex-col gap-4">
            @csrf
            @method("PUT")
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded">{{ $errors->first() }}</div>
            @endif

            <div class="flex flex-col gap-1">
                <label for="name">ชื่อ</label>
                <input id="name" type="text" name="name" value="{{ $user->name }}" required
                    class="border border-gray-300 rounded p-2">
            </div>

            <div class="flex flex-col gap-1">
                <label for="email">อีเมล</label>
                <input id="email" type="email" name="email" value="{{ $user->email }}" required
                    class="border border-gray-300 rounded p-2">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password">ตั้งรหัสผ่านใหม่ ( เว้นว่างไว้เพื่อไม่เปลี่ยนแปลง )</label>
                <input id="password" type="password" name="password" autocomplete="new-password" 
                    class="border border-gray-300 rounded p-2">
            </div>

            <button type="submit" class="bg-green-300 p-2 rounded">บันทึก</button>
        </form>
    </div>
</body>

</html>
