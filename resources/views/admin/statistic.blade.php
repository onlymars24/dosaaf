@extends('admin.layout')
@section('title', 'Статистика')
@section('h1', 'Статистика')
@section('content')
      <section class="statistics">
        <div class="container">
          <div class="number-of-users">
            <div class="number-of-item"><span>{{$arr['usersAmount']}}</span> пользователей</div>
            <div class="number-of-item"><span>{{$arr['newUsersAmount']}}</span> новых</div>
            <div class="number-of-item"><span>{{$arr['activeUsersAmount']}}</span> активных</div>
          </div>
          <div class="number-of-course-statistics">
            <div class="number-of-item number-of-course-statistics-item">
              <span>{{$arr['bought']['amount']}}</span>&nbsp;/&nbsp;<span>{{$arr['bought']['entirePrice']}}</span>₽ Куплено
            </div>
            <div class="number-of-item number-of-course-statistics-item">
              <span>{{$arr['boughtForMonth']['amount']}}</span>&nbsp;/&nbsp;<span>{{$arr['boughtForMonth']['entirePrice']}}</span>₽ за месяц
            </div>
          </div>
          <div class="statistics-region" style="margin-top: 10px;">
            <a href="{{route('admin.statistic.regions')}}">
              <div class="number-of-item region-statistics">Статистика регионов</div>
            </a>
          </div>

          <div class="course-statistics">
            <div class="course-statistics-header">
              <span class="statistics-course-name course-statistics-header-item">Курс</span><span
                class="col-users course-statistics-header-item">Количество пользователей</span><span
                class="col-users course-statistics-header-item">Завершили</span><span
                class="course-statistics-header-item statistics-course-detailed">Подробнее</span>
            </div>
          </div>
          @foreach($arr['courses'] as $el)
          <div class="course-statistics-item">
            <h5 class="statistics-course-name">
              {{$el['course']->title}}
            </h5>
            <span class="col-users">{{$el['bought']}}</span><span class="col-users">{{$el['passed']}}</span><a
              class="statistics-course-detailed statistics-course-detailed-img"
              href="{{route('admin.statistic.course', ['id' => $el['course']->id])}}"></a>
          </div>
          @endforeach
        </div>
        <script>
          document.querySelector('.exit').style.display = 'none';
        </script>
@endsection