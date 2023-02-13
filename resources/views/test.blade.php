@extends('layout')
@section('title', 'Тестирование')
@section('h1', 'Тестирование')
@section('href', route('training', ['id' => $course->id]))
@section('content')
        <div class="container">
          <div class="training-header">
            <h3>
              {{$course->title}}
            </h3>
          </div>
          <div class="test-item">
            <h5 id="test-result"></h5>
            <div class="result-img"></div>

            <div id="hide">
              <div class="test-img-question"></div>
              <h3 class="Question" id="testQuestion"></h3>
              <form class="form-test" id="FormTest" action="">
                <input
                  class="response-options"
                  type="radio"
                  id="0"
                  name="answer"
                />
                <label class="test__label" for="0"></label>

                <input
                  class="response-options"
                  type="radio"
                  id="1"
                  name="answer"
                />
                <label class="test__label" for="1"></label>

                <input
                  class="response-options"
                  type="radio"
                  id="2"
                  name="answer"
                />
                <label class="test__label" for="2"></label>

                <input
                  class="response-options"
                  type="radio"
                  id="3"
                  name="answer"
                />
                <label class="test__label" for="3"></label>

                <input
                  class="response-options"
                  type="radio"
                  id="4"
                  name="answer"
                />
                <label class="test__label" for="4"></label>

                <input
                  class="response-options"
                  type="radio"
                  id="5"
                  name="answer"
                />
                <label class="test__label" for="5"></label>
              </form>
              <button class="buttonTest btn btn-primary" id="buttonTest">
                Следующий вопрос
              </button>
            </div>
            <div class="test-end__but-all">
              <button
                class="end-of-the-test btn btn-primary"
                id="through-again"
              >
                Повторить попытку
              </button>
              <a
                href="{{route('training', ['id' => $course->id])}}"
                class="end-of-the-test btn btn-primary"
                id="go-module"
                >Вернуться к модулям</a
              >
            </div>
          </div>
          <script>
const _0x5691=['info','location','return\x20/\x22\x20+\x20this\x20+\x20\x22/','150px','checked','.response-options','warn','stringify','exception','?module_alias=','addEventListener','1132729AaeGsg','split','213VonTEh','length','querySelector','3fpgkGb','\x20<br><strong>\x20тест\x20не\x20пройден</strong>','752998uWWovJ','.test__label','application/json;charset=utf-8','pathname','{}.constructor(\x22return\x20this\x22)(\x20)','then','#test-result','/api/modules/','65582HgbcNJ','block','none','973221lxarwg','bind','__proto__','1813naRkrj','innerHTML','marginTop','.buttonTest','prototype','#through-again','reload','constructor','289937bTkERZ','url(/','toString','1Feiihd','.test-end__but-all','return\x20(function()\x20','style','trace','GET','click','apply','^([^\x20]+(\x20+[^\x20]+)+)+[^\x20]}','error','querySelectorAll','log','display','/api/progress/','json','&progress_id=','backgroundImage','.result-img','Правильных\x20ответов\x20','console','336659rHYkZk','5XEzEsT','test'];const _0x5586=function(_0x3387ac,_0x2f5ae5){_0x3387ac=_0x3387ac-0x1d3;let _0xc3272a=_0x5691[_0x3387ac];return _0xc3272a;};const _0x480c4d=_0x5586;(function(_0x3eed48,_0x26e4ec){const _0x109dfd=_0x5586;while(!![]){try{const _0x39313c=parseInt(_0x109dfd(0x1de))+parseInt(_0x109dfd(0x1e9))+parseInt(_0x109dfd(0x1ec))*parseInt(_0x109dfd(0x1d9))+-parseInt(_0x109dfd(0x1f7))*-parseInt(_0x109dfd(0x1f4))+-parseInt(_0x109dfd(0x20c))*-parseInt(_0x109dfd(0x1e6))+parseInt(_0x109dfd(0x1dc))*-parseInt(_0x109dfd(0x20b))+-parseInt(_0x109dfd(0x1d7));if(_0x39313c===_0x26e4ec)break;else _0x3eed48['push'](_0x3eed48['shift']());}catch(_0x396210){_0x3eed48['push'](_0x3eed48['shift']());}}}(_0x5691,0x8f709));async function m_g(_0x24056b,_0x82fe77,_0x522a94,_0x56b4c5){const _0x546f16=_0x5586,_0x355b03=function(){let _0x118e9d=!![];return function(_0x1869fb,_0xbb30e1){const _0x5545af=_0x118e9d?function(){const _0x395ccf=_0x5586;if(_0xbb30e1){const _0x531d6a=_0xbb30e1[_0x395ccf(0x1fe)](_0x1869fb,arguments);return _0xbb30e1=null,_0x531d6a;}}:function(){};return _0x118e9d=![],_0x5545af;};}(),_0x157194=_0x355b03(this,function(){const _0x2401f9=function(){const _0x17ff57=_0x5586,_0x36295c=_0x2401f9['constructor'](_0x17ff57(0x210))()[_0x17ff57(0x1f3)](_0x17ff57(0x1ff));return!_0x36295c[_0x17ff57(0x20d)](_0x157194);};return _0x2401f9();});_0x157194();const _0x1c9efd=function(){let _0x526fe6=!![];return function(_0x558256,_0x47f525){const _0x762947=_0x526fe6?function(){const _0x449e0a=_0x5586;if(_0x47f525){const _0x557353=_0x47f525[_0x449e0a(0x1fe)](_0x558256,arguments);return _0x47f525=null,_0x557353;}}:function(){};return _0x526fe6=![],_0x762947;};}(),_0x353d37=_0x1c9efd(this,function(){const _0x252f01=_0x5586;let _0x3c47c5;try{const _0x1c7e4c=Function(_0x252f01(0x1f9)+_0x252f01(0x1e2)+');');_0x3c47c5=_0x1c7e4c();}catch(_0x179783){_0x3c47c5=window;}const _0x563580=_0x3c47c5['console']=_0x3c47c5[_0x252f01(0x20a)]||{},_0x416548=[_0x252f01(0x202),_0x252f01(0x214),_0x252f01(0x20e),_0x252f01(0x200),_0x252f01(0x1d4),'table',_0x252f01(0x1fb)];for(let _0x1ac090=0x0;_0x1ac090<_0x416548[_0x252f01(0x1da)];_0x1ac090++){const _0x27fdeb=_0x1c9efd[_0x252f01(0x1f3)][_0x252f01(0x1f0)][_0x252f01(0x1ea)](_0x1c9efd),_0x4d8e30=_0x416548[_0x1ac090],_0x528d96=_0x563580[_0x4d8e30]||_0x27fdeb;_0x27fdeb[_0x252f01(0x1eb)]=_0x1c9efd[_0x252f01(0x1ea)](_0x1c9efd),_0x27fdeb['toString']=_0x528d96[_0x252f01(0x1f6)][_0x252f01(0x1ea)](_0x528d96),_0x563580[_0x4d8e30]=_0x27fdeb;}});_0x353d37();let _0x5b2488=await fetch(_0x546f16(0x1e5)+_0x24056b+_0x546f16(0x1d5)+_0x82fe77+_0x546f16(0x206)+_0x522a94+'&progress_alias='+_0x56b4c5,{'method':_0x546f16(0x1fc)}),_0x553f08=await _0x5b2488[_0x546f16(0x205)]();return _0x553f08;}async function p_u(_0x10ed69,_0x16f899,_0x39d19e,_0x1a8ce7){const _0x54552e=_0x5586;let _0x4accc8={'progress_alias':_0x39d19e,'top':_0x1a8ce7,'module_id':_0x10ed69},_0x72b1ea=await fetch(_0x54552e(0x204)+_0x16f899,{'method':'PUT','headers':{'Content-Type':_0x54552e(0x1e0)},'body':JSON[_0x54552e(0x1d3)](_0x4accc8)});}let test=window[_0x480c4d(0x20f)][_0x480c4d(0x1e1)],lecturesArrUrl=test[_0x480c4d(0x1d8)]('/');module_id=lecturesArrUrl[0x3],module_alias=lecturesArrUrl[0x4],progress_id=lecturesArrUrl[0x5],progress_alias=lecturesArrUrl[0x6],m_g(module_id,module_alias,progress_id,progress_alias)[_0x480c4d(0x1e3)](function(_0x1ef1be){const _0x3f4110=_0x480c4d;console[_0x3f4110(0x202)](_0x1ef1be);let _0x32b2dd=_0x1ef1be[0x1],_0x50efc9=0x0,_0x42cd85=0x1,_0x163d6f=0x2,_0xa01639=0x0,_0xaffa1f=0x0,_0x29fc46=0x3,_0x4881b8=document[_0x3f4110(0x1db)]('.test-img-question')[_0x3f4110(0x1fa)],_0x54c79e=document['querySelector'](_0x3f4110(0x1f1)),_0x33b070=document[_0x3f4110(0x1db)]('#go-module'),_0x4c7172=document['querySelectorAll'](_0x3f4110(0x213)),_0x520b61=document[_0x3f4110(0x1db)](_0x3f4110(0x1ef)),_0x288c42=document[_0x3f4110(0x201)](_0x3f4110(0x1df)),_0x2925d6=document[_0x3f4110(0x1db)](_0x3f4110(0x1e4)),_0x262d50=document[_0x3f4110(0x1db)](_0x3f4110(0x208)),_0x56265e=0x0,_0x21a6d2=_0x1ef1be[0x2],_0x50c318=_0x1ef1be[0x0];function _0x43477c(){const _0x576e7e=_0x3f4110;if(_0x32b2dd[_0x29fc46][_0xa01639]!=null)_0x4881b8[_0x576e7e(0x207)]=_0x576e7e(0x1f5)+_0x32b2dd[_0x29fc46][_0xa01639]+')',_0x4881b8['display']='block';else _0x4881b8[_0x576e7e(0x203)]=_0x576e7e(0x1e8);}function _0x175434(){const _0x47d92a=_0x3f4110;_0x43477c(),document[_0x47d92a(0x1db)]('#testQuestion')[_0x47d92a(0x1ed)]=_0x32b2dd[_0x50efc9][_0xa01639],_0x54c79e[_0x47d92a(0x1fa)][_0x47d92a(0x203)]='none';for(let _0x1b92bc=0x0;_0x1b92bc<_0x4c7172['length'];_0x1b92bc++){_0x288c42[_0x1b92bc][_0x47d92a(0x1fa)]['display']=_0x47d92a(0x1e7);}switch(_0x32b2dd[_0x42cd85][_0xa01639][_0x47d92a(0x1da)]){case 0x2:{for(let _0x3ed780=0x5;_0x3ed780>0x1;_0x3ed780--){_0x288c42[_0x3ed780][_0x47d92a(0x1fa)][_0x47d92a(0x203)]=_0x47d92a(0x1e8);}}case 0x3:{for(let _0x20f313=0x5;_0x20f313>0x2;_0x20f313--){_0x288c42[_0x20f313][_0x47d92a(0x1fa)]['display']='none';}}case 0x4:{for(let _0x4b53f3=0x5;_0x4b53f3>0x3;_0x4b53f3--){_0x288c42[_0x4b53f3][_0x47d92a(0x1fa)][_0x47d92a(0x203)]=_0x47d92a(0x1e8);}}case 0x5:{for(let _0x2bc418=0x5;_0x2bc418>0x4;_0x2bc418--){_0x288c42[_0x2bc418][_0x47d92a(0x1fa)]['display']=_0x47d92a(0x1e8);}}}for(let _0x28bf0a=0x0;_0x28bf0a<_0x32b2dd[_0x42cd85][_0xa01639][_0x47d92a(0x1da)];_0x28bf0a++){_0x288c42[_0x28bf0a]['innerHTML']=_0x32b2dd[_0x42cd85][_0xa01639][_0x28bf0a];}}_0x175434();function _0x3ac056(){const _0x3cfb3e=_0x3f4110;for(let _0x3077b3=0x0;_0x3077b3<_0x32b2dd[_0x42cd85][_0xa01639][_0x3cfb3e(0x1da)];_0x3077b3++){if(_0x4c7172[_0x3077b3][_0x3cfb3e(0x212)]==!![])_0x4c7172[_0x3077b3]['id']==_0x32b2dd[_0x163d6f][_0xa01639]&&_0xaffa1f++,_0x4c7172[_0x3077b3][_0x3cfb3e(0x212)]=![],_0x56265e++;else continue;}_0xa01639=_0x56265e;if(_0xa01639==_0x32b2dd[_0x50efc9]['length']){document[_0x3cfb3e(0x1db)]('#hide')[_0x3cfb3e(0x1fa)]['display']='none',_0x2925d6[_0x3cfb3e(0x1fa)][_0x3cfb3e(0x203)]='block';_0xaffa1f/_0x32b2dd[_0x50efc9][_0x3cfb3e(0x1da)]>=_0x50c318/0x64?(_0x2925d6['innerHTML']='Правильных\x20ответов\x20'+_0xaffa1f+'\x20из\x20'+_0x32b2dd[_0x50efc9][_0x3cfb3e(0x1da)]+'\x20<br><strong>\x20тест\x20пройден</strong>',_0x262d50[_0x3cfb3e(0x1fa)]['display']=_0x3cfb3e(0x1e7),_0x33b070[_0x3cfb3e(0x1fa)]['display']='block'):(document['querySelector'](_0x3cfb3e(0x1e4))[_0x3cfb3e(0x1ed)]=_0x3cfb3e(0x209)+_0xaffa1f+'\x20из\x20'+_0x32b2dd[_0x50efc9][_0x3cfb3e(0x1da)]+_0x3cfb3e(0x1dd),_0x54c79e['style'][_0x3cfb3e(0x203)]=_0x3cfb3e(0x1e7),document[_0x3cfb3e(0x1db)](_0x3cfb3e(0x1f8))[_0x3cfb3e(0x1fa)][_0x3cfb3e(0x1ee)]=_0x3cfb3e(0x211));_0xaffa1f>_0x21a6d2&&p_u(module_id,progress_id,progress_alias,_0xaffa1f);return;}_0x175434();}function _0x1bf40b(){const _0x16d83c=_0x3f4110;location[_0x16d83c(0x1f2)]();}_0x54c79e[_0x3f4110(0x1d6)](_0x3f4110(0x1fd),_0x1bf40b),_0x520b61[_0x3f4110(0x1d6)](_0x3f4110(0x1fd),_0x3ac056);});
    </script>
</div>
@endsection