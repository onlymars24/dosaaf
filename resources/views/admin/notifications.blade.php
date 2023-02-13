@extends('admin.layout')
@section('title', 'Уведомления')
@section('h1', 'Уведомления')
@section('content')
      <ul class="mail-message">
        <!--  -->
        @foreach($finishes as $finish)
        <li class="mail-message-item {{$finish->checked ? '' : 'not-viewed'}}"> <a class="mail-message-item-link {{$finish->sent ? 'it-decided' : ''}}" id="" href="{{route('admin.notification', ['id' => $finish->id])}}">
            <span class="mail-user-name"><strong>{{$finish->user->surname}} {{$finish->user->name}} {{$finish->user->patronymic}}</strong> </span><span
              class="Type-of-message"><strong>{{$finish->sent ? 'Диплом отправлен' : 'Ожидает диплом'}}</strong></span><span class="text-message">Пользователь
              завершил курс "<span>{{$finish->course->title}}</span>" и ожидает диплом по адресу <span>Москва.
                ул бабушкина д.45 кв 34 почтовый индекс {{$finish->user->postcode}}</span>Номер телефона пользователя
              <span>{{$finish->user->phone}}</span></span>
            >
          </a></li>
          @endforeach
        <!--  -->
        <!--  -->
      </ul>
      <script>document.querySelector('.exit').style.display = 'none';</script>
@endsection