@extends('layout')
@section('title', 'Сменить пароль')
@section('h1', 'Сменить пароль')
@section('href', '/')
@section('content')
<section>
  <div class="container">
    <div class="block-tasks">
      <ul class="tasks-content">
        <li class="tasks-item">
          <a href="{{route('signin')}}">Войти</a>
        </li>
        <li class="tasks-item">
          <a href="{{route('signup')}}">Регистрация</a>
        </li>
      </ul>
    </div>
    <div class="block-password-reset">
      <form action="{{route('reset.handler')}}" method="POST">
        <div class="col-md-12">
          @if(!empty($flash))
            <div class="alert alert-danger" role="alert">{{$flash}}</div>
          @endif
          <label for="inputEmail" class="form-label label-required"
            >Email</label
          >
          <div class="input-group has-validation">
            @csrf
            <input
              type="text"
              class="form-control"
              name="email"
              id="inputEmail"
              maxlength="60"
              placeholder="email.@mail.ru"
            />
            <div class="invalid-feedback">
              Пожалуйста, выберите имя пользователя.
            </div>
          </div>
        </div>
        <p class="form-explanation">
          Инструкция по сбросу пароля будет отправлена на ваш
          зарегистрированный email-адрес.
        </p>

        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
    </div>
  </div>
</section>
@endsection