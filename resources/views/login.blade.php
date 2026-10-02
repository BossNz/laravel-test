<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>เข้าสู่ระบบ - {{ config('app.name', 'Laravel') }}</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-gray-100 p-4 font-sans text-gray-900 antialiased dark:bg-gray-950 dark:text-gray-100">
    <main class="w-full max-w-sm">
        <div class="mb-6 flex flex-col items-center gap-3 text-center">
            
            <div>
                <h1 class="text-2xl font-semibold tracking-tight">เข้าสู่ระบบ</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">กรอกอีเมลและรหัสผ่านเพื่อเข้าใช้งานระบบ</p>
            </div>
        </div>

        <form method="POST" class="flex flex-col gap-5 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-8 dark:bg-gray-900 dark:ring-gray-800">
            @csrf

            @if ($errors->any())
                <div class="rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700 ring-1 ring-red-200 dark:bg-red-950/50 dark:text-red-300 dark:ring-red-900">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-sm font-medium">อีเมล</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required autofocus
                    class="rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm shadow-xs placeholder:text-gray-400 focus:border-green-600 focus:ring-3 focus:ring-green-600/20 focus:outline-none dark:border-gray-700 dark:bg-gray-950 dark:placeholder:text-gray-500">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="password" class="text-sm font-medium">รหัสผ่าน</label>
                <input id="password" type="password" name="password" placeholder="••••••••" autocomplete="current-password" required
                    class="rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm shadow-xs placeholder:text-gray-400 focus:border-green-600 focus:ring-3 focus:ring-green-600/20 focus:outline-none dark:border-gray-700 dark:bg-gray-950 dark:placeholder:text-gray-500">
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                <input type="checkbox" name="remember" class="size-4 rounded accent-green-600">
                จดจำการเข้าสู่ระบบ
            </label>

            <button type="submit"
                class="rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                เข้าสู่ระบบ
            </button>
        </form>

        <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </p>
    </main>
</body>

</html>
