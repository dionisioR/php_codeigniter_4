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
        // return view('teste');
    }

    public function login()
    {
        $data =[];
        // verifica se existe algum erro de validação
        $validation_errors = session()->getFlashdata('validation_erros');
        if ($validation_errors) {
            $data['validation_erros'] = $validation_errors;
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
                'rules' => 'required|min_length[6]|max_length[20]',
                'errors' => [
                    'required' => 'O campo senha é obrigatório',
                    'min_length' => 'O campo senha deve ter no mínimo 6 caracteres',
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

        dd($usuario, $senha);
    }
}
