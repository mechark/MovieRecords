function menu() {
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


function slider() {
    let line = document.querySelector('.slider__photos');
    left -=100;
    if (left < -400) {
        left = 0;
    }
    line.style.left = left + '%';

}
