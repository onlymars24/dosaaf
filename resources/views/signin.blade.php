@extends('layout')
@section('title', 'Войти')
@section('h1', 'Войти')
@section('href', '/')
@section('content')
<div class="container">
  <div class="block-tasks">
    <ul class="tasks-content">
      <li class="tasks-item">
        <a href="{{route('reset')}}">Сбросить пароль</a>
      </li>
      <li class="tasks-item">
        <a href="{{route('signup')}}">Регистрация</a>
      </li>
    </ul>
  </div>
  <div class="block-login">
    <form action="{{route('signin.handler')}}" method="POST">
      @csrf
      <div class="col-md-12">
            @if(!empty($flash))
              <div class="alert alert-danger" role="alert">{{$flash}}</div>
            @endif

        <label for="inputEmail" class="form-label label-required"
          >Email</label
        >
        <div class="input-group has-validation">
          <input
            type="text"
            class="form-control"
            name="email"
            id="inputEmail"
            maxlength="60"
            placeholder="email.@mail.ru"
            required
          />
          <div class="invalid-feedback">
            Пожалуйста, выберите имя пользователя.
          </div>
        </div>
      </div>
      <p class="form-explanation">
        Укажите ваш email на сайте ПОУ «Кропоткинская автошкола ДОСААФ
        России».
      </p>
      <label for="inputPassword" class="form-label">Пароль</label>
      <input
        type="password"
        id="inputPassword"
        name="password"
        class="form-control"
        aria-describedby="passwordHelpBlock"
      />
      <p class="form-explanation">
        Укажите пароль, соответствующий вашему email.
      </p>
      <button type="submit" class="btn btn-primary">Войти</button>
    </form>
  </div>
</div>
@endsection