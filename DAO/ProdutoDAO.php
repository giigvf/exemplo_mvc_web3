<?php

namespace App\DAO;

use App\model\ProdutoModel;
use \PDO;

class ProdutoDAO
 {
private $conexao;

function __construct() 
{
    $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
    $user = "root";
    $pass = "etecjau";
    $this->conexao = new PDO($dsn, $user, $pass);
}

function insert(ProdutoModel $model) 
{
    $sql = "INSERT INTO produto 
            (nome, descricao, codigo, estoque, fornecedor, categoria, data_entrada) 
            VALUES (?, ?, ?, ?, ?, ?, ? )";
    
    $stmt = $this->conexao->prepare($sql);

    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->descricao);
    $stmt->bindValue(3, $model->codigo);
    $stmt->bindValue(4, $model->estoque);
    $stmt->bindValue(5, $model->fornecedor);
    $stmt->bindValue(6, $model->categoria);
    $stmt->bindValue(7, $model->data_entrada);
    
    $stmt->execute();      
}
public function update(ProdutoModel $model )
    {
         $sql = "update protudo SET nome=?, descricao=? , codigo=?, estoque=?, fornecedor=?, categoria=?, data_entrada=? WHERE id=?";
    
         $stmt = $this->conexao->prepare($sql);
         $stmt->bindValue(1, $model->nome);
         $stmt->bindValue(2, $model->descricao);
         $stmt->bindValue(3, $model->codigo);
         $stmt->bindValue(4, $model->estoque);
         $stmt->bindValue(5, $model->fornecedor);
         $stmt->bindValue(6, $model->categoria);
         $stmt->bindValue(7, $model->data_entrada);
         $stmt->bindValue(8, $model->id);
         $stmt->execute(); 
    }   
         public function select()
         {
             $sql = "SELECT * FROM produto ";
     
             $stmt = $this->conexao->prepare($sql);
             $stmt->execute();
     
             return $stmt->fetchAll(PDO::FETCH_CLASS);        
         }
         public function selectById(int $id)
         {
             include_once 'Model/ProdutoModel.php';
     
             $sql = "SELECT * FROM produto WHERE id = ?";
     
             $stmt = $this->conexao->prepare($sql);
             $stmt->bindValue(1, $id);
             $stmt->execute();
     
             return $stmt->fetchObject("ProdutoModel"); 
         }
     
         public function delete(int $id)
         {
             $sql = "DELETE FROM produto WHERE id = ? ";
     
             $stmt = $this->conexao->prepare($sql);
             $stmt->bindValue(1, $id);
             $stmt->execute();
         }
     }

