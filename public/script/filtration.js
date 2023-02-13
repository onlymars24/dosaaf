let catLinks = document.querySelectorAll('.block-left__list-categories-all .block-left__list-item');
let typeLinks = document.querySelectorAll('.block-left__list-type-of-training .block-left__list-item');
let sortBtn = document.querySelector('.sort__it');
let activeClass = 'categories-active';

catLinks.forEach(function(link) {
    if(link.classList.contains(activeClass)){
        link.addEventListener('click', addBlackColorForCat);
    }
    else{
        link.addEventListener('click', addRedColorForCat);
    }
});
typeLinks.forEach(function(link) {
    if(link.classList.contains(activeClass)){
        link.addEventListener('click', addBlackColorForType);
    }
    else{
        link.addEventListener('click', addRedColorForType);
    }
});





function addRedColorForCat(){
    this.classList.add(activeClass);
    this.removeEventListener('click', addRedColorForCat);
    this.addEventListener('click', addBlackColorForCat);
    let thisLink = this;
    catLinks.forEach(function(link) {
        if(link.innerHTML != thisLink.innerHTML && link.classList.contains(activeClass)){
            link.classList.remove(activeClass);
            thisLink.removeEventListener('click', addBlackColorForCat);
            thisLink.addEventListener('click', addRedColorForCat);
        }
    });
    filtration();
}

function addRedColorForType(){
    this.classList.add(activeClass);
    this.removeEventListener('click', addRedColorForType);
    this.addEventListener('click', addBlackColorForType);
    let thisLink = this;
    typeLinks.forEach(function(link) {
        if(link.innerHTML != thisLink.innerHTML && link.classList.contains(activeClass)){
            link.classList.remove(activeClass);
            thisLink.removeEventListener('click', addBlackColorForType);
            thisLink.addEventListener('click', addBlackColorForType);
        }
    });
    filtration();
}

function addBlackColorForCat(){
    this.classList.remove(activeClass);
    this.removeEventListener('click', addBlackColorForCat);
    this.addEventListener('click', addRedColorForCat);
    filtration();
}

function addBlackColorForType(){
    this.classList.remove(activeClass);
    this.removeEventListener('click', addBlackColorForType);
    this.addEventListener('click', addRedColorForType);
    filtration();
}



function filtration(){

    let cat = document.querySelector('.block-left__list-categories-all .'+activeClass+' p');
    let type = document.querySelector('.block-left__list-type-of-training .'+activeClass+' p');

    console.log('.block-left__list-categories-all '+activeClass+' p');
    let urlGets = '';

    if(cat != null){
        urlGets += 'category='+cat.dataset.category;
    }

    if(type != null){
        if(cat != null){
            urlGets += '&';
        }
        urlGets += 'type='+type.dataset.type;
    }
    if(urlGets != ''){
        urlGets = '?' + urlGets;
    }
    
    if (history.pushState) {
        var baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        var newUrl = baseUrl + urlGets;
        history.pushState(null, null, newUrl);
        location.reload(true);
    }
    else {
        console.warn('History API не поддерживается');
    }
}