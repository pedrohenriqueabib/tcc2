let tab1 = document.querySelector('#tab1');
let tab2 = document.querySelector('#tab2');
let tab3 = document.querySelector('#tab3');

let content1 = document.querySelector('#content1');
let content2 = document.querySelector('#content2');
let content3 = document.querySelector('#content3');

window.addEventListener('load', ()=>{
    content1.style.display = '';
    content2.style.display = 'none';
    content3.style.display = 'none';
});

tab1.addEventListener('click', ()=>{
    content1.style.display = '';
    content2.style.display = 'none';
    content3.style.display = 'none';    
});

tab2.addEventListener('click', ()=>{
    content1.style.display = 'none';
    content2.style.display = '';
    content3.style.display = 'none';    
});

tab3.addEventListener('click', ()=>{
    content1.style.display = 'none';
    content2.style.display = 'none';
    content3.style.display = '';    
});