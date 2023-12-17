let tab1 = document.querySelector('#tab1');
let tab2 = document.querySelector('#tab2');
let tab3 = document.querySelector('#tab3');

let content1 = document.querySelector('#content1');
let content2 = document.querySelector('#content2');
let content3 = document.querySelector('#content3');

let editar = document.querySelector('#editar');
let salvar = document.querySelector('#salvar');
let cancelar = document.querySelector('#cancelar');
let desativados = document.querySelectorAll('.desativado');

editar.addEventListener('click', (e)=>{
    editar.style.display = 'none';
    cancelar.style.display = '';
    salvar.style.display = '';
    e.preventDefault();
    desativados.forEach((desativado)=>{
        desativado.removeAttribute('disabled');
    })
});

cancelar.addEventListener('click', ()=>{
    editar.style.display = '';
    cancelar.style.display = 'none';
    salvar.style.display = 'none';
    desativados.forEach((desativado)=>{
        desativado.setAttribute('disabled','disabled');
    })
})

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