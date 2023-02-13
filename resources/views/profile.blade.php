@extends('layout')
@section('title', 'Личный кабинет')
@section('h1', 'Личный кабинет')
@section('href', '/')
@section('content')
<section class="content">
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
      <div class="user-information">
        <a
          class="user-information-item"
          href="{{route('profile.edit')}}""
          >Редактировать данные &#9998;</a
        >
        <div class="user-information-item">
          <strong>ФИО: </strong><span>{{$user->name.' '.$user->surname.' '.$user->patronymic}}</span>
        </div>
        <div class="user-information-item">
          <strong>Организация: </strong><span>{{$user->organization}}</span>
        </div>
        <div class="user-information-item">
          <strong>Адрес: </strong><span>{{$user->address}}</span>
        </div>
        <div class="user-information-item">
          <strong>Телефон: </strong><span>{{$user->phone}}</span>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection