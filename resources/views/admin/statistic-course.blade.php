@extends('admin.layout')
@section('title', 'Статистика курса')
@section('h1', 'Статистика курса')
@section('href', route('admin.statistic'))
@section('content')
      <div class="training-header">
        <h4>
          {{$course->title}}
        </h4>
      </div>
      <div class="number-of-course-statistics" style="margin-bottom: 20px">
        <div class="number-of-item number-of-course-statistics-item">
          <span>{{$arr['bought']['amount']}}</span>&nbsp;/&nbsp;<span>{{$arr['bought']['entirePrice']}}</span>₽ Куплено
        </div>
        <div class="number-of-item number-of-course-statistics-item">
          <span>{{$arr['boughtForMonth']['amount']}}</span>&nbsp;/&nbsp;<span>{{$arr['boughtForMonth']['entirePrice']}}</span>₽ за месяц
        </div>
      </div>

      <div class="user-cours whole-information">
        @foreach($arr['users'] as $el)
        <div class="course-statistics-item">
          <h5 class="statistics-course-name">{{$el['SNP']}}</h5>
          <div class="pie pie__center animate no-round" id="Required-module" style="--c: rgb(0, 0, 163); --p: {{$el['entire_progress']}}; --w: 120px;">
            <span class="procent">{{$el['entire_progress']}}</span>
          </div>
          <a class="statistics-course-detailed statistics-course-detailed-img" href="{{route('admin.user', ['id' => $el['id']])}}"></a>
        </div>
        @endforeach
      </div>
@endsection