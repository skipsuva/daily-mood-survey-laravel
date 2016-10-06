<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Daily Mood Survey</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>

  </head>
  <body>
    <nav class="nav has-shadow">
      <div class="nav-left">
        <a class="nav-item is-brand" href="#">
          Daily Mood Survey
        </a>
      </div>

      <div class="nav-center">
        <a class="nav-item" href="/daily-surveys">
          Home
        </a>
        <a class="nav-item" href="/daily-surveys/new">
          Take Survey
        </a>
      </div>

      <a href="{{ url('/logout') }}">
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </a>

      <div class="nav-right nav-menu">
        @if (Auth::guest())
          <a class="nav-item" href="{{ url('/login') }}">
            Login
          </a>
          <a class="nav-item" href="{{ url('/register') }}">
            Join
          </a>
        @else
          <p class="nav-item">
            Welcome {{ Auth::user()->name }}
          </p>
          <a class="nav-item" href="{{ url('/logout') }}">
            Log Out
          </a>
        @endif
      </div>
    </nav>

    <div class="section">
      <div class="container">
        @yield('content')
      </div>
    </div>

  </body>
</html>
