let salvar = document.querySelector('#salvar');
let editar = document.querySelector('#editar');
let cancelar = document.querySelector('#cancelar');
let desabilitados = document.querySelectorAll('.desabilitado');

editar.addEventListener('click', (e)=>{
    salvar.style.display = '';
    cancelar.style.display = '';
    editar.style.display = 'none';
    desabilitados.forEach((desabilitado)=>{
        desabilitado.removeAttribute('disabled');
    })
    e.preventDefault();
})

cancelar.addEventListener('click', ()=>{
    salvar.style.display = 'none';
    cancelar.style.display = 'none';
    editar.style.display = '';
    
    desabilitados.forEach((desabilitado)=>{
        desabilitado.setAttribute('disabled','disabled');
    })
})
