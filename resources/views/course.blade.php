@extends('layout')
@section('title', 'Подробнее о курсе')
@section('h1', 'Подробнее о курсе')
@section('href', '/')
@section('content')
<section class="left">
  <div class="container">
    <div class="card-and-more-detailed">
      <!--  -->
      <div class="card-and-more-detailed">
        <div class="block-right__card more-detailed__card">
          <div class="card__img" style="background-image: url(/{{$course->avatar}});"></div>
          <h2 class="card__header">
            {{$course->title}}
          </h2>
          <div class="card__information" style="margin-bottom: 10px;">
            <span class="card__price"
              >Цена: <span class="price__value">{{$course->price}}₽</span></span
            >
            <span class="duration-of-training"
              >Срок обучения:
              <span class="duration__value">{{$course->period}} мес</span></span
            >
          </div>
          @auth
          @if(Auth::user()->status == 'natural')
          <div class="card__complete-training">
            <a href="/more-detailed.html" disabled>Приобрести курс</a>
          </div>
          @elseif(Auth::user()->status == 'legal')
          <div class="payment" id="pay-but">
            Приобрести курс
          </div>
          @endif
          @endauth
        </div>
      </div>
      <!--  -->

      <div class="more-detailed__description">
        <div class="description">
          <h2 class="more-detailed__description__header">
            ОБ ЭТОМ КУРСЕ
          </h2>

          <div class="in-detail">
            {!! $course->descr !!}
          </div>
        </div>
      </div>
    </div>
    @auth
      @if(Auth::user()->status == 'legal')
        <div class="pay-backgraund-close"></div>
        <div class="pay-block">
            <div class="row all-pay">
                <h4 class="pay-header">Оплата курса: <span>Повышение квалификации преподавателей </span></h4>
                <div class="col-sm-12 pay-item pay-left" style="display: none;"><h6>Оплата для физ. лиц</h6><button class="btn btn-primary">Оплатить</button></div>
                <div class="col-sm-12  pay-item" >
                  <div class="documents-to-fill-out">
                    <a href="/{{json_decode($course->docs)->natural}}" class="documents-to-fill-out-link">Заявление</a></div>
                    <p>Отправьте заполненое заявление и документы указанные в нём на почту <a class="mail-pay-lag" href="mailto:method@dosaaf-kropotkin.ru">method@dosaaf-kropotkin.ru</a> с пометкой, что вы являетесь юр. лицом</p>
                </div>
            </div>
        </div>
      @endif
    @endauth


  </div>
</section>
  <script>
    document.querySelector("#pay-but").addEventListener("click", function(){
      document.querySelector(".pay-block").style.display="flex"
      document.querySelector(".pay-backgraund-close").style.display="block"
    })
    document.querySelector(".pay-backgraund-close").addEventListener("click", function(){
      document.querySelector(".pay-block").style.display="none"
      document.querySelector(".pay-backgraund-close").style.display="none"
    })
  </script>
@endsection