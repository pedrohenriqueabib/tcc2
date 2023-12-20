let selector = document.querySelector('#selector');
let formOrganizador = document.querySelector("#formOrganizador");
let formResponsavel = document.querySelector("#formResponsavel");
let formParticipante = document.querySelector("#formParticipante");
let formColaborador = document.querySelector("#formColaborador");
// formOrganizador.style.display = 'none';
// formResponsavel.style.display = 'none';
// formParticipante.style.display = 'none';
// formColaborador.style.display = 'none';

selector.addEventListener('change', ()=>{
    if(selector.value == 'organizador'){
        formOrganizador.style.display = '';  
        formResponsavel.style.display = 'none';
        formParticipante.style.display = 'none';
        formColaborador.style.display = 'none';      
    }
    if(selector.value == 'responsavel'){
        formOrganizador.style.display = 'none';  
        formResponsavel.style.display ='';
        formParticipante.style.display = 'none';
        formColaborador.style.display = 'none';      
    }
    if(selector.value == 'participante'){
        formOrganizador.style.display = 'none';  
        formResponsavel.style.display = 'none';
        formParticipante.style.display = '';
        formColaborador.style.display = 'none';      
    }
    if(selector.value == 'colaborador'){
        formOrganizador.style.display = 'none';  
        formResponsavel.style.display = 'none';
        formParticipante.style.display = 'none';
        formColaborador.style.display = '';      
    }
});