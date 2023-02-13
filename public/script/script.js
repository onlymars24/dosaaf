window.addEventListener("DOMContentLoaded", function () {

  //Маска

  [].forEach.call(document.querySelectorAll(".tel"), function (input) {
    var keyCode;
    function mask(event) {
      event.keyCode && (keyCode = event.keyCode);
      var pos = this.selectionStart;
      if (pos < 3) event.preventDefault();
      var matrix = "+7 (___) ___ ____",
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, ""),
        new_value = matrix.replace(/[_\d]/g, function (a) {
          return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
        });
      i = new_value.indexOf("_");
      if (i != -1) {
        i < 5 && (i = 3);
        new_value = new_value.slice(0, i);
      }
      var reg = matrix
        .substr(0, this.value.length)
        .replace(/_+/g, function (a) {
          return "\\d{1," + a.length + "}";
        })
        .replace(/[+()]/g, "\\$&");
      reg = new RegExp("^" + reg + "$");
      if (
        !reg.test(this.value) ||
        this.value.length < 5 ||
        (keyCode > 47 && keyCode < 58)
      )
        this.value = new_value;
      if (event.type == "blur" && this.value.length < 5) this.value = "";
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false);
  });



  //выезжающая менюшка для смартов

  let myAccount = document.querySelector(".my-account-phone-but")
  let account = document.querySelector(".drop-down-list")
  let closeMenuAccount = document.querySelector(".backgraund-close-active")

  account.style.height = '0px'
  function MyAccountNav() {
    if (account.style.height == '0px') {
      account.style.height = '200px';


      closeMenuAccount.style.display = 'block'
    }
    else {
      account.style.height = '0px';

      closeMenuAccount.style.display = 'none'
    }


  }

  myAccount.addEventListener("click", MyAccountNav)
  closeMenuAccount.addEventListener('click', MyAccountNav)
  // 
  if(document.querySelector("#categories")!=null)
  {
  function BodyNoScroll() {
    if (document.querySelector("#categories").checked | document.querySelector("#type-of-training").checked == true) {
      document.querySelector("body").style.overflow = "hidden"
      document.querySelector("body").style.height = "100%"
    }
    else {
      document.querySelector("body").style.overflow = "auto"
      document.querySelector("body").style.height = "auto"
    }
  }

     document.querySelector("#categories").addEventListener("input", BodyNoScroll)
  document.querySelector("#type-of-training").addEventListener("input", BodyNoScroll)
  }
  else{
    return
  }
 

  //
  function AroweNone() {

    if (document.querySelector(".pages-item-active").textContent == 1) {
      document.querySelectorAll(".pages-item-arrow")[0].style.display = "none"
    }
    else if (document.querySelector(".pages-item-active").textContent == document.querySelectorAll(".pages-item").length) {
      document.querySelectorAll(".pages-item-arrow")[1].style.display = "none"
    }

  }
  document.addEventListener("DOMContentLoaded", AroweNone)
  AroweNone()

});
