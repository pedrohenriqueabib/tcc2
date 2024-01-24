let tipoPerfil = document.querySelector('#tipoPerfil');
let rotaOrganizador = document.querySelector(".rotaOrganizador");
let eventoAtual = document.querySelector(".eventoAtual");
let minhasInscricoes = document.querySelector(".minhasInscricoes");
let colaboradorAtividade = document.querySelector(".colaboradorAtividade");
let responsavelAtividade = document.querySelector("#responsavelAtividade");


if(tipoPerfil.value == 'Organizador'){
    rotaOrganizador.style.display = '';
    eventoAtual.style.display = '';
}

if(tipoPerfil.value == 'Responsavel'){
    responsavelAtividade.style.display = '';
}

if(tipoPerfil.value == 'Participante'){
    minhasInscricoes.style.display = '';
}

if(tipoPerfil.value == 'Colaborador'){
    colaboradorAtividade.style.display = '';
}
