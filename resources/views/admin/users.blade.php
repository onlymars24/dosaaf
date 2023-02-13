@extends('admin.layout')
@section('title', 'Пользователи')
@section('h1', 'Пользователи')
@section('content')
      <div class="search-block">
        <input type="text" class="form-control search" name="name" id="inputName" maxlength="120" />
      </div>
      <ul class="admin-all-user">
        <!--  -->
        @foreach($users as $user)
        <li class="user-item"><a href="{{route('admin.user', ['id' => $user['id']])}}" class="user-item-link">
            <span class="user-name">{{$user['SNP']}}
            </span>
            <div class="col-by-courses">куплено курсов <span>{{$user['amount']}}</span></div>
            <div class="date-of-registration">
              Дата регистрации <span>{{$user['date']}}</span>
            </div>
          </a></li>
          @endforeach
        <!--  -->
      </ul>
  <script>
    document.querySelector('.exit').style.display = 'none';
    let userItem = document.querySelectorAll(".user-item")
    let sortUser = document.querySelector(".form-control")
    let userName = document.querySelectorAll(".user-name")
    function sortUserName() {
      for (let i = 0; i < userName.length; i++) {
        console.log(sortUser.value.toLocaleLowerCase())
        if ((userName[i].innerHTML.toLocaleLowerCase()).includes(sortUser.value.toLocaleLowerCase())) {
          userItem[i].style.display = "block";
        } else {
          userItem[i].style.display = "none";
        }
      }

    }
    sortUser.addEventListener("input", sortUserName);
  </script>      
@endsection