<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/images/svg/icons/nest.svg" rel="icon" type="image/png">

    <title>@yield('page.title', config('app.name'))</title>
    <meta name="description" content="@yield('page.description', config('app.name'))">

    <!-- Styles -->
    @vite('resources/css/app.css')
    <!-- JavaScript -->
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 bg-[url('/images/svg/backgrounds/welcome.svg')]">
    <img id="background" class="absolute -left-20 top-0 max-w-[877px] h-[100%]" src="/images/svg/backgrounds/welcome.svg"
         alt="Laravel background"/>
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="flex w-full justify-between flex-col min-h-screen w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <a href="{{ route('home') }}"
                   class="flex block lg:justify-center lg:col-start-2 h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]">
                    <img src="/images/svg/icons/nest.svg" alt="{{ $title ?? config('app.name')}}">
                </a>
                <nav class="-mx-3 flex flex-1 justify-end">
                    <a
                            href="{{ route('admin.rubrics.index') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Рубрикатор
                    </a>
                    @auth
                        <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Вход
                        </a>

                        @if (Route::has('register'))
                            <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Регистрация
                            </a>
                        @endif
                    @endauth
                </nav>
            </header>

            <main class="mb-auto mt-6">
                @yield('content')
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</div>
</body>
</html>
