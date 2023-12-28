let selector = document.querySelector('#selector');
let formOrganizador = document.querySelector("#formOrganizador");
let formResponsavel = document.querySelector("#formResponsavel");
let formParticipante = document.querySelector("#formParticipante");
let formColaborador = document.querySelector("#formColaborador");
let telefone = document.querySelectorAll("#telefone");

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

telefone.forEach(tel => {
    tel.addEventListener('keyup', (e)=>{
        tel.value = tel.value.replace(/\D/g, '');

        
        // Define o formato desejado (por exemplo, (123) 456-7890)
        const formato = '($1) $2-$3';

        // Aplica a formatação usando expressões regulares
        tel.value = tel.value.replace(/(\d{2})(\d{5})(\d{4})/, formato);
        let r = tel.value;
    })
})