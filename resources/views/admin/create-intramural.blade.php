@extends('admin.layout')
@section('title', 'Новый курс очной формы')
@section('h1', 'Новый курс очной формы')
@section('href', route('admin.intramurals.catalog'))
@section('content')
      <form action="{{route('admin.create.intramural.handler')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="container ">
        <div class="add-categories-and-type">
            <div class="row">
              <div class="col-6" id="selectCategoriesBlock">
                <label for="inputCategories" class="form-label">Выберите категорию курса</label>
                <select class="form-select " name="category[]" id="selectCategories" maxlength="60">
                  <option selected disabled value="">Выберите...</option>
                  @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>                    
                  @endforeach
                  <option value="addInput">Другое</option>
                </select>
              </div>

              <div class="col-6" id="inputCategoriesBlock" style="display: none;">
                <label for="categories" class="form-label">Название новой категории</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" name="category[]" id="categories" maxlength="60" placeholder=""/>
                </div>
              </div>


              <div class="col-6" id="selectTypeBlock">
                <label for="type" class="form-label">Выберите тип курса</label>
                <select class="form-select " name="type[]" id="selectType" maxlength="60">
                  <option selected disabled value="">Выберите...</option>
                  @foreach($types as $type)
                    <option value="{{$type->name}}">{{$type->name}}</option>                    
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
              <input type="file" name="avatar" class="form-control-file img-create-course">
              @if(!empty($errors->first('avatar')))
                <div class="invalid-feedback d-block">{{$errors->first('avatar')}}</div>            
              @endif  
              <textarea name="title" id="" cols="30" rows="10" placeholder="Наименование курса">{{old('title')}}</textarea>
              @if(!empty($errors->first('title')))
                <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>            
              @endif   
              <label for="documentfiz" style="font-size: 11px; padding: 2px 10px">Прикрепите документ с программой обучения и условиями</label>
                <input type="file" name="doc" id="documentfiz" class="form-control-file">
                <!-- <div class="downloaded-file" ><form action=""><button class="del-module del-but black-but">✖</button></form> <a href="lectures/dadas.pdf" class="documents-to-fill-out-link">Загруженный файл</a></div> -->
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
                  <textarea class="in-detailed-create" name="outsider_descr" id="input1">{{old('outsider_descr')}}</textarea>
                  @if(!empty($errors->first('outsider_descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('outsider_descr')}}</div>
                  @endif
                </div>
              </div>
              <div class="description">
                <h2 class="more-detailed__description__header">Внутреннее описание</h2>
                <div class="container-cle">
                  <textarea class="in-detailed-create" name="inner_descr" id="input2">{{old('inner_descr')}}</textarea>
                  @if(!empty($errors->first('inner_descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('inner_descr')}}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <label for="hide-course" style="color:rgb(3, 3, 158); margin-bottom: 20px;"><strong>Скрыть курс</strong>
            <input name="hidden" id="hide-course" type="checkbox"></label>
      </form>
      <script>

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