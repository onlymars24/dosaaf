@extends('admin.layout')
@section('title', 'Редактировать тест')
@section('h1', 'Редактировать тест')
@section('href', route('admin.edit.modules', ['id' => $module->course->id]))
@section('content')
      <div class="training-header">
        <h4>
        {{$module->course->title}}
        </h4>
      </div>
      <form class="form-test" id="FormTest" action="{{route('admin.edit.module.test.handler', ['id' => $module->id])}}"
        onsubmit="return confirm('Вы действительно хотите сохранить изменения?');" enctype="multipart/form-data" method="POST">
        @csrf
        <ul class="admin-all-test">
            @php
            $i = 0;
            @endphp
            @if(!empty($arr))
            @foreach($arr['questions'] as $el)
            <li class="test-item"><input type="text" class="inputTxt form-control" id="QuestionRec"
                placeholder="Введите вопрос" value="{{$arr['questions'][$i]}}" name="question[]"  />
              <div class="test-img-question test-img-question-create">
                @if(!empty($arr['images'][$i]))
                <input type="file" name="photo[]" class="form-control-file img-create-course" style="display: none;"><div class="downloaded-file"> <a href="{{route('admin.delete.test.handler', ['id' => $module->id, 'alias' => $module->alias, 'key' => $i])}}" class="del-module del-but black-but">✖</a> <div class="test-img-question" style="background-image: url('/{{$arr['images'][$i]}}');"></div></div>
                @else
                <input type="file" id="imgRec" name="photo[]"/>
                @endif
              </div>
              <div>
                <strong>1 </strong><input type="text" class="inputTxt form-control" id="0"
                  placeholder="Введите вариант ответа"  name="answer1[]" value="{{isset($arr['answersSets'][$i][0]) ? $arr['answersSets'][$i][0] : ''}}"/>
              </div>
              <div>
                <strong>2 </strong><input type="text" class="inputTxt form-control" id="1"
                  placeholder="Введите вариант ответа"  name="answer2[]" value="{{isset($arr['answersSets'][$i][1]) ? $arr['answersSets'][$i][1] : ''}}"/>
              </div>
              <div>
                <strong>3 </strong><input type="text" class="inputTxt form-control" id="2"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" name="answer3[]" value="{{isset($arr['answersSets'][$i][2]) ? $arr['answersSets'][$i][2] : ''}}"/>
              </div>
              <div>
                <strong>4 </strong><input type="text" class="inputTxt form-control" id="3"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" name="answer4[]" value="{{isset($arr['answersSets'][$i][3]) ? $arr['answersSets'][$i][3] : ''}}"/>
              </div>
              <div>
                <strong>5 </strong><input type="text" class="inputTxt form-control" id="4"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" name="answer5[]" value="{{isset($arr['answersSets'][$i][4]) ? $arr['answersSets'][$i][4] : ''}}"/>
              </div>
              <div>
                <strong>6 </strong><input type="text" class="inputTxt form-control" id="5"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" name="answer6[]" value="{{isset($arr['answersSets'][$i][5]) ? $arr['answersSets'][$i][5] : ''}}"/>
              </div>
              <strong>Номер правильного ответа</strong>
              <input type="text" name="correct[]" class="inputTxt form-control" id="RightAnswerRec" style="max-width: 40px" 
                maxlength="1" value="{{$arr['correctAnswers'][$i] + 1}}"/>
            </li>
            @php
              $i++;
            @endphp
            @endforeach
            @else
            <li class="test-item"><input type="text" class="inputTxt form-control" name="question[]" id="QuestionRec"
                placeholder="Введите вопрос" required />
              <div class="test-img-question test-img-question-create">
                <input type="file" id="imgRec" name="photo[]"/>
              </div>
              <div>
                <strong>1 </strong><input type="text" name="answer1[]" class="inputTxt form-control" id="0"
                  placeholder="Введите вариант ответа" required />
              </div>
              <div>
                <strong>2 </strong><input type="text" name="answer2[]" class="inputTxt form-control" id="1"
                  placeholder="Введите вариант ответа" required />
              </div>
              <div>
                <strong>3 </strong><input type="text" name="answer3[]" class="inputTxt form-control" id="2"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>4 </strong><input type="text" name="answer4[]" class="inputTxt form-control" id="3"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>5 </strong><input type="text" name="answer5[]" class="inputTxt form-control" id="4"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>6 </strong><input type="text" name="answer6[]" class="inputTxt form-control" id="5"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <strong>Номер правильного ответа</strong>
              <input type="text" name="correct[]" class="inputTxt form-control" id="RightAnswerRec" style="max-width: 40px" required
                maxlength="1" />
            </li>
            @endif 
        </ul>
          <template id="test-create-item">
            <li class="test-item"><input type="text" class="inputTxt form-control" name="question[]" id="QuestionRec"
                placeholder="Введите вопрос" required />
              <div class="test-img-question test-img-question-create">
                <input type="file" id="imgRec" name="photo[]"/>
              </div>
              <div>
                <strong>1 </strong><input type="text" name="answer1[]" class="inputTxt form-control" id="0"
                  placeholder="Введите вариант ответа" required />
              </div>
              <div>
                <strong>2 </strong><input type="text" name="answer2[]" class="inputTxt form-control" id="1"
                  placeholder="Введите вариант ответа" required />
              </div>
              <div>
                <strong>3 </strong><input type="text" name="answer3[]" class="inputTxt form-control" id="2"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>4 </strong><input type="text" name="answer4[]" class="inputTxt form-control" id="3"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>5 </strong><input type="text" name="answer5[]" class="inputTxt form-control" id="4"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <div>
                <strong>6 </strong><input type="text" name="answer6[]" class="inputTxt form-control" id="5"
                  placeholder="Оставьте поле пустым если вариантов ответа меньше" />
              </div>
              <strong>Номер правильного ответа</strong>
              <input type="text" name="correct[]" class="inputTxt form-control" id="RightAnswerRec" style="max-width: 40px" required
                maxlength="1" />
            </li>
          </template>
        <button class="btn-test-save button-center btn btn-primary">Сохранить</button>
      </form>
      <div class="button-center btn btn-primary" id="buttonTest">
        Следующий вопрос
      </div>
      <div class="delElem button-center  btn btn-primary">Удалить последний</div>
  <script>
    let createTestItem = document.querySelector("#test-create-item")
    let allTestitem = document.querySelector(".admin-all-test")
    let num = 0
    let delElem = document.querySelector(".delElem")
    let addTestItem = document.querySelector("#buttonTest")
    addTestItem.addEventListener("click", Addtest)
    function Addtest() {
      let testClone = createTestItem.content.cloneNode(true)
      let testCloneid = testClone.querySelector(".test-item")
      testCloneid.setAttribute('id', num++)
      allTestitem.appendChild(testClone)

    }
    function del() {
      let delItem = document.querySelectorAll(".test-item")
      delItem[delItem.length - 1].remove()

    }
    delElem.addEventListener("click", del)
  </script>
@endsection