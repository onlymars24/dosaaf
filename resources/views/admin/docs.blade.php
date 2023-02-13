@extends('admin.layout')
@section('title', 'Документы')
@section('h1', 'Документы')
@section('content')
<ul class="mail-message">
  @foreach($progress as $el)
  <li class="mail-message-item"> <a class="mail-message-item-link" id="" href="{{route('admin.doc', ['id' => $el->id])}}">
      <span class="mail-user-name"><strong>{{$el->user->surname}} {{$el->user->name}} {{$el->user->patronymic}}</strong> </span><span
        class="Type-of-message"><strong>Проверка документов</strong></span>
    </a></li>
  @endforeach
</ul>
<script>
  document.querySelector('.exit').style.display = 'none';
</script>
@endsection