let dados;

function carregarDados(funcao){
    fetch("http://3tdsn2022.atwebpages.com/ListarCarro.php")
        .then(conteudo => conteudo.text())
        .then(texto => {
            dados = JSON.parse(texto);
            funcao();
        });
}

function exibirTabela(){
    let tabela = '';
    dados.forEach(carro => {
        tabela += '<tr>';
        tabela += `<td>${carro.placa}</td>`;
        tabela += `<td>${carro.ano}</td>`;
        tabela += `<td>${carro.ipvaPago}</td>`;
        tabela += `<td>${carro.ipvaData}</td>`;
        tabela += `<td>${carro.ipvaValor}</td>`;
        tabela += '</tr>';
    });
    document.getElementsByTagName('tbody')[0].innerHTML = tabela;
}

function iniciar(){
    carregarDados(exibirTabela);
}

window.onload = iniciar;