@include('layouts.head')
<body>
    <div id="app">

        @include('layouts.header')

        <main>
          @yield('guest_content')
        </main>

        <footer-component></footer-component>
    </div>
</body>
</html>