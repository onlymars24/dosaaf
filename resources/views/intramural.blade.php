@extends('layout')
@section('title', 'Очный курс')
@section('h1', $intramural->title)
@section('href', '/intramurals')
@section('content')
      <section class="left">
        <div class="container">
          <div class="card-and-more-detailed">
            <!--  -->



            <!--  -->

            <div class="more-detailed__description">
              <div class="description">
                <h2 class="more-detailed__description__header">
                  ОБ ЭТОМ КУРСЕ
                </h2>

                <div class="in-detail">
                  {!! $intramural->inner_descr !!}
                  @if(!empty($intramural->doc))
                    <a href="/{{$intramural->doc}}" class="documents-to-fill-out-link">План обучения</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection