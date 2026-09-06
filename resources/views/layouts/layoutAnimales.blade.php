<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="light dark">

        <title>{{ $title ?? 'AnimalApp' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-pink-50 text-purple-950 transition-colors duration-300 dark:bg-purple-950 dark:text-pink-50">
        <div class="flex min-h-screen flex-col">
            <nav class="border-b border-pink-200/80 bg-pink-100/80 backdrop-blur dark:border-purple-800 dark:bg-purple-900/80">
                <div class="mx-auto flex w-full max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                    <a href="{{ url('/') }}" class="text-xl font-bold tracking-tight text-purple-900 dark:text-pink-100">
                        AnimalApp
                    </a>

                    <button
                        type="button"
                        id="theme-toggle"
                        class="inline-flex items-center gap-2 rounded-lg border border-purple-200 bg-white px-3 py-2 text-sm font-medium text-purple-900 transition hover:bg-pink-100 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:border-purple-700 dark:bg-purple-800 dark:text-pink-100 dark:hover:bg-purple-700"
                        aria-label="Cambiar entre modo claro y oscuro"
                        aria-pressed="false"
                    >
                        <span id="theme-toggle-icon" aria-hidden="true">☾</span>
                        <span id="theme-toggle-label">Modo oscuro</span>
                    </button>
                </div>
            </nav>

            <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
                @yield('content')
            </main>

            <footer class="border-t border-pink-200 bg-pink-100/80 px-4 py-6 text-center text-sm text-purple-800 dark:border-purple-800 dark:bg-purple-900/80 dark:text-pink-200">
                <p>&copy; {{ date('Y') }} AnimalApp. Todos los derechos reservados.</p>
            </footer>
        </div>

        <script>
            const themeToggle = document.querySelector('#theme-toggle');
            const themeToggleIcon = document.querySelector('#theme-toggle-icon');
            const themeToggleLabel = document.querySelector('#theme-toggle-label');
            const savedTheme = localStorage.getItem('animalapp-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            function setTheme(isDark) {
                document.documentElement.classList.toggle('dark', isDark);
                themeToggle.setAttribute('aria-pressed', String(isDark));
                themeToggleIcon.textContent = isDark ? '☀' : '☾';
                themeToggleLabel.textContent = isDark ? 'Modo claro' : 'Modo oscuro';
            }

            setTheme(savedTheme ? savedTheme === 'dark' : prefersDark);

            themeToggle.addEventListener('click', () => {
                const isDark = !document.documentElement.classList.contains('dark');

                setTheme(isDark);
                localStorage.setItem('animalapp-theme', isDark ? 'dark' : 'light');
            });
        </script>
    </body>
</html>