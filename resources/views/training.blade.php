@extends('layout')
@section('title', 'Мои курсы')
@section('h1', 'Мои курсы')
@section('href', route('my.courses'))
@section('content')
        <div class="container">
          <div class="training-header">
            <h4>
              {{$course->title}}
            </h4>
          </div>
          <div class="all-progress">
            <h5>Общий прогресс:</h5>
            <div class="progress">
              <div
                class="progress-bar progress-bar-striped progress-bar-animated"
                role="progressbar"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
                style="width: {{$entire_progress}}%"
              ></div>
            </div>
          </div>
          <div class="container block-right">
            <div class="row g-3 block-right__content">
              @foreach($modules as $module)
              @php
                $prog = $progress->{$module->id}
              @endphp
              <div class="col-md-6">
                <div class="traning-module">
                  <h2 class="training-header-item">{{$module->title}}</h2>
                  <div class="traning__temp-result">
                    <div class="temp-result__item">
                      <h3>Пройдено:</h3>

                      <div
                        class="pie pie__center animate no-round"
                        id="Required-module"
                        style="--c: orange; --w: 129px"
                      >
                        <span class="procent">{{$prog->percent}} </span>
                      </div>
                    </div>
                    <div class="temp-result__item">
                      <h3>Итоговый результат:</h3>
                      <img class="result" src="/img/state_{{$prog->result}}.png" alt="">
                    </div>
                  </div>

                  <div class="traning__goModule">
                    <a href="/module/{{$module->type}}/{{$module->id}}/{{$module->alias}}/{{$progress_id}}/{{$progress_alias}}">Перейти в модуль</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @if(!$finish->informed && $finish->passed)
        <section id="main">
          <div class="backgraund-intro">
            <div class="intro">
              <div class="video">
                
              </div>

              <div class="intro__content">
                <div class="animated">
                  <div class="logotipe header-intro"></div>
                  <p class="header-discription">Мы поздравляем вас с окончанием обучения. 
                    <br>Ожидайте диплом в ближайшее время.</p>
                    <form action="{{route('training.informed', ['id' => $finish->id])}}" method="POST">
                      @csrf
                      <button class="btn btn-primary btn-intro">Вернуться к модулям</button>
                    </form>
                </div>
              </div>
              <div class="shadow-intro"></div>
            </div>
          </div>
        </section>
        @endif
        <script>
          let procent = document.querySelectorAll(".procent");
          let pieProcent = document.querySelectorAll(".pie");
          let RequiredModule = document.querySelectorAll("#Required-module");
          let overallProgress = 0;
          let progressBar = document.querySelector(".progress-bar");
          for (let i = 0; i < procent.length; i++) {
            pieProcent[i].style.setProperty("--p", procent[i].innerHTML);
            if (pieProcent[i].id == "Required-module") {
              overallProgress += parseInt(procent[i].innerHTML);
            }
          }
          document.querySelector(".btn-intro").addEventListener("click", function(){
            document.querySelector(".backgraund-intro").style.display="none"
            document.body.style.overflow = "auto"
          })
          function atload() { dom_rdy() } window.onload = atload;
          function dom_rdy() {
            setTimeout(function () {
              document.body.style.height = "100vh"
              document.body.style.overflow = "hidden"
              setTimeout(function () {
                document.querySelector(".animated").style.transform = "scale(2)"
              }, (1600));
              setTimeout(function () {
                document.querySelector(".intro").style.left = "0px"
              }, (200));
              setTimeout(function () {
                document.querySelector(".shadow-intro").style.left = "-20vw"

              }, (1200));
              setTimeout(function () {
                document.querySelector(".animated").style.opacity = "1"

              }, (2000));
              setTimeout(function () {
                document.querySelector(".shadow-intro").style.display = "none"
                document.querySelector(".header-discription").style.opacity = "1"
              }, (2600));
              setTimeout(function () {
                document.querySelector(".header-discription").style.top = "0px"
              }, (2500));
            }, (1600));
          }
        </script>
@endsection