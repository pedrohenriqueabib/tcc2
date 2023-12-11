let adicionarColaborador = document.querySelector('#adicionarColaborador');
let colabs = document.querySelector('.colabs');
let cancelar = document.querySelector('#cancelar');
let selecionar = document.querySelector("#selecionar");
let listaSelect = document.querySelector("#listaSelect");
let tabelaSelecionados = document.querySelector("#tabelaSelecionados");

adicionarColaborador.addEventListener('click', function(){
    colabs.style.display = '';
    adicionarColaborador.style.display = 'none';
});

cancelar.addEventListener('click', function(){
    colabs.style.display = 'none';
    adicionarColaborador.style.display = '';
    tabelaSelecionados.innerHTML = '';
    listaSelect.value = '';
    selecionar.selectedIndex = 0;
});

selecionar.addEventListener('change', function(){
    let selecionado = selecionar.value.split('+');
    let lstSelect = listaSelect.value.split(',');

   if(verificar(selecionado[0], lstSelect) != 1){
        tabelaSelecionados.innerHTML += `
            <tr><td>${selecionado[1]}</td></tr>
        `;
        listaSelect.value += selecionado[0]+ ',';
    }    
});

function verificar(selec, lista){
    for( let i=0; i<lista.length; i++){
        if(lista[i] == selec){
            return 1;
        }
    }
    return 0;
}