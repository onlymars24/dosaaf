<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style/norm.css" />
  <link rel="stylesheet" href="/style/bootstrap.css" />
  <link rel="stylesheet" href="/style/style.css" />
  <link rel="icon" href="/img/logo.svg" />
  <script defer src="/script/bootstrap.js"></script>
  <script defer src="/script/script.js"></script>
  <title>
  @yield('title')
  </title>
</head>

<body style="overflow: hidden;" class="body">
  <div class="loader-body">
    <div class="logotipe logo-loader"></div>
    <span class="loader">
      <span class="loader-inner"></span>
    </span>
  </div>
  <div class="wrapper">
    <header>
      <div class="header-container">
        <div class="header__strip">
          <div class="layout-header-1 layout-header">
            <a class="logotipe" href="https://dosaaf-kropotkin.ru/"></a>
            <div class="header-mail">
              <span class="header__icon-mail"></span>
              <div class="header__mail">
                <a href="mailto:info@dosaaf-kropotkin.ru">info@dosaaf-kropotkin.ru</a>
              </div>
            </div>
            <div class="header-phone">
              <span class="header__icon-phone"></span>
              <div class="header__phone">
                <a href="tel:8%28918%29112-77-70">8 (918) 112-77-70 </a>
              </div>
            </div>
            <div class="block-contact-question">
              <span class="question-icon"></span>
              <a class="question" href="https://dosaaf-kropotkin.ru/contacts">Задать вопрос</a>
            </div>
          </div>

          <div class="block-account-phone">
            @guest
            <div class="account-phone">
              <a href="{{route('signin')}}">Войти</a>
            </div>
            @endguest
            @auth
            <div class="login-phone account-phone">
              <button class="my-account-phone-but" id="my-account-phone-but">
                Мой профиль
              </button>
              <div class="backgraund-close-active"></div>
              <div class="drop-down-list">
                <nav class="account-active__links form-personal-account account-active-phone">
                  <div class="my-profile-all">
                    <a href="{{route('my.courses')}}">Мои курсы</a>
                  </div>
                  <div class="my-profile-all">
                    <a href="{{route('profile')}}">Моя учётная запись</a>
                  </div>
                  <div class="my-profile-all">
                    <a href="{{route('logout')}}">Выход</a>
                  </div>
                </nav>
              </div>
            </div>
            @endauth
          </div>
        </div>
      </div>
      <div class="layout-header-2 layout-header">
        <div class="header__menu">
          <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
              <span class="menu-btn-span">Меню</span>
            </label>

            <ul class="menu__box">
              <li>
                <a href="https://dosaaf-kropotkin.ru/" class="menu__item">Главная</a>
              </li>
              <li>
                <a href="https://dosaaf-kropotkin.ru/stoimost-obucheniya" class="menu__item">Стоимость обучения</a>
              </li>
              <li>
                <a href="https://dosaaf-kropotkin.ru/o-nas" class="menu__item">О нас</a>
              </li>
              <li>
                <a href="https://dosaaf-kropotkin.ru/contacts" class="menu__item">Контакты</a>
              </li>
              <li>
                <a href="https://dosaaf-kropotkin.ru/news" class="menu__item">Новости</a>
              </li>
            </ul>
            <label class="menu__backgraund-close" for="menu__toggle"> </label>
          </div>
          <ul class="menu">
            <li class="menu-item">
              <a href="https://dosaaf-kropotkin.ru/" class="sf-depth-1">Главная</a>
            </li>
            <li class="menu-item">
              <a href="https://dosaaf-kropotkin.ru/stoimost-obucheniya" class="sf-depth-1">Стоимость обучения</a>
            </li>
            <li class="menu-item">
              <a href="https://dosaaf-kropotkin.ru/o-nas" class="sf-depth-1">О нас</a>
            </li>
            <li class="menu-item">
              <a href="https://dosaaf-kropotkin.ru/contacts" class="sf-depth-1">Контакты</a>
            </li>
            <li class="menu-item">
              <a href="https://dosaaf-kropotkin.ru/news" class="sf-depth-1">Новости</a>
            </li>
          </ul>

          <div class="block-site-distance">
            <div class="distance-courses-btn">
              <a class="btn-link btn-link-full-time" href="{{route('intramurals')}}">Очно-заочное обучение</a>
            </div>
            <div class="distance-courses-btn">
              <a class="btn-link btn-link-distance" href="/">Дистанционное обучение</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <section class="content">
        <div class="main__header">
          <div class="header__strip">
            <div class="layout-header-3 layout-header">
              <div class="block-title">
                <a href="@yield('href')" class="exit"></a>
                <h1>
                @yield('h1')
                  @auth
                  @if(Auth::user()->admin)
                  <a href="{{route('admin.catalog')}}">Админка</a>
                  @endif
                  @endauth
                </h1>
              </div>
            </div>
          </div>
        </div>

        @yield('content')
      </section>
    </main>
  </div>
  <footer>
    <div class="upper-part">
      <div class="container-footer container">
        <div class="footer-menu footer-menu-1">
          <div class="footer-adress">
            352380, Краснодарский край, г. Кропоткин, ул. Дугинец, 25
          </div>
          <div class="header__phone footer-phone">
            <a href="tel:89181127770">8 (918) 112-77-70 </a>
          </div>
          <div class="header__mail footer-mail">
            <a href="mailto:info@dosaaf-kropotkin.ru">info@dosaaf-kropotkin.ru</a>
          </div>
          <span class="footer-line"></span>
        </div>
        <div class="footer-menu footer-menu-2">
          <h4>Правовая информация<span class="footer-line"></span></h4>

          <nav class="legal-information">
            <a href="https://dosaaf-kropotkin.ru/private-policy">Политика в отношении обработки персональных данных</a>
            <a href="https://dosaaf-kropotkin.ru/usloviya-ispolzovaniya-materialov-sayta">Условия использования
              материалов сайта</a>
          </nav>
        </div>
        <div class="footer-menu footer-menu-3">
          <h4>Обучение<span class="footer-line"></span></h4>

          <a href="{{route('intramurals')}}">Очно-заочное обучение</a>
          <a href="/">Дистанционное обучение</a>
        </div>
        <div class="footer-menu footer-menu-4">
          <h4>Дополнительная информация<span class="footer-line"></span></h4>

          <ul class="footer-menu__information">
            <li class="footer-menu__information-item">
              <a href="https://dosaaf-kropotkin.ru/otzyvy">Отзывы</a>
            </li>
            <li class="footer-menu__information-item">
              <a href="https://dosaaf-kropotkin.ru/partnyory">Партнёры</a>
            </li>
            <li class="footer-menu__information-item">
              <a href="https://dosaaf-kropotkin.ru/poleznye-ssylki">Полезные ссылки</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="lower-part">
      <div class="container container-footer_lower-part">
        <div class="lower-part__left">
          <h3>© 2022 | ПОУ «Кропоткинская автошкола ДОСААФ России»</h3>
          <p>
            Вся представленная на сайте информация является ознакомительной и
            носит исключительно информационный характер и ни при каких
            условиях не является публичной офертой.
          </p>
        </div>
        <div class="lower-part-right">
          <h3>Мы в соц. сетях:</h3>
          <nav class="social-networks">
            <a target="_blank" class="vk" href="https://vk.com/dosaaf.krop"></a>
            <a target="_blank" class="ok" href="https://ok.ru/profile/573546946401"></a>
            <a target="_blank" class="wa" href="https://wa.me/79181127770"></a>
          </nav>
        </div>
      </div>
    </div>
  </footer>

  <script>
    var preloader = setInterval(function () {
      if (document.readyState === "complete") {
        clearInterval(preloader);
        document.body.style.overflow = "auto"
        document.querySelector(".loader-body").style.display = "none"
      }
    }, 50);
  </script>
  <script src="/script/filtration.js"></script>
</body>

</html>