const HIDDEN1 = document.querySelector('.insert-box');
const HIDDEN2 = document.querySelector('.xcopy-box');
const HIDDEN3 = document.querySelector('.xcopy-box2');
const MAIN = document.querySelector('.main');
const MENUTRIGGER = document.querySelector('.menu-trigger');
// const TABLE = document.querySelector('.content-table');
MENUTRIGGER.addEventListener('click', menubar);

function menubar() {
    HIDDEN1.removeAttribute('id');
    HIDDEN2.removeAttribute('id');
    HIDDEN3.removeAttribute('id');
    MENUTRIGGER.addEventListener('click',menucancle );
    MENUTRIGGER.style.backgroundColor = 'rgba(148, 178, 255, 1)';
    MAIN.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
    MENUTRIGGER.removeEventListener('click',menubar );
    
    function menucancle() {
        MENUTRIGGER.style.backgroundColor = 'rgba(206, 220, 255, 1)';
        MAIN.style.backgroundColor = 'rgba(243, 246, 255, 1)';
        HIDDEN1.id='hidden1';
        HIDDEN2.id='hidden2';
        HIDDEN3.id='hidden3';
        MENUTRIGGER.addEventListener('click',menubar );
        
    }
}








