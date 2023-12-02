let tipoPerfil = document.querySelector('#tipoPerfil');
let caixa = document.querySelector('.caixa');
let rotaOrganizador = document.querySelector(".rotaOrganizador");
rotaOrganizador.style.display = 'none';

if(tipoPerfil.value == 'Organizador'){
    rotaOrganizador.style.display = '';

}

// if(tipoPerfil.value == 'Responsavel'){
//     caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Responsavel</p>';
// }

// if(tipoPerfil.value == 'Participante'){
//     caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Participante</p>';
// }

// if(tipoPerfil.value == 'Colaborador'){
//     caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Colaborador</p>';
// }
