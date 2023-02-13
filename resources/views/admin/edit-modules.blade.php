@extends('admin.layout')
@section('title', 'Каталог')
@section('h1', 'Каталог')
@section('href', route('admin.edit.course', ['id' => $course->id]))
@section('content')
      <div class="training-header">
        <h4>
          {{$course->title}}
        </h4>
      </div>

      <div class="row g-3 block-right__content block-right-created-module" style="min-width: 100%">
        @foreach($course->modules as $module)
        <div class="col-xl-6 col-lg-12">
          <div class="traning-module">
            <div class="training-header-item">
              <h2>{{$module->type}}</h2>
              <form action="{{route('admin.delete.module.handler', ['id' => $module->id])}}" method="POST">@csrf<button class="del-module">✖</button></form>
            </div>
            <form action="{{route('admin.edit.modules.handler', ['id' => $module->id])}}" method="POST">
              @csrf
              <input value="{{$module->title}}" type="text" name="title" class="form-control" id="name-module"
                placeholder="Введите название модуля, отображаться будет только оно" />
              <input value="{{$module->min_level}}" name="minlevel" type="number" class="form-control" id="min-level" placeholder="Минимальный уровень прохождения" />
              <input value="{{$module->priority}}" name="priority" type="number" class="form-control" id="priority"
                placeholder="Приоритет. Модули будут отображаться по порядку" />
              <div class="traning__goModule">
                <button class="go-module-btn">Сохранить и перейти в модуль</button>
              </div>
            </form>
          </div>
        </div>
        @endforeach

      </div>
    <div class="container block-right block-right-create">
      <div class="row g-3 block-right__content block-right-create-module block-right-create-module-menu">
        <!--  -->
        <form action="{{route('admin.create.module.handler', ['id' => $course->id])}}" method="POST" class="col-12 create-module-menu-all">
          @csrf
          <div class="block-create-item-module">
            <select name="type" id="" class="create-module-select">
              <option value="lectures">Лекции</option>
              <option value="test">Тесты</option>
              <option value="videos">Видео</option>
            </select>
          </div>

          <button class="select-apply">Добавить</button>
        </form>
      </div>
    </div>
  <script>
    //
    let id = 0;
    let addModuleSelect = document.querySelector(".add-module-select");
    function addModuleSelectFun() {
      let itemModuleCreate = document.createElement("div");
      itemModuleCreate.innerHTML =
        '<select name="" id="' +
        id +
        '" class="create-module-select"> <option value="lecture">Лекции</option><option value="Test">Тесты</option><option value="Video">Видео</option>   </select>';
      document
        .querySelector(".block-create-item-module")
        .append(itemModuleCreate);
      id++;
    }
    addModuleSelect.addEventListener("click", addModuleSelectFun);
    //
    let select = document.querySelector(".select-apply");

    function addmodule() {
      let createblock = document.createElement("div");
      createblock.classList.add(
        "row",
        "g-3",
        "block-right__content",
        "block-right-created-module"
      );
      let createdSelect = document.querySelectorAll(".create-module-select");

      for (let i = 0; i < createdSelect.length; i++) {
        switch (createdSelect[i].value) {
          case "lecture":
            createblock.innerHTML +=
              '            <div class="col-xl-6 col-lg-12">               <div class="traning-module">                  <h2 class="training-header-item">                   Лекции                 </h2> <input type="text" class="form-control" id="name-module" placeholder="Введите название модуля, отображаться будет только оно">    <input type="number" class="form-control" id="min-lavel" placeholder="Минимальный уровень прохождения">              <div class="traning__goModule">                   <a href="/admin/add lecture.html">Перейти в модуль</a>                 </div>               </div>             </div>';

            break;
          case "Test":
            createblock.innerHTML +=
              '         <div class="col-xl-6 col-lg-12">               <div class="traning-module">                  <h2 class="training-header-item">                   Тестирование                 </h2>  <input type="text" class="form-control" id="name-module" placeholder="Введите название модуля, отображаться будет только оно">  <input type="number" class="form-control" id="min-lavel" placeholder="Минимальный уровень прохождения">                        <div class="traning__goModule">                   <a href="/admin/AdminTest.html">Перейти в модуль</a>                 </div>               </div>             </div>';

            break;
          case "Video":
            createblock.innerHTML +=
              '                       <div class="col-xl-6 col-lg-12">                 <div class="traning-module">                      <h2 class="training-header-item">                     Видео лекции                   </h2>  <input type="text" class="form-control" id="name-module" placeholder="Введите название модуля, отображаться будет только оно">  <input type="number" class="form-control" id="min-lavel" placeholder="Минимальный уровень прохождения">                   <div class="traning__goModule">                     <a href="/admin/add  Video.html">Перейти в модуль</a>                   </div>                 </div>               </div>';

            break;
        }

        document.querySelector(".block-right-create").append(createblock);
      }

      document.querySelector(".create-module-menu-all").style.display =
        "none";
      createblock.style.minWidth = "100%";
    }
    select.addEventListener("click", addmodule);
  </script>
@endsection