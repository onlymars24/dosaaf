@extends('admin.layout')
@section('title', 'Информация о пользователе')
@section('h1', 'Информация о пользователе')
@section('href', route('admin.users'))
@section('content')
      <div class="open-info-user all-header-user-info">
        <h5>О пользователе</h5>
      </div>

      <div class="user-information">
        <div class="user-information-item">
          <strong>ФИО: </strong><span>{{$user->surname}} {{$user->name}} {{$user->patronymic}}</span>
        </div>
        <div class="user-information-item">
          <strong>Организация: </strong><span>{{$user->organization}}</span>
        </div>
        <div class="user-information-item">
          <strong>Населённый пункт: </strong><span>{{$user->region}}, {{$user->city}}</span>
        </div>
        <div class="user-information-item">
          <strong>Адрес: </strong><span>{{$user->address}}</span>
        </div>
        <div class="user-information-item">
          <strong>Телефон: </strong><span>{{$user->phone}}</span>
        </div>
      </div>

      <div class="open-document-user all-header-user-info">
        <h5>Заявления</h5>
      </div>
      <div class="document-user whole-information row g-3">
        @foreach($docs as $key => $doc)
        <a href="/{{$doc}}/" class="document-download col-xl-2"><p style="font-size: 12px;">{{$key}}</p></a>
        @endforeach


      </div>
      <div class="open-user-cours all-header-user-info">
        <h5>Курсы</h5>
      </div>
      <div class="user-cours whole-information">
        @foreach($progress as $el)
        <div class="course-statistics-item">
          <h5 class="statistics-course-name">
            {{$el->course->title}}
          </h5>
          <div class="pie pie__center animate no-round" id="Required-module" style="--c: rgb(0, 0, 163); --p: {{$el['entire_progress']}}; --w: 120px;">
            <span class="procent">{{$el->entire_progress}} </span>
          </div>
          <a class="statistics-course-detailed statistics-course-detailed-img"
            href="{{route('admin.statistic.course', ['id' => $el->course->id])}}"></a>
        </div>
        @endforeach
      </div>
        <script>
          let Before = document.querySelectorAll(".document-download");
          for (let i = 0; i < Before.length; i++) {
            if (Before[i].innerHTML != "") {
              Before[i].classList.add("documents-to-fill-out-link");
            }
          }
        </script>
@endsection