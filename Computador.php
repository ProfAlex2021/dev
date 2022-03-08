<?php
include "Conexao.php";
class Computador{
    private int $id;
    private string $processador;
    private int $usb;
    private bool $atualizado;
    private string $dataAtualizacao;

    public function __construct($processador, $usb, $atualizado, $dataAtualizacao){
        $this->processador = $processador;
        $this->usb = $usb;
        $this->atualizado = $atualizado;
        $this->dataAtualizacao = $dataAtualizacao;
    }
    
    public function Cadastrar(){
        $conexao = new Conexao();
        $sql = "INSERT INTO
        Computador(processador, usb, atualizado, dataAtualizacao)
        VALUES (:processador,:usb,:atualizado,:dataAtualizacao)";
        $pdo = $conexao->Conectar();
        $preview = $pdo->prepare($sql);
        $preview->bindParam(':processador', $this->processador);
        $preview->bindParam(':usb', $this->usb);
        $preview->bindParam(':atualizado', $this->atualizado);
        $preview->bindParam(':dataAtualizacao', $this->dataAtualizacao);
        $preview->execute();
    }
    
    public static function ListarTodos(){
        $conexao = new Conexao();
        $sql = "SELECT * FROM Computador";
        $dados = $conexao->Consultar($sql);
        return $dados;
    }
}