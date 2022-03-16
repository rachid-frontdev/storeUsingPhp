  let searchBtn = document.getElementById('search');
let upScr = document.getElementById('upScroll');
let nav = document.querySelector('nav');
    if(window.scrollY <= 698) {
        nav.style.display = 'block';
    } 

window.onscroll = function() {
    'use strict';
     if(window.scrollY >= 698) {
        nav.style.display = 'none';
     } else {
         nav.style.display = 'block';
     }
   
} 
upScr.onclick = () => {
    return window.scrollTo({
        left:0,
        top:0,
        behavior:'smooth'
    });
}
function showWindow() {
    let mywindow = window.open('http://localhost/stripepayment/search.php','_blank','width=500,height=700');
    return mywindow;
}
searchBtn.addEventListener('click', () => {
    showWindow().focus();
});

