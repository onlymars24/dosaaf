@extends('layout')
@section('title', 'Курс')
@section('h1', 'Курс')
@section('href', route('my.courses'))
@section('content')
<section class="traning-content">
  <div class="container">
      <div class="training-header">
      <h4>
        {{$progress->course->title}}
      </h4>
    </div>
    <div class="documents-revive "> <!-- Подставить класс display-none -->
    @if($progress->docs_status == 'standby')
    <h3 class="status-documents"style="margin-top: 40px;">
      В данный момент документы на проверке. Если документы пройдут проверку, вам на почту придёт договор.
    </h3>
    @endif
    @if($progress->docs_status == 'rejected')
    <h3 class="status-documents" style="margin-top: 40px;">
      К сожалению, документы не прошли проверку.
    </h3>
    @endif
    <div class="spinner-block ">
      <svg class="spinner" viewBox="0 0 50 50">
        <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
      </svg>
    </div>
    </div>
    @if($progress->docs_status == 'rejected')
    <div class="documents-not-verified " style="margin-top: 40px;"> <!-- Подставить класс display-none -->
      <form action="{{route('training.answer.reload', ['id' => $progress->id])}}" method="POST">
        @csrf
        <button class="button-center btn btn-primary">Отправить документы заного</button>
      </form>
    </div>
    @endif
  </div>
</section>
@endsection