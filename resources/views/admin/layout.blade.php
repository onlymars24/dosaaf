<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style/norm.css" />
  <link rel="stylesheet" href="/style/jquery.cleditor.css">
  <link rel="stylesheet" href="/style/bootstrap.css" />
  <link rel="stylesheet" href="/style/style.css" />
  <link rel="icon" href="/img/logo.svg" />
  <script src="/script/jquery.min.js"></script>
  <script src="/script/jquery.cleditor.js"></script>
  <script defer src="/script/bootstrap.js"></script>
  <script defer src="/script/script.js"></script>
  <title>
    @yield('title')
  </title>
</head>

<body>
  <main>
    <div class="main__header">
      <div class="header__strip">
        <div class="layout-header-3 layout-header">
          <div class="block-title">
            <a href="@yield('href') " class="exit"></a>
              <h1>
                  @yield('h1')      
                  @auth
                  @if(Auth::user()->admin)
                  <a href="/">Основной сайт</a>
                  @endif
                  @endauth
              </h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="extend-the-panel"></div>
      <div class="admin-panel">
        <nav class="admin-menu">
          <div class="admin-menu-item">
            <a href="{{route('admin.statistic')}}">Статистика</a>
          </div>
          <div class="admin-menu-item">
            <a href="{{route('admin.notifications')}}">Уведомления</a>
          </div>
          <div class="admin-menu-item">
            <a href="{{route('admin.catalog')}}">Каталог</a>
          </div>
          <div class="admin-menu-item">
            <a href="{{route('admin.users')}}">Пользователи</a>
          </div>
          <div class="admin-menu-item">
            <a href="{{route('admin.docs')}}">Документы</a>
          </div>
        </nav>
      </div>
        @yield('content')
  </main>

  <script></script>
</body>

</html>