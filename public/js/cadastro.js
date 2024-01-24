let selector = document.querySelector('#selector');
let formOrganizador = document.querySelector("#formOrganizador");
let formResponsavel = document.querySelector("#formResponsavel");
let formParticipante = document.querySelector("#formParticipante");
let formColaborador = document.querySelector("#formColaborador");
let telefone = document.querySelectorAll("#telefone");
let cargo = document.querySelectorAll('#cargo');
let matricula = document.querySelectorAll('#matricula');
let exibirSenha = document.querySelectorAll('#exibirSenha');
let password = document.querySelectorAll('#password');
let loc = window.location.href;

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

cargo.forEach(carg => {
    carg.addEventListener('keyup', (e)=>{
        carg.value = carg.value.replace(/[^a-zA-Z]/g, '');        
    });
})

matricula.forEach( mat => {
    mat.addEventListener('input', ()=>{
        mat.value = mat.value.replace(/\D/g, '');
    });
})

exibirSenha.forEach( exibir => {    
    exibir.addEventListener('change', function(){
        if(exibir.checked){
            password.forEach( pass => {
                pass.type = 'text';
            })
        }else{
            password.forEach( pass => {
                pass.type = 'password';
            })
        }
    })
})

erro = loc.split('=');
if(erro[1]){
    alert('Email '+erro[1]);
}