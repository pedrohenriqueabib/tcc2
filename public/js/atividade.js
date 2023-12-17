let editar = document.querySelector('#editar');
let cancelar = document.querySelector('#cancelar');
let salvar = document.querySelector('#salvar');

editar.addEventListener('click', (e)=>{
    editar.style.display = 'none';
    salvar.style.display = '';
    cancelar.style.display = '';
    e.preventDefault();
});

cancelar.addEventListener('click', ()=>{
    editar.style.display = '';
    salvar.style.display = 'none';
    cancelar.style.display = 'none';

})