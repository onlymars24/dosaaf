@extends('layout')
@section('title', 'Дистанционные курсы')
@section('h1', 'Дистанционные курсы')
@section('href', '/')
@section('content')
<!-- <div class="" style="background-color: black;">
  <a href="#" class="exit"></a><h1>Дистанционные курсы</h1>
</div> -->

        <div class="container container-content">
          <div class="block-left">
            <aside class="block-left__all-aside block-left__categories no-input">
              <input type="checkbox" id="categories" />
              <label for="categories" class="label-header categories-header headers-block-left">Категория курса
              </label>
              <label class="menu__backgraund-close" for="categories"></label>
              <ul class="block-left__list-categories-all block-left__list-all">
                <h3 class="phone-header-traning">Категория курса</h3>
                @php
                  $activeCate = '';
                  $activeType = '';                
                @endphp
                @foreach($categories as $category)
                @if(!empty($_GET['category']) && $_GET['category'] == $category->id)
                @php
                  $activeCate = ' categories-active';              
                @endphp
                @else
                @php
                  $activeCate = '';              
                @endphp
                @endif
                <li class="block-left__list-categories-item block-left__list-item{{$activeCate}}">
                  <p data-category="{{$category->id}}">{{$category->name}}</p>
                </li>              
                @endforeach
              </ul>
            </aside>
            <aside class="block-left__all-aside block-left__type-of-training no-input">
              <input type="checkbox" id="type-of-training" />
              <label for="type-of-training" class="label-header headers-block-left">Тип <span
                  class="label-header-pc">обучения</span>
              </label>
              <label class="menu__backgraund-close" for="type-of-training"></label>

              <ul class="block-left__list-type-of-training block-left__list-all">
                <h3 class="phone-header-traning">Тип обучения</h3>
                @foreach($types as $type)
                @if(!empty($_GET['type']) && $_GET['type'] == $type->id)
                @php
                  $activeType = ' categories-active';              
                @endphp
                @else
                @php
                  $activeType = '';              
                @endphp
                @endif
                <li class="block-left__list-type-of-training-item block-left__list-item{{$activeType}}">
                  <p data-type="{{$type->id}}">{{$type->name}}</p>
                </li>
                @endforeach
              </ul>
            </aside>
            @guest
            <aside class="block-left__personal-account block-left__all-aside">
              <div class="personal-account-header headers-block-left">
                Личный Кабинет
              </div>
              <form class="form-personal-account" action="{{route('signin.handler')}}" method="POST">
                @csrf
                <label for="username">Имя пользователя:</label>
                <input type="text" name="email" id="username" />
                <label for="userPassword">Пароль:</label>
                <input id="userPassword" name="password" type="password" />
                <button class="button-personal-account">Войти</button>
                <nav>
                  <a class="block-left__registration additional-functions-forms" href="{{route('signup')}}">Регистрация
                  </a>
                  <a class="block-left__password-reset additional-functions-forms" href="{{route('reset')}}">Сбросить
                    ваш пароль</a>
                </nav>
              </form>
            </aside>
            @endguest
            @auth
            <aside class="block-left__personal-account-active block-left__all-aside">
              <div class="personal-account-header headers-block-left">
                Мой профиль
              </div>
              <nav class="account-active__links form-personal-account">
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
            </aside>
            @endauth
          </div>
          <div class="container block-right">
            <div class="row g-3 block-right__content">
              <!--  -->
              @foreach($courses as $course)
              <div class="col-xl-4 col-lg-6">
                <div class="block-right__card block-right__card__scale">
                  <div class="card__img" style="background-image: url({{$course->avatar}});"></div>
                  <h2 class="card__header">
                  {{$course->title}}
                  </h2>
                  <div class="card__information">
                    <span class="card__price">Цена: <span class="price__value">{{$course->price}}₽</span></span>
                    <span class="duration-of-training">Срок обучения:
                      <span class="duration__value">{{$course->period}}</span></span>
                  </div>

                  <div class="card__complete-training">
                    <a href="{{route('course', ['id' => $course->id])}}">Узнать больше</a>
                  </div>
                </div>
              </div>
              @endforeach
              <!--  -->
            </div>
          </div>
        </div>
          <div class="block-right-pages">
            <ul class="block-right-all-pages">
              <div class="block-right-pages">{{$courses->links()}} </div>
            </ul>
          </div>
        <script>
          document.querySelector('.exit').style.display = 'none';
          var preloader = setInterval(function () {
            if (document.readyState === "complete") {
              clearInterval(preloader);
              document.body.style.overflow = "auto"
              document.querySelector(".loader-body").style.display = "none"
            }
          }, 50);
        </script>
        <script src="/script/filtration.js"></script>
@endsection