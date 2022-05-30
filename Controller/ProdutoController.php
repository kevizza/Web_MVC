<?php

    class ProdutoController
        {
            public static function index()
            {
                include 'Model/ProdutoModel.php';
                $model = new ProdutoModel();
                $model->getAllRows();

                include 'View/modules/Produto/ListarProduto.php';
            }

            public static function form()

            {
                include 'Model/ProdutoModel.php';
                $model = new ProdutoModel();

                if(isset($_GET['id']))

                $model = $model->getById( (int) $_GET['id']);

                include 'View/modules/Produto/CadastroProduto.php';
            }

            public static function save()
            {
                include 'Model/ProdutoModel.php';

                $produto = new ProdutoModel();
                $produto->id = $_POST['id'];
                $produto->descricao = $_POST['descricao'];
                $produto->validade = $_POST['validade'];
                $produto->data_fabric = $_POST['data_fabric'];
                $produto->preco = $_POST['preco'];
                $produto->nome = $_POST['nome'];
        
                $produto->save();
        
                header("Location: /produto");
            }

            public static function delete()
            {
                include 'Model/ProdutoModel.php';
        
                $model = new ProdutoModel();
        
                $model->delete( (int) $_GET['id']);
        
                header("Location: /produto");
            }
}