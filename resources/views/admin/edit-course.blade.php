@extends('admin.layout')
@section('title', 'Редактировать курс')
@section('h1', 'Редактировать курс')
@section('href', route('admin.catalog'))
@section('content')
      <form action="{{route('admin.edit.course.handler', ['id' => $course->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
          <div class="add-categories-and-type">
            <div class="row">
              <div class="col-6" id="selectCategoriesBlock">
                <label for="inputCategories" class="form-label">Выберите категорию курса</label>
                <select class="form-select " name="category[]" id="selectCategories" maxlength="60" required>
                  <option selected disabled value="">Выберите...</option>
                  @foreach($categories as $category)
                  <option {{$category->id == $course->category_id ? 'selected' : ''}} value="{{$category->name}}">{{$category->name}}</option>
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
                  <option {{$type->id == $course->type_id ? 'selected' : ''}} value="{{$type->name}}">{{$type->name}}</option>
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
              @if($course->avatar == 'kdfafsdkfjkljarasdf/default.png')
                <input type="file" name="avatar" class="form-control-file img-create-course" style="padding-left: 10px;">
                @if(!empty($errors->first('avatar')))
                  <div class="invalid-feedback d-block">{{$errors->first('avatar')}}</div>            
                @endif  
              @else
                <div class="downloaded-file"><a href="{{route('admin.delete.course.avatar.handler', ['id' => $course->id])}}" class="del-module del-but ">✖</a><div style="background-image: url(/{{$course->avatar}});" class="card__img"></div></div>
              @endif
              <textarea name="title" id="" cols="30" rows="10" placeholder="Наименование курса">{{$course->title}}</textarea>
              @if(!empty($errors->first('title')))
                <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>            
              @endif   
              <div class="card__information">
                <span class="card__price"><label for="price__value-full-time">Стоимость обучения:</label>
                  <span class="price__value"><input name="price" value="{{$course->price}}" type="number" id="price__value-full-time" style="width: 70px" />
                    ₽</span></span>
                    @if(!empty($errors->first('price')))
                      <div class="invalid-feedback d-block">{{$errors->first('price')}}</div>            
                    @endif  
                <span class="duration-of-training"><label for="duration-of-training-inp">Срок обучения:</label>
                  <span class="duration__value"><input name="period" id="duration-of-training-inp" type="text" value="{{$course->period}}"
                      style="width: 140px; margin-top: 5px" />
                  </span></span>
                  @if(!empty($errors->first('period')))
                    <div class="invalid-feedback d-block">{{$errors->first('period')}}</div>            
                  @endif  
              </div>
              @if(!empty($docs->natural))
                <div class="downloaded-file"><a href="{{route('admin.delete.course.doc.handler', ['id' => $course->id, 'status' => 'natural'])}}" class="del-module del-but black-but">✖</a><a href="/{{$docs->natural}}" class="documents-to-fill-out-link">Документ физ. лица</a></div>
              @else
                <label for="document" style="font-size: 11px; padding: 2px 10px">Прикрепите документ для заполнения
                пользователем
                <br />физ.</label>
                <input type="file" accept=".pdf" name="doc[natural]" class="document-inp" id="document"/>
              @endif

              @if(!empty($errors->first('doc.*')))
                <div class="invalid-feedback d-block">{{$errors->first('doc.*')}}</div>            
              @endif  

              <label for="hide-course" style="color:rgb(3, 3, 158); margin-bottom: 20px; margin-left: 12px; margin-top: 7px;"><strong>Скрыть курс</strong>
              <input name="hidden" id="hide-course" type="checkbox" {{ $course->hidden ? 'checked' : ''}}></label>              
              <button class="save-course" style="margin-top: 10px;">
                применить и продолжить
              </button>
            </div>

            <!--  -->

            <div class="more-detailed__description">
              <div class="description">
                <h2 class="more-detailed__description__header">ОБ ЭТОМ КУРСЕ</h2>
                <script>
                  $(document).ready(function () { $("#input").cleditor(); });
                </script>
                <div class="container-cle">
                  <textarea class="in-detailed-create" name="descr" id="input" cols="112" rows="21">{{$course->descr}}</textarea>
                  @if(!empty($errors->first('descr')))
                    <div class="invalid-feedback d-block">{{$errors->first('descr')}}</div>            
                  @endif  
                </div>
                

              </div>
            </div>

          </div>
      </form>
      <form id="formDel" action="{{route('admin.delete.course.handler', ['id' => $course->id])}}" method="POST" onsubmit="return confirm('Вы уверены что хотите удалить данный курс? ВСЕ МОДУЛИ, А ТАКЖЕ ДАННЫЕ ПРОГРЕССА ПРОХОЖДЕНИЯ КУРСА ПОЛЬЗОВАТЕЛЯМИ БУДУТ УДАЛЕНЫ!!!!');">
        @csrf
        <button id="del-course" class="btn btn-danger"><strong>Удалить курс</strong></button>
      </form>
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