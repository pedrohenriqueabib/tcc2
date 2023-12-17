let adicionarMembros = document.querySelector('#adicionarMembros');
let membros = document.querySelector('.membros');
let cancelar = document.querySelector('#cancelar');
let selecionarMembro = document.querySelector("#selecionarMembro");
let selecionados = document.querySelector('#selecionados');
let corpoLista = document.querySelector('#corpoLista');

adicionarMembros.addEventListener('click', ()=>{
    adicionarMembros.style.display = 'none';
    membros.style.display = '';
});

cancelar.addEventListener('click', ()=>{
    adicionarMembros.style.display = '';
    membros.style.display = 'none';
    selecionados.value = '';
    corpoLista.innerHTML = '';
    selecionarMembro.value = 'Selecionar';
})

selecionarMembro.addEventListener('change', ()=>{
    let lista = selecionarMembro.value.split('+');
    
    if( verificar(lista[0], selecionados.value.split('+')) == 0){
        selecionados.value += lista[0]+'+';
        corpoLista.innerHTML += `        
            <tr>
                <td>${lista[1]}</td>
            </tr> 
        `;
    }
});

function verificar(id, lista){
    let presente =0;
    lista.forEach((list)=>{
        if(list == id){
            presente = 1;
        }
    });

    return presente;
    // return lista.some((list)=> list == id);
}