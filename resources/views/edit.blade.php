@extends('layout')
@section('title', 'Редактировать')
@section('h1', 'Редактировать')
@section('content')
@section('href', '/')
        <section class="content">
          <div class="container container-content">
            <div class="block-left">
              <aside
                class="block-left__personal-account-active block-left__all-aside"
              >
                <div class="personal-account-header headers-block-left">
                  Мой профиль
                </div>
                <nav class="account-active__links form-personal-account">
                  <div class="my-profile-all">
                    <a href="{{route('my.courses')}}">Мои курсы</a>
                  </div>
                  <div class="my-profile-all">
                    <a href="{{route('profile')}}">Моя учётная запись</a>
                  </div>
                  <div class="my-profile-all">
                    <a href="{{route('logout')}}">Выход</a>
                  </div>
                </nav>
              </aside>
            </div>
            <div class="container block-right">
    <div class="form-registration">
      <!--  -->
      <form class="row g-3 needs-validation" action="{{route('profile.edit.handler', 
      ['id' => $user->id])}}" autocomplete="on" method="POST">
        @csrf
        @if(!empty($flash))
          <div class="alert alert-success" role="alert">
            {{$flash}}
          </div>
        @endif

        <div class="col-md-4">
          <label for="inputName" class="form-label input-necessarily"
            >Имя</label
          >
          <input
            type="text"
            class="form-control {{!empty($errors->first('name')) ? 'is-invalid' : '' }}"
            name="name"
            id="inputName"
            placeholder="Иван"
            maxlength="60"
            value="{{!empty(old('name')) ? old('name') : $user->name }}"
          />
      @if(!empty($errors->first('name')))
      <div class="invalid-feedback d-block">  {{$errors->first('name')}}
      </div>            
      @endif

  

        </div>
        <div class="col-md-4">
          <label for="inputsurname" class="form-label">Фамилия</label>
          <input
            type="text"
            class="form-control {{!empty($errors->first('surname')) ? 'is-invalid' : '' }}"
            name="surname"
            id="inputsurname"
            placeholder="Петров"
            maxlength="60"
            value="{{!empty(old('surname')) ? old('surname') : $user->surname }}"
          />
      @if(!empty($errors->first('surname')))
      <div class="invalid-feedback d-block">{{$errors->first('surname')}}
      </div>            
      @endif
        </div>
        <div class="col-md-4">
          <label for="inputPatronymic" class="form-label"
            >Отчество</label
          >
          <input
            type="text"
            class="form-control"
            name="patronymic"
            id="inputPatronymic"
            placeholder="Александрович"
            maxlength="60"
            value="{{!empty(old('patronymic')) ? old('patronymic') : $user->patronymic }}"
          />
      @if(!empty($errors->first('patronymic')))
      <div class="invalid-feedback d-block">  {{$errors->first('patronymic')}}
      </div>            
      @endif
        </div>
        <div class="col-md-12">
          <label for="inputOrganization" class="form-label"
            >Организация</label
          >
          <div class="input-group has-validation">
            <input
              type="text"
              class="form-control"
              name="organization"
              id="inputOrganization"
              aria-describedby="inputGroupPrepend"
              placeholder="ООО 'Рога и Копыта'"
              maxlength="60"
              value="{{!empty(old('organization')) ? old('organization') : $user->organization }}"
            />
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputСity" class="form-label">Город</label>
          <input
            type="text"
            class="form-control {{!empty($errors->first('city')) ? 'is-invalid' : '' }}"
            name="city"
            id="inputCity"
            maxlength="60"
            placeholder="Москва"
            value="{{!empty(old('city')) ? old('city') : $user->city }}"
          />
      @if(!empty($errors->first('city')))
      <div class="invalid-feedback d-block">  {{$errors->first('city')}}
      </div>            
      @endif
        </div>
        <div class="col-md-3">
          <label for="inputRegion" class="form-label">Область</label>
          <select
            class="form-select {{!empty($errors->first('region')) ? 'is-invalid' : '' }}"
            name="region"
            id="inputRegion"
            maxlength="60"
            value="{{old('region')}}"
          >
          <option selected disabled value="">Выберите...</option>
            <option value="Алтайский край">Алтайский край</option>
            <option value="Амурская область">Амурская область</option>
            <option value="Архангельская область">
              Архангельская область
            </option>
            <option value="Астраханская область">
              Астраханская область
            </option>
            <option value="Белгородская область">
              Белгородская область
            </option>
            <option value="Брянская область">Брянская область</option>
            <option value="Владимирская область">
              Владимирская область
            </option>
            <option value="Волгоградская область'">
              Волгоградская область
            </option>
            <option value="Вологодская область">
              Вологодская область
            </option>
            <option value="Воронежская область">
              Воронежская область
            </option>
            <option value="Еврейская автономная область">
              Еврейская автономная область
            </option>
            <option value="Забайкальский край">
              Забайкальский край
            </option>
            <option value="Ивановская область">
              Ивановская область
            </option>
            <option value="Иркутская область">
              Иркутская область
            </option>
            <option value="Кабардино-Балкарская Республика">
              Кабардино-Балкарская Республика
            </option>
            <option value="Калининградская область">
              Калининградская область
            </option>
            <option value="Калужская область">
              Калужская область
            </option>
            <option value="Камчатский край">Камчатский край</option>
            <option value="Карачаево-Черкесская Республика">
              Карачаево-Черкесская Республика
            </option>
            <option value="Кемеровская область">
              Кемеровская область
            </option>
            <option value="Кировская область">
              Кировская область
            </option>
            <option value="Костромская область">
              Костромская область
            </option>
            <option value="Краснодарский край">
              Краснодарский край
            </option>
            <option value="Красноярский край">
              Красноярский край
            </option>
            <option value="Курганская область">
              Курганская область
            </option>
            <option value="Курская область">Курская область</option>
            <option value="Ленинградская область">
              Ленинградская область
            </option>
            <option value="Липецкая область">Липецкая область</option>
            <option value="Магаданская область">
              Магаданская область
            </option>
            <option value="Московская область">
              Московская область
            </option>
            <option value="Мурманская область">
              Мурманская область
            </option>
            <option value="Ненецкий автономный округ">Ненецкий автономный округ</option>
            <option value="Нижегородская область">
              Нижегородская область
            </option>
            <option value="Новгородская область">
              Новгородская область
            </option>
            <option value="Новосибирская область'">
              Новосибирская область
            </option>
            <option value="Омская область">Омская область</option>
            <option value="Оренбургская область">
              Оренбургская область
            </option>
            <option value="Орловская область">
              Орловская область
            </option>
            <option value="Пензенская область">
              Пензенская область
            </option>
            <option value="Пермский край">Пермский край</option>
            <option value="Приморский край">Приморский край</option>
            <option value="Псковская область">
              Псковская область
            </option>
            <option value="Республика Адыгея">
              Республика Адыгея
            </option>
            <option value="Республика Алтай">Республика Алтай</option>
            <option value="Республика Башкортостан">
              Республика Башкортостан
            </option>
            <option value="Республика Бурятия">
              Республика Бурятия
            </option>
            <option value="Республика Дагестан">
              Республика Дагестан
            </option>
            <option value="Республика Ингушетия">
              Республика Ингушетия
            </option>
            <option value="Республика Калмыкия">
              Республика Калмыкия
            </option>
            <option value="Республика Карелия">
              Республика Карелия
            </option>
            <option value="Республика Коми">Республика Коми</option>
            <option value="Республика Крым">Республика Крым</option>
            <option value="Республика Марий Эл">
              Республика Марий Эл
            </option>
            <option value="Республика Мордовия">
              Республика Мордовия
            </option>
            <option value="Республика Саха (Якутия)">
              Республика Саха (Якутия)
            </option>
            <option value="Республика Северная Осетия-Алания">
              Республика Северная Осетия-Алания
            </option>
            <option value="Республика Татарстан">
              Республика Татарстан
            </option>
            <option value="Республика Тыва">Республика Тыва</option>
            <option value="Республика Удмуртия">
              Республика Удмуртия
            </option>
            <option value="Республика Хакасия">
              Республика Хакасия
            </option>
            <option value="Ростовская область">
              Ростовская область
            </option>
            <option value="Рязанская область">
              Рязанская область
            </option>
            <option value="Самарская область">
              Самарская область
            </option>
            <option value="Саратовская область">
              Саратовская область
            </option>
            <option value="Сахалинская область">
              Сахалинская область
            </option>
            <option value="Свердловская область">
              Свердловская область
            </option>
            <option value="Смоленская область'">
              Смоленская область
            </option>
            <option value="Ставропольский край">
              Ставропольский край
            </option>
            <option value="Тамбовская область">
              Тамбовская область
            </option>
            <option value="Тверская область">Тверская область</option>
            <option value="Томская область">Томская область</option>
            <option value="Тульская область">Тульская область</option>
            <option value="Тюменская область">
              Тюменская область
            </option>
            <option value="Ульяновская область">
              Ульяновская область
            </option>
            <option value="Хабаровский край">Хабаровский край</option>
            <option value="Ханты-Мансийский автономный округ">
              Ханты-Мансийский автономный округ
            </option>
            <option value="Челябинская область">
              Челябинская область
            </option>
            <option value="Чеченская Республика">
              Чеченская Республика
            </option>
            <option value="Чувашская Республика">Чувашская Республика</option>
            <option value="Чукотский автономный округ">
              Чукотский автономный округ
            </option>
            <option value="Ямало-Ненецкий автономный округ">
              Ямало-Ненецкий автономный округ
            </option>
            <option value="Ярославская область">
              Ярославская область
            </option>
          </select>
      @if(!empty($errors->first('region')))
      <div class="invalid-feedback d-block">  {{$errors->first('region')}}
      </div>            
      @endif
        </div>
        <div class="col-md-3">
          <label for="postalCode" class="form-label">Индекс</label>
          <input
            type="text"
            class="form-control {{!empty($errors->first('postcode')) ? 'is-invalid' : '' }}"
            name="postcode"
            id="postalCode"
            maxlength="20"
            value="{{!empty(old('postcode')) ? old('postcode') : $user->postcode }}"
          />
      @if(!empty($errors->first('postcode')))
      <div class="invalid-feedback d-block"> {{$errors->first('postcode')}}
      </div>            
      @endif
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Адрес</label>
          <input
            type="text"
            class="form-control {{!empty($errors->first('address')) ? 'is-invalid' : '' }}"
            name="address"
            id="inputAddress"
            placeholder="ул. Красная, д.1 к.3, кв.1"
            value="{{!empty(old('address')) ? old('address') : $user->address }}"
          />
        </div>
      @if(!empty($errors->first('address')))
      <div class="invalid-feedback d-block"> {{$errors->first('address')}}
      </div>            
      @endif
        <div class="col-md-12">
          <label for="inputTel" class="form-label">Телефон</label>
          <div class="input-group has-validation">
            <input
              type="tel"
              class="form-control tel {{!empty($errors->first('phone')) ? 'is-invalid' : '' }}"
              name="phone"
              id="inputTel"
              placeholder="+7 (999) 999 9999"
              value="{{!empty(old('phone')) ? old('phone') : $user->phone }}"
            />
          @if(!empty($errors->first('phone')))
          <div class="invalid-feedback d-block"> {{$errors->first('phone')}}
          </div>            
          @endif
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">
            Сохранить
          </button>
        </div>
      </form>
    </div>
            </div>
          </div>
        </section>
@endsection