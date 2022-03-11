let dados;

function carregarDados(){
    fetch("http://3tdsn2022.atwebpages.com/ListarComputador.php")
        .then(conteudo => conteudo.text())
        .then(texto => dados = texto);
}

function exibirTabela(){
    let tabela = '';
    for(let linha in dados){
        tabela += '<tr>';
        tabela += `<td>${dados[linha].processador}</td>`;
        tabela += `<td>${dados[linha].usb}</td>`;
        tabela += `<td>${dados[linha].atulizado ? "Sim" : "Não"}</td>`;
        tabela += `<td>${dados[linha].dataAtualizacao}</td>`;
        tabela += '</tr>';
    }
}