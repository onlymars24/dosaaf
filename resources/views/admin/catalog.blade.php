@extends('admin.layout')
@section('title', 'Каталог')
@section('h1', 'Каталог')
@section('content')
      <div class="container block-right">
        <!--  -->
        <div class="admin-type-of-training">
          <a href="{{route('admin.catalog')}}" style="border-top: 2px solid #3db166;" class="admin-type-of-training-item">Заочное
            обучение</a>
          <a href="{{route('admin.intramurals.catalog')}}" class="admin-type-of-training-item">Очно-заочное обучение</a>

        </div>
        <div class="add-new-courses">
          <a href="{{route('admin.create.course')}}">Добавить &#9998;</a>
        </div>
        <div class="search-block">
          <input type="text" class="form-control search" name="name" id="input-course-name" maxlength="120" />
        </div>

        <!--  -->

        <div class="row g-3 block-right__content">
          <div class="backgraund-close-active"></div>
          @php
          $i = 0;
          @endphp
          <!--  -->
          @foreach($courses as $course)
          <div class="col-xl-4 col-lg-6 right-card-dysplay">
            <div class="block-right__card">
              <div class="card__img" style="background-image: url(/{{$course->avatar}});"></div>
              <h2 class="card__header">
              ID{{$course->id}}<br> {{$course->title}}
              </h2>
              <div class="card__information">
                <span class="card__price">Цена: <span class="price__value">{{$course->price}}₽</span></span>
                <span class="duration-of-training">Срок обучения:
                  <span class="duration__value">{{$course->period}}</span></span>
              </div>
              <form method="POST" action="{{route('admin.catalog.handler', ['course_id' => $course->id])}}" class="search-user" data-id="{{$course->id}}"  onsubmit="return confirm('Убедитесь в правильности выставления галочек!!! Если у пользователя забирается доступ к курсу, то БЕЗВОЗВРАТНО удаляется весь прогресс прохождения!!!');">
              @csrf  
              <div>
                  <input type="text" class="form-control" id="input-user-name" />
                  <button class="btn btn-primary w100">Сохранить</button>
                  @foreach($users as $user)
                  @php
                    $i++;
                  @endphp                    
                  <div class="user-access">
                    <label for="{{$i}}" class="label-check-user-name">{{$user->name}} {{$user->surname}}</label><input class="check-user-name"
                      type="checkbox" id="{{$i}}" name="{{$user->id}}" {{ $user->courses()->find($course->id) ? 'checked' : ''}}/>
                  </div>
                  @endforeach
                </div>

              </form>
              <div class="access">
                <p data-id="{{$course->id}}" class="access-click">Доступ к курсу</p>
              </div>

              <div class="card__complete-training">
                <a href="{{route('admin.edit.course', ['id' => $course->id])}}">Редактировать &#9998;</a>
              </div>
            </div>
          </div>

          @endforeach
          <!--  -->
        </div>
        <!--  -->

  <script>
    document.querySelector('.exit').style.display = 'none';
    let access = document.querySelector(".block-right");
    let searchUser = document.querySelectorAll('.search-user');
    let closeMenuAccount = document.querySelector(".backgraund-close-active");


    access.addEventListener("click", function (event) {

      let open = document.querySelector('[data-id="' + event.target.dataset.id + '"]')


      open.style.maxWidth = "300px";
      closeMenuAccount.style.display = "block";


      closeMenuAccount.addEventListener("click", function () {
        open.style.maxWidth = "0px";
        closeMenuAccount.style.display = "none";
      });


      let sortUser = open.querySelector("#input-user-name");
      let checkUser = open.querySelectorAll(".user-access");
      let labeluserName = open.querySelectorAll(".label-check-user-name");

      function sortUserName() {
        for (let i = 0; i < checkUser.length; i++) {
          console.log(sortUser.value.toLocaleLowerCase())
          if ((labeluserName[i].innerHTML.toLocaleLowerCase()).includes(sortUser.value.toLocaleLowerCase())) {
            checkUser[i].style.display = "flex";
          } else {
            checkUser[i].style.display = "none";
          }
        }

      }
      sortUser.addEventListener("input", sortUserName);
    })





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
</div>
@endsection