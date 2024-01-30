let adicionarMembros = document.querySelector('#adicionarMembros');
let membros = document.querySelector('#membros');
let listaMembros = document.querySelector('.listaMembros');

adicionarMembros.addEventListener('change', function(){
    let dado = adicionarMembros.value.split('+');
    if( verificar(dado[0], membros.value) == 0){
        membros.value += dado[0]+'+';
        listaMembros.innerHTML += '<tr><td>'+dado[1]+'</td></th>';
    }
});

function verificar(membro, lista){
    lista = lista.split('+');
    for( i=0; i < lista.length; i++){
        if( lista[i] == membro){
            return 1;
        }
    }
    return 0;
}
