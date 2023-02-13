@extends('admin.layout')
@section('title', 'Уведомления')
@section('h1', 'Уведомления')
@section('href', route('admin.notifications'))
@section('content')
      <div class="mail-message">
        <a class="mail-message-item-open" id="">
          <span class="mail-user-name"><strong>{{$user->surname}} {{$user->name}} {{$user->patronymic}}</strong> </span><span
            class="Type-of-message-open"><strong>{{$finish->sent ? 'Диплом отправлен' : 'Ожидает диплом'}}</strong></span><span
            class="text-message-open">Пользователь завершил курс "<span>{{$finish->course->title}}</span>" и
            ожидает диплом по адресу <span>{{$user->city}}, {{$user->address}}, почтовый индекс {{$user->postcode}}</span>
        </a>
        @if(!$finish->sent)
        <form action="{{route('admin.notification.handler', ['id' => $finish->id])}}" method="POST">
          @csrf
          <div class="col-12">
          <input
            type="text"
            class="form-control"
            name="track"
            id="inputIndex"
            placeholder="трек номер"
            maxlength="50"
            required
          />
        </div>
        <button class="w100 btn btn-primary">Диплом отправлен</button>
        </form>
        @endif
        <div class="read-the-message"></div>
      </div>
@endsection