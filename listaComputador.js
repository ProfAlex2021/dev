let dados;

function carregarDados(cb){
    fetch("http://3tdsn2022.atwebpages.com/ListarComputador.php")
        .then(conteudo => conteudo.text())
        .then((texto) => {
            dados = JSON.parse(texto);
            cb();
        });
}

function exibirTabela(){
    console.log(dados);
    let tabela = '';
    for(let linha in dados){
        tabela += '<tr>';
        tabela += `<td>${dados[linha].PrOcEsSaDoR}</td>`;
        tabela += `<td>${dados[linha].usb}</td>`;
        tabela += `<td>${dados[linha].atualizado === '1' ? "Sim" : "Não"}</td>`;
        tabela += `<td>${dados[linha].dataAtualizacao}</td>`;
        tabela += '</tr>';
    }
    document.getElementsByTagName('tbody')[0].innerHTML = tabela;
    
}

function iniciar(){
    carregarDados(exibirTabela)
}

window.onload = iniciar;