let tipoPerfil = document.querySelector('#tipoPerfil');
let caixa = document.querySelector('.caixa');

if(tipoPerfil.value == 'Organizador'){
    caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Organizador de eventos</p>';
}

if(tipoPerfil.value == 'Responsavel'){
    caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Responsavel</p>';
}

if(tipoPerfil.value == 'Participante'){
    caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Participante</p>';
}

if(tipoPerfil.value == 'Colaborador'){
    caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Colaborador</p>';
}
