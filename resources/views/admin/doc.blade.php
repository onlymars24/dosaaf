@extends('admin.layout')
@section('title', 'Документы')
@section('h1', 'Документы')
@section('href', route('admin.docs'))
@section('content')
      <div class="confirm-access">
        <span class="mail-user-name"><strong>{{$progress->user->surname}} {{$progress->user->name}} {{$progress->user->patronymic}}</strong>
        </span>
        <div class="text-message-open">
          <div class="container">

            <div class="lecture-all">
              <div class="lecture-item">
                <iframe class="lecture-pdf frame" src="" allowfullscreen webkitallowfullscreen>Браузер не поддержывает
                  iframe
                </iframe>
              </div>
              <div class="block-pdf-reserv">
                Если файл не открывается, вы можете скачать его
                <a class="lecture-pdf-reserv" href="">перейдя по ссылке</a>
              </div>
                <div class="warning">Если заявление заполнено верно, то отправьте договор на почту {{$progress->user->email}}.<br> 
                Нажмите "Подтвердить" после получения на почту ПРАВИЛЬНО заполненного договора</div>
              <div class="block-switch">
                <button class="switch-btn btn btn-primary but" id="back">
                  <strong>Назад</strong>
                </button>
                <a href="/training.html" class="end-of-the-test btn btn-primary" id="go-module"
                  style="max-width: 30%">Вернуться к уведомлениям</a>
                <button class="switch-btn btn btn-primary but" id="next">
                  <strong>Вперёд</strong>
                </button>
              </div>
            </div>
          </div>

        </div>
        
        <div class="block-btn-yes-no block-switch">
          <form method="POST" action="{{route('admin.reject', ['id' => $progress->id])}}">
            @csrf
            <button class="switch-btn btn btn-primary but-no" id="back">
              <strong>Отказ</strong>
            </button>
          </form>
          <form onsubmit="return confirm('Нажимая ПОДТВЕДРИТЬ, вы подтверждаете правильность договора, отправленного на почту!!!!');" method="POST" action="{{route('admin.approve', ['id' => $progress->id])}}">
            @csrf
            <button class="switch-btn btn btn-primary" id="next">
              <strong>Подтвердить</strong>
            </button>
          </form>
        </div>
      </div>
    <script>
    async function d_g(id) {
      let response = await fetch('/api/docs/'+id, {
        method: 'GET'
      });
      let result = await response.json();
      return result;
    }
    let test = window.location.pathname;
    let lecturesArrUrl = test.split('/');
    //console.log(lecturesArrUrl);
    d_g(
      lecturesArrUrl[3]
    ).then(function(result){
    let massAlllecture = [];
    massAlllecture[0] = result;
      let steplecture = 0;
      let folder = "/ViewerJs/#../";
      let folderReserv = "/";
      let butNext = document.querySelector("#next");
      let butBack = document.querySelector("#back");

      document.querySelector(".lecture-pdf").src =
        folder + "" + massAlllecture[0][steplecture];
      document.querySelector(".lecture-pdf-reserv").href =
        folderReserv + "" + massAlllecture[0][steplecture];
      function Next() {
        if (steplecture == massAlllecture[0].length - 1) {
          return;
        }
        steplecture++;
        if (steplecture == massAlllecture[0].length - 1) {

          butNext.style.opacity = "0";
        }
        butBack.style.opacity = "1";
        document.querySelector(".lecture-pdf").src = "";
        setTimeout(() => {
          document.querySelector(".lecture-pdf").src =
            folder + "" + massAlllecture[0][steplecture];
        }, 500);
        console.log("вперёд" + massAlllecture[0][steplecture]);
        document.querySelector(".lecture-pdf-reserv").href =
          folderReserv + "" + massAlllecture[0][steplecture];
      }
      function Back() {
        if (steplecture == 0) {
          return;
        }
        steplecture--;
        if (steplecture == 0) {
          butBack.style.opacity = "0";
        }
        butNext.style.opacity = "1";
        document.querySelector(".lecture-pdf").src = "";
        setTimeout(() => {
          document.querySelector(".lecture-pdf").src =
            folder + "" + massAlllecture[0][steplecture];
        }, 500);
        document.querySelector(".lecture-pdf-reserv").href =
          folderReserv + "" + massAlllecture[0][steplecture];
        console.log("назад" + massAlllecture[0][steplecture]);
      }
      function Preload() {
        if(massAlllecture[0].length==1)
        {
          butBack.style.opacity = "0";
          butNext.style.opacity = "0";
        }
        else{
             if (steplecture == massAlllecture[0].length - 1) {
          goModule.style.display = "block";
          butNext.style.opacity = "0";
        }
        else {
          butNext.style.opacity = "1";
        }
        if (steplecture != 0) {
          butBack.style.opacity = "1";
        }
        else {
          butBack.style.opacity = "0";
        }
        }
      }
      Preload()
      butNext.addEventListener("click", Next);
      butBack.addEventListener("click", Back);      
    })
      
    </script>
@endsection