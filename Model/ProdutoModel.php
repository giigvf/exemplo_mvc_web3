<?php

namespace App\Model;
use App\DAO\ProdutoDAO;

class ProdutoModel

{
    public $id, $nome, $descricao, $codigo;
    public $data_entrada, $categoria;
    public $estoque, $fornecedor;

    public $rows;

    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();
       
        if(empty($this->id)) 
        {           
            $dao->insert($this);
        } else {
            $dao->update($this); 
        }
    

    } 
     public function getAllRows()
    {
        include 'DAO/ProdutoDAO.php';
    
        $dao =new ProdutoDAO();
    
        $this->rows = $dao->select();
    }
    public function GetByid(int $id)
    {
        include 'Dao/ProdutoDao.php';
    
        $dao = new ProdutoDAO();
    
        $obj = $dao->selectById($id);
    
        return($obj) ? $obj : new ProdutoModel();
    }
    public function delete(int $id)
    {
        include'DAO/ProdutoDAO.php';
    
        $dao = new ProdutoDAO();
    
        $dao->delete($id);
    }
    
}      
