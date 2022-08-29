<?php
namespace App\Controller;
use App\model\ProdutoModel;

class ProdutoController
{
   
    public static function  index()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->getAllRows();

        include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function form()
    {
        include 'Model/ProdutoModel.php';
        $model =new ProdutoModel();

        if(isset($_GET['id']))
        $model = $model->getBYId((int) $_GET['id']);

        include 'View/modules/Produto/FormProduto.php';
    }

    public static function save() {

        include 'Model/ProdutoModel.php'; 

        $produto = new ProdutoModel();
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->codigo = $_POST['codigo'];
        $produto->estoque = $_POST['estoque'];
        $produto->fornecedor = $_POST['fornecedor'];
        $produto->categoria = $_POST['categoria'];
        $produto->data_entrada = $_POST['data_entrada'];

        $produto->save();
        header("Location: /Produto"); 
    }
    public static function delete()
    {
     include 'Model/ProdutoModel.php';

     $produto = new ProdutoModel();

     $produto->delete((int) $_GET['id']);
     header("Location: /Produto");
    }
}