<?php
include "Conexao.php";
    class Carro{
        private int $id;
        private string $placa;
        private int $ano;
        private bool $ipvaPago;
        private string $ipvaData;
        private float $ipvaValor;

        public static function ListarTodos(){
            $conexao = new Conexao();
            $sql = "SELECT * FROM Carro";
            $dados = $conexao->Consultar($sql);
            return $dados;
        }
    }