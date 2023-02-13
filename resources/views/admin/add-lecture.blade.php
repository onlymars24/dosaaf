@extends('admin.layout')
@section('title', 'Редактировать лекции')
@section('h1', 'Редактировать лекции')
@section('href', route('admin.edit.modules', ['id' => $module->course->id]))
@section('content')
      <form class="form-lecture" id="formLecture" action="{{route('admin.edit.module.lectures.handler', ['id' => $module->id])}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="container">
          <div class="row g-3 all-input-lecture">
          @if(!empty($errors->first('lecture.*')))
          <div class="invalid-feedback d-block">{{$errors->first('lecture.*')}}
          </div>            
          @endif
          @if(!empty($errors->first('lecture')))
          <div class="invalid-feedback d-block">{{$errors->first('lecture')}}
          </div>            
          @endif
          <div class="col-xl-4 col-lg-6 ">
            <div class="lecture-create">       
              <input type="file" accept=".pdf" name="lecture[]" class="form-control-file input-lecture">
            </div>
          </div>
          </div>
        </div>
        <template id="create-item">
          <div class="col-xl-4 col-lg-6 ">
            <div class="lecture-create">       
              <input type="file" accept=".pdf" name="lecture[]" class="form-control-file input-lecture">
            </div>
          </div>
        </template>
        <div class="d-flex-sb">
          <button type="button" id="ADD" class="buttonTest btn btn-primary">
            Добавить
          </button>
          <button class="buttonTest btn btn-primary save-but-lecture" id="buttonLecture">
            Сохранить
          </button>
        </div>
      </form>
      @if($module->list)
        <div class="row g-3 all-input-lecture" style="margin-top: 20px;">
          @foreach(json_decode($module->list) as $key => $el)
          <div class="col-xl-4 col-lg-6">
            <div class="lecture-create">       
              <div class="downloaded-file"><form action="{{route('admin.delete.lecture.handler', ['id' => $module->id, 'key' => $key])}}" method="POST">@csrf<button class="del-module del-but">✖</button></form><a href="/{{$el}}" class="documents-to-fill-out-link">Файл лекции ({{$key}})</a></div>
            </div>
          </div>
          @endforeach
        </div>
      @endif
  
  <script>
    let createInputItem = document.querySelector("#create-item")
    let addBut = document.querySelector("#ADD")
    let addInputItem = document.querySelector(".all-input-lecture")
    let num = 0
    function Addtest() {
      let itemClone = createInputItem.content.cloneNode(true)
      let test = itemClone.querySelector(".input-lecture")
      test.setAttribute('id', num++)
      addInputItem.append(itemClone)
    }
    addBut.addEventListener("click", Addtest)
  </script>
@endsection