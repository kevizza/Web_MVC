<?php

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class PessoaController 
{

    public static function index() 
    {
        include 'Model/PessoaModel.php';
        $model = new PessoaModel();
        $model->getAllRows();

        include 'View/modules/Pessoa/ListaPessoas.php';
    }



    public static function form()
    {
        include 'Model/PessoaModel.php';
        $model = new PessoaModel();

        if(isset($_GET['id']))
            $model = $model->getByID( (int) $_GET['id']);

        // var_dump($model);

        include 'View/modules/Pessoa/FormPessoa.php';
    }


 
    public static function save() {

        include 'Model/PessoaModel.php';

        $pessoa = new PessoaModel();
        $pessoa->id = $_POST['id'];
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];

        $pessoa->save(); 

        header("Location: /pessoa");
    }

    public static function delete()
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();

        $model->delete( (int) $_GET['id']);

        header("Location: /pessoa");
    }
}

