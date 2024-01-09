let tipoPerfil = document.querySelector('#tipoPerfil');
// let caixa = document.querySelector('.caixa');
let rotaOrganizador = document.querySelector(".rotaOrganizador");
let eventoAtual = document.querySelector(".eventoAtual");
let minhasInscricoes = document.querySelector(".minhasInscricoes");
let colaboradorAtividade = document.querySelector(".colaboradorAtividade");


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

if(tipoPerfil.value == 'Colaborador'){
    colaboradorAtividade.style.display = '';
}
