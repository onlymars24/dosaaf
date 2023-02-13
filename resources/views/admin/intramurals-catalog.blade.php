@extends('admin.layout')
@section('title', 'Каталог очных курсов')
@section('h1', 'Каталог очных курсов')
@section('content')
      <div class="container block-right">
        <!--  -->
        <div class="admin-type-of-training">
          <a href="{{route('admin.catalog')}}" class="admin-type-of-training-item">Заочное обучение</a>
          <a href="{{route('admin.intramurals.catalog')}}" style="border-top: 2px solid #3db166;"
            class="admin-type-of-training-item">Очно-заочное обучение</a>
        </div>
        <div class="add-new-courses">
          <a href="{{route('admin.create.intramural')}}">Добавить &#9998;</a>
        </div>
        <div class="search-block">
          <input type="text" class="form-control search" name="name" id="input-course-name" maxlength="120" />
        </div>


        <div class="row g-3 block-right__content">
          <div class="backgraund-close-active"></div>
          <!--  -->
          @foreach($intramurals as $intramural)
          <div class="col-xl-4 col-lg-6 right-card-dysplay">
            <div class="block-right__card block-right__card__scale">
              <div class="card__img">
                <img class="card__img" src="/{{$intramural->avatar}}" alt="" />
              </div>
              <h2 class="card__header">
                {{$intramural->title}}
              </h2>
              <div class="card__information">
                {!!$intramural->outsider_descr!!}
              </div>

              <div class="card__complete-training">
                <a href="{{route('admin.edit.intramural', ['id' => $intramural->id])}}">Редактировать &#9998;</a>
              </div>
            </div>
          </div>
          @endforeach
          <!--  -->


        </div>
      </div>
  <script>
    document.querySelector('.exit').style.display = 'none';
    let searchCourse = document.querySelector("#input-course-name");
    let displayCard = document.querySelectorAll(".right-card-dysplay");
    let nameCourse = document.querySelectorAll(".card__header");
    function sortcourseName() {
      for (let i = 0; i < displayCard.length; i++) {
        if ((nameCourse[i].innerHTML.toLocaleLowerCase()).includes(searchCourse.value.toLocaleLowerCase())) {
          displayCard[i].style.display = "block";
        } else {
          displayCard[i].style.display = "none";
        }
      }
    }
    searchCourse.addEventListener("input", sortcourseName);
  </script>
@endsection