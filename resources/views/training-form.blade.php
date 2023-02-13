@extends('layout')
@section('title', 'Курс')
@section('h1', 'Курс')
@section('href', route('my.courses'))
@section('content')
<section class="traning-content">
  <div class="container">
    <div class="training-header">
      <h4>
        {{$progress->course->title}}
      </h4>
    </div>
    <h5 style="text-align: center">
      Для того, чтобы начать обучение необходимо отправить заявление заявление
    </h5>
    <div class="content-document">
      <div class="documents-to-fill-out">
        <a href="/{{$docs->natural}}" class="documents-to-fill-out-link">Шаблон заявления</a>
      </div>
      <div class="block-ready-documents">
        <p style="text-align: center">
          Прикрепите заполненное заявление и указанные в нём докуметы В ФОРМАТЕ PDF
        </p>
        <form method="POST" action="{{route('training.form.handler', ['id' => $progress->id])}}" class="Form-ready-Documents" enctype="multipart/form-data">
          @csrf
          @if(!empty($errors->first('doc.*')))
          <div class="invalid-feedback d-block">{{$errors->first('doc.*')}}
          </div>            
          @endif
          @if(!empty($errors->first('doc')))
          <div class="invalid-feedback d-block">{{$errors->first('doc')}}
          </div>            
          @endif
          <ul class="list-documents-add">
          </ul>
          <div class="add-module-select">+</div>
          <button class="btn btn-primary btn-to-send">Отправить</button>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
      let readyDocuments = document.querySelector(".ready-Documents");
     
      function addInput() {
        let liItem = document.createElement("li");
      liItem.classList.add("list-documents-item");
      liItem.innerHTML='<input name="doc[]" type="file" accept=".pdf" class="ready-Documents">'
        document.querySelector(".list-documents-add").append(liItem);
      
      }
      addInput();
      document
        .querySelector(".add-module-select")
        .addEventListener("click", addInput);
    </script>
  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
  
	// ]]>
</script>
@endsection