@extends('admin.layout')
@section('title', 'Статистика регионов')
@section('h1', 'Статистика регионов')
@section('href', route('admin.statistic'))
@section('content')
      <div class="region">
        <ul class="region-list">
          @foreach($regions as $region)
          <li class="region-item">
            <span>{{$region['name']}}</span><span>{{$region['amount']}} пользователей</span><span>({{$region['percent']}}%)</span>
          </li>
          @endforeach
        </ul>
      </div>
@endsection