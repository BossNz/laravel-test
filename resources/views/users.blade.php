<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">จัดการผู้ใช้งาน</h1>
            <div class="flex gap-2">
                <a href="/dashboard" class="bg-gray-300 p-2 rounded">กลับ</a>
                <a href="/user/create" class="bg-green-300 p-2 rounded">+ เพิ่มผู้ใช้</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">ชื่อ</th>
                        <th class="p-3">อีเมล</th>
                        <th class="p-3">วันที่สร้าง</th>
                        <th class="p-3 text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b last:border-0 hover:bg-gray-50">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <a href="/user/{{ $user->id }}" class="bg-yellow-300 px-3 py-1 rounded">แก้ไข</a>
                                    <form method="POST" action="/user/{{ $user->id }}" onsubmit="return confirm('ยืนยันการลบผู้ใช้นี้?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-300 px-3 py-1 rounded">ลบ</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-500">ยังไม่มีผู้ใช้งาน</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
