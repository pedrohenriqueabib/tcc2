let selector = document.querySelector('#selector');
let formOrganizador = document.querySelector("#formOrganizador");
let formResponsavel = document.querySelector("#formResponsavel");
let formParticipante = document.querySelector("#formParticipante");
let formColaborador = document.querySelector("#formColaborador");
formOrganizador.hidden = true;
formResponsavel.hidden = true;
formParticipante.hidden = true;
formColaborador.hidden = true;

selector.addEventListener('change', ()=>{
    if(selector.value == 'organizador'){
        formOrganizador.hidden = false;  
        formResponsavel.hidden = true;
        formParticipante.hidden = true;
        formColaborador.hidden = true;      
    }
    if(selector.value == 'responsavel'){
        formOrganizador.hidden = true;  
        formResponsavel.hidden =false;
        formParticipante.hidden = true;
        formColaborador.hidden = true;      
    }
    if(selector.value == 'participante'){
        formOrganizador.hidden = true;  
        formResponsavel.hidden = true;
        formParticipante.hidden = false;
        formColaborador.hidden = true;      
    }
    if(selector.value == 'colaborador'){
        formOrganizador.hidden = true;  
        formResponsavel.hidden = true;
        formParticipante.hidden = true;
        formColaborador.hidden = false;      
    }
});