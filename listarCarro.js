let dados;

function carregarDados(funcao){
    fetch("http://3tdsn2022.atwebpages.com/ListarCarro.php")
        .then(conteudo => conteudo.text())
        .then(texto => {
            dados = JSON.parse(texto);
            funcao();
        });
}

function formatar(carro){
    carro.ipvaPago = carro.ipvaPago === "1" ? "Sim" : "Não";
    carro.ipvaData = new Intl.DateTimeFormat('pt-BR').format(new Date(carro.ipvaData));
    carro.ipvaValor = new Intl.NumberFormat('pt-BR', {style: 'currency', currency: 'BRL'}).format(carro.ipvaValor);
}

function exibirTabela(){
    let tabela = '';
    dados.forEach(carro => {
        formatar(carro);
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