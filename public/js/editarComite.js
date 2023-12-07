let salvar = document.querySelector('#salvar');
let editar = document.querySelector('#editar');
let cancelar = document.querySelector('#cancelar');

window.addEventListener('load', ()=>{
    salvar.style.display = 'none';
    cancelar.style.display = 'none';
})

editar.addEventListener('click', ()=>{
    salvar.style.display = '';
    cancelar.style.display = '';
    editar.style.display = 'none';
})

cancelar.addEventListener('click', ()=>{
    salvar.style.display = 'none';
    cancelar.style.display = 'none';
    editar.style.display = '';
})