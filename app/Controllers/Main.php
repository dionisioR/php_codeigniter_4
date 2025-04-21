<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TasksModel;
use App\Models\UsuariosModel;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        // Exemplo 01
        // echo "Hello World!";
        // $model = new UsuariosModel();
        // $usuarios = $model->findAll();

        // dd($usuarios);
        // ou
        // echo "<pre>";
        // print_r($usuarios);

        // $modelTask = new TasksModel();
        // $tasks = $modelTask->findAll();
        // dd($tasks);
        // ou
        // print_r($tasks);

        // Exemplo 02
        // if(session()->has('id')) {
        //     echo 'Logado';
        // }else{
        //     echo 'Não Logado / Deslogado';
        // }

        // return view('index');

        // Exemplo 03
        // main page
        $data = [];

        // load task from database and the user in session
        $task_model = new TasksModel();
        $data['tasks'] = $task_model->where('id_user', session()->id)->findAll();
        
        return view('main', $data);
    }

    public function login()
    {
        $data = [];
        // verifica se existe algum erro de validação
        $validation_errors = session()->getFlashdata('validation_erros');
        if ($validation_errors) {
            $data['validation_erros'] = $validation_errors;
        }

        // verifica se existe algum erro de login
        $login_error = session()->getFlashdata('login_error');
        if ($login_error) {
            $data['login_error'] = $login_error;
        }

        return view('login_frm', $data);
    }

    public function login_submit()
    {
        // // exemplo 01
        // // pegando as variáveis do formulário via post
        // $usuario = $this->request->getPost('text_usuario');
        // $senha = $this->request->getPost('text_senha');
        // // echo $usuario;
        // // echo $senha;
        // if (empty($usuario) || empty($senha)) {
        //     return redirect()->to('/login')->withInput()->with('error', 'Usuário ou senha inválidos');
        // }

        // echo $usuario;
        // echo $senha;
        // // como fazemos para validar o usuário e senha?

        // exemplo 02
        // validando os dados do formulário através do validation do CodeIgniter
        $validation = $this->validate([
            'text_usuario' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'O campo usuário é obrigatório',
                    'min_length' => 'O campo usuário deve ter no mínimo 3 caracteres',
                    'max_length' => 'O campo usuário deve ter no máximo 50 caracteres'
                ]
            ],
            'text_senha' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'O campo senha é obrigatório',
                    'min_length' => 'O campo senha deve ter no mínimo 3 caracteres',
                    'max_length' => 'O campo senha deve ter no máximo 20 caracteres'
                ]
            ]
        ]);

        // se a validação falhar, redireciona para a página de login com os erros
        if (!$validation) {
            return redirect()->to('/login')->withInput()->with('validation_erros', $this->validator->getErrors());
        }
        // se a validação passar, pega os dados do formulário
        $usuario = $this->request->getPost('text_usuario');
        $senha = $this->request->getPost('text_senha');
        // dd($usuario, $senha);

        // aqui você pode fazer a validação do usuário e senha no banco de dados
        $usuario_model = new UsuariosModel();
        $usuario_data = $usuario_model->where('usuario', $usuario)->first(); // vai guardar o resultado da consulta no banco de dados (o primeiro registro que encontrar)

        // dd($usuario_data);
        // se não encontrar o usuário 
        if (!$usuario_data) {
            return redirect()->to('/login')->withInput()->with('login_error', "Usuário ou senha inválidos");
        }

        // if senha is not valid
        if (!password_verify($senha, $usuario_data->senha)) {
            return redirect()->to('/login')->withInput()->with('login_error', "Usuário ou senha inválidos");
        }

        // login is valid
        $session_data = [
            'id' => $usuario_data->id,
            'usuario' => $usuario_data->usuario
        ];

        // set session data
        session()->set($session_data);

        // redirect to home page
        return redirect()->to('/');
    }

    public function logout()
    {
        // destroy session
        session()->destroy();
        // redirect to login page
        return redirect()->to('/');
    }

    public function new_task()
    {
        $data = [];

        // check for validation errors
        $validation_errors = session()->getFlashdata('validation_errors');
        if ($validation_errors) {
            $data['validation_errors'] = $validation_errors;
        }
        
        return view('new_task_frm', $data);
    }

    public function new_task_submit()
    {
        // form validation
        $validation = $this->validate([
            "text_tarefa" => [
                'label' => 'Nome da tarefa',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres'
                ]
            ],
            "text_descricao" => [
                'label' => 'Descrição',
                'rules' => 'min_length[3]|max_length[500]',
                'errors' => [
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // get form data
        $titulo = $this->request->getPost('text_tarefa');
        $descricao = $this->request->getPost('text_descricao');

        // save data to database
        $task_model = new TasksModel();
        $task_model->insert([
            'id_user' => session()->id,
            'task_name' => $titulo,
            'task_description' => $descricao,
            'task_status' => 'new'
        ]);


        // redirect to home page
        return redirect()->to('/');
    }

    public function sessao()
    {
        echo "<pre>";
        print_r(session()->get());
        echo "</pre>";
    }
}
