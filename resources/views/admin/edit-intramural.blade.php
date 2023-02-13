@extends('admin.layout')
@section('title', 'Редактировать курс очной формы')
@section('h1', 'Редактировать курс очной формы')
@section('href', route('admin.intramurals.catalog'))
@section('content')
      <form action="{{route('admin.edit.intramural.handler', ['id' => $intramural->id])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="container ">
        <div class="add-categories-and-type">
          <div class="row">
            <div class="col-6" id="selectCategoriesBlock">
              <label for="inputCategories" class="form-label">Выберите категорию курса</label>
              <select class="form-select " name="category[]" id="selectCategories" maxlength="60" required>
                <option selected disabled value="">Выберите...</option>
                @foreach($categories as $category)
                <option {{$category->id == $intramural->category_id ? 'selected' : ''}} value="{{$category->name}}">{{$category->name}}</option>
                @endforeach  
                <option value="addInput">Другое</option>
              </select>
            </div>

            <div class="col-6" id="inputCategoriesBlock" style="display: none;">
              <label for="categories" class="form-label">Название новой категории</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="category[]" id="categories" maxlength="60"
                  placeholder=""/>
              </div>
            </div>


            <div class="col-6" id="selectTypeBlock">
              <label for="type" class="form-label">Выберите тип курса</label>
              <select class="form-select " name="type[]" id="selectType" maxlength="60" required>
                <option selected disabled value="">Выберите...</option>
                @foreach($types as $type)
                <option {{$type->id == $intramural->type_id ? 'selected' : ''}} value="{{$type->name}}">{{$type->name}}</option>
                @endforeach  
                <option value="addInput">Другое</option>
              </select>
            </div>

            <div class="col-6" id="inputTypeBlock" style="display: none;">
              <label for="type" class="form-label">Название нового типа</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="type[]" id="type" maxlength="60" placeholder=""/>
              </div>

            </div>

          </div>
          @if(!empty($flash))
            <div style="text-align: center;" class="invalid-feedback d-block" role="alert">{{$flash}}</div>
          @endif   
        </div>

          <div class="card-and-more-detailed">
            <!--  -->


            <div class="block-right__card more-detailed__card">
              @if($intramural->avatar == 'kdfafsdkfjkljarasdf/default-intramurals.jpg')
                <input type="file" name="avatar" class="form-control-file img-create-course" style="padding-left: 10px;">
                @if(!empty($errors->first('avatar')))
                  <div class="invalid-feedback d-block">{{$errors->first('avatar')}}</div>            
                @endif                
              @else
                <div class="downloaded-file"><a href="{{route('admin.delete.intramural.avatar.handler', ['id' => $intramural->id])}}" class="del-module del-but ">✖</a><div style="background-image: url(/{{$intramural->avatar}});" class="card__img"></div></div>
              @endif

              <textarea name="title" id="" cols="30" rows="10" placeholder="Наименование курса">{{$intramural->title}}</textarea>
              @if(!empty($errors->first('title')))
                <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>            
              @endif   
              <label for="documentfiz" style="font-size: 11px; padding: 2px 10px">Прикрепите документ с программой обучения и условиями</label>
                @if(!empty($intramural->doc))
                  <div class="downloaded-file" ><a href="{{route('admin.delete.intramural.doc.handler', ['id' => $intramural->id])}}" class="del-module del-but black-but">✖</a><a href="lectures/dadas.pdf" class="documents-to-fill-out-link">Загруженный файл</a></div>
                @else
                  <input type="file" name="doc" id="documentfiz" class="form-control-file">              
                @endif
              @if(!empty($errors->first('doc')))
                <div class="invalid-feedback d-block">{{$errors->first('doc')}}</div>
              @endif
              <button class="save-course">
                применить и продолжить
              </button>
            </div>

            <!--  -->
            <script>
              $(document).ready(function () { $("#input1").cleditor(); });
              $(document).ready(function () { $("#input2").cleditor(); });
            </script>
            <div class="more-detailed__description">
              <div class="description">
                <h2 class="more-detailed__description__header">Внешнее описание</h2>
                <div class="container-cle">
                  <textarea class="in-detailed-create" name="outsider_descr" id="input1">{{$intramural->outsider_descr}}</textarea>
                  @if(!empty($errors->first('outsider_descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('outsider_descr')}}</div>
                  @endif
                </div>
              </div>
              <div class="description">
                <h2 class="more-detailed__description__header">Внутреннее описание</h2>
                <div class="container-cle">
                  <textarea class="in-detailed-create" name="inner_descr" id="input2">{{$intramural->inner_descr}}</textarea>
                  @if(!empty($errors->first('inner_descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('inner_descr')}}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <label for="hide-course" style="color:rgb(3, 3, 158); margin-bottom: 20px;"><strong>Скрыть курс</strong>
            <input name="hidden" id="hide-course" type="checkbox" {{ $intramural->hidden ? 'checked' : ''}}></label>
      </form>
      <div>
        <form id="formDel" onsubmit="return confirm('Вы уверены что хотите удалить данный курс? ВСЕ МОДУЛИ, А ТАКЖЕ ДАННЫЕ ПРОГРЕССА ПРОХОЖДЕНИЯ КУРСА ПОЛЬЗОВАТЕЛЯМИ БУДУТ УДАЛЕНЫ!!!!');" action="{{route('admin.delete.intramural.handler', ['id' => $intramural->id])}}" method="POST">@csrf<button id="del-course" class="btn btn-danger"><strong>Удалить курс</strong></button></form>
      </div>
      <script>
    // const form = document.querySelector('#formDel')
    // form.onsubmit = (e) => {
    //   e.preventDefault()
    //   const confirmSubmit = confirm('Are you sure you want to submit this form?');
    //   if (confirmSubmit) {
    //     console.log('submitted')
    //   }
    // }

        let inputCategories = document.querySelector("#selectCategories")
        inputCategories.addEventListener("change", function () {
          console.log(inputCategories.value)
          if (inputCategories.value == 'addInput') {
            document.querySelector("#inputCategoriesBlock").style.display = "block"
            document.querySelector("#selectCategoriesBlock").style.display = "none"
          }
        })
        let inputType = document.querySelector("#selectType")
        inputType.addEventListener("change", function () {
          console.log(inputCategories.value)
          if (inputType.value == 'addInput') {
            document.querySelector("#inputTypeBlock").style.display = "block"
            document.querySelector("#selectTypeBlock").style.display = "none"
          }
        })
      </script>      
@endsection