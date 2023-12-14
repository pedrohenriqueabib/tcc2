let tipoPerfil = document.querySelector('#tipoPerfil');
let caixa = document.querySelector('.caixa');
let rotaOrganizador = document.querySelector(".rotaOrganizador");
let eventoAtual = document.querySelector(".eventoAtual");
let minhasInscricoes = document.querySelector(".minhasInscricoes");


if(tipoPerfil.value == 'Organizador'){
    rotaOrganizador.style.display = '';
    eventoAtual.style.display = '';
}

// if(tipoPerfil.value == 'Responsavel'){
//     caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Responsavel</p>';
// }

if(tipoPerfil.value == 'Participante'){
    minhasInscricoes.style.display = '';
}

// if(tipoPerfil.value == 'Colaborador'){
//     caixa.innerHTML = '<p><strong>Tipo de Perfil: </strong>Colaborador</p>';
// }
