@extends('layout')
@section('title', 'Мои курсы')
@section('h1', 'Мои курсы')
@section('href', '/')
@section('content')
          <div class="container container-content">
            <div class="block-left">
              <aside
                class="block-left__personal-account-active block-left__all-aside"
              >
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
                  <div class="card__complete-training">
                    <a href="{{route('training', ['id' => $course->id])}}">Продолжить обучение</a>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
            </div>
          </div>
@endsection