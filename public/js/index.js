window.onload = function(){

    let filter = document.querySelector('#dropdown');
    filter.onclick = function () {
        let dropdown = document.querySelector('.main__filter-dropdown');
        dropdown.classList.toggle('opening');
    }
    let country = document.querySelector('#country');
    // country.onclick = function () {
    //     let dropdown = document.querySelector('.main__filter-dropdown');
    //     dropdown.classList.toggle('opening');
    // }
    let year = document.querySelector('#year');
    let director = document.querySelector('#director');
    let rate = document.querySelector('#rate');
    let actors = document.querySelector('#actors');


    document.querySelector('.nav__menu').onclick = function () {
        let line1 = document.querySelector('.line1');
        let line2 = document.querySelector('.line2');
        let list = document.querySelector('.nav__list');
        let nav = document.querySelector('.nav');

        line1.classList.toggle('opening');
        line2.classList.toggle('opening');
        list.classList.toggle('opening');
        nav.classList.toggle('opening');
    }
    let left = 0;



}
