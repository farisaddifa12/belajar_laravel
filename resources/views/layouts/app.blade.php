@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
@@ -75,6 +74,5 @@
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>