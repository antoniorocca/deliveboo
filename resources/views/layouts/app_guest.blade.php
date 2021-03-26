@include('layouts.head')
    <div id="app">

        @include('layouts.header')

        <main>
          @yield('guest_content')
        </main>

        <footer-component></footer-component>
    </div>
</body>
</html>