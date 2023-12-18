let editar = document.querySelector('#editar');
let cancelar = document.querySelector('#cancelar');
let salvar = document.querySelector('#salvar');
let desabilitados = document.querySelectorAll(".desabilitado");

editar.addEventListener('click', (e)=>{
    editar.style.display = 'none';
    salvar.style.display = '';
    cancelar.style.display = '';
    e.preventDefault();
    desabilitados.forEach((desabilitado)=>{
        desabilitado.removeAttribute('disabled');
    })
});

cancelar.addEventListener('click', ()=>{
    editar.style.display = '';
    salvar.style.display = 'none';
    cancelar.style.display = 'none';

})