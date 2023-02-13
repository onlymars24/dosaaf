@extends('admin.layout')
@section('title', 'Новый курс')
@section('h1', 'Новый курс')
@section('href', route('admin.catalog'))
@section('content')
      <form action="{{route('admin.create.course.handler')}}" enctype="multipart/form-data" method="POST">
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
              @if(!empty($errors->first('type')))
                <div class="invalid-feedback d-block">{{$errors->first('type')}}</div>            
              @endif              

            </div>
          @if(!empty($flash))
            <div style="text-align: center;" class="invalid-feedback d-block" role="alert">{{$flash}}</div>
          @endif            
          </div>


          <div class="card-and-more-detailed">

            <div class="block-right__card more-detailed__card">
              <input type="file" name="avatar" class="form-control-file img-create-course" style="padding-left: 10px;">
              @if(!empty($errors->first('avatar')))
                <div class="invalid-feedback d-block">{{$errors->first('avatar')}}</div>            
              @endif  
              <textarea class="{{!empty($errors->first('title')) ? 'is-invalid' : '' }}" name="title" id="" cols="30" rows="10" placeholder="Наименование курса">{{old('title')}}</textarea>
              @if(!empty($errors->first('title')))
                <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>            
              @endif   
              <div class="card__information">
                <span class="card__price"><label for="price__value-full-time">Стоимость обучения:</label>
                  <span class="price__value"><input value="{{old('price')}}" type="number" id="price__value-full-time" style="width: 63px" name="price"/>
                    ₽</span></span>
                    @if(!empty($errors->first('price')))
                      <div class="invalid-feedback d-block">{{$errors->first('price')}}</div>            
                    @endif  
                <span class="duration-of-training"><label for="duration-of-training-inp">Срок обучения:</label>
                  <span class="duration__value"><input value="{{old('period')}}" id="duration-of-training-inp" type="text"
                      style="width: 120px; margin-top: 5px" name="period"/>
                  </span></span>
                  @if(!empty($errors->first('period')))
                    <div class="invalid-feedback d-block">{{$errors->first('period')}}</div>            
                  @endif  
              </div>

              <label for="documentfiz" style="font-size: 11px; padding: 2px 10px">Прикрепите заявление для заполнения
                пользователем в формате PDF</label>
                <input type="file" accept=".pdf" name="doc[natural]" id="documentfiz" class="form-control-file" required>
              @if(!empty($errors->first('doc.*.natural')))
                <div class="invalid-feedback d-block">{{$errors->first('doc.*.natural')}}</div>            
              @endif            
              <button class="save-course">
                применить и продолжить
              </button>
            </div>

            <!--  -->

            <div class="more-detailed__description">
              <div class="description">
                <h2 class="more-detailed__description__header">ОБ ЭТОМ КУРСЕ</h2>
                <div class="container-cle">
                  <script>
                    $(document).ready(function () { $("#input").cleditor(); });
                  </script>
                  <textarea class="in-detailed-create" name="descr" id="input">
                    {{old('descr')}}
                  </textarea>
                  @if(!empty($errors->first('descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('descr')}}</div>            
                  @endif  
                </div>
              </div>
            </div>
          </div>
          <label name="hidden" for="hide-course" style="color:rgb(3, 3, 158); margin-bottom: 20px;"><strong>Скрыть курс</strong>
            <input id="hide-course" type="checkbox"></label>
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