<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Autenticacion extends BaseController
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new UsuarioModel();
    }

    public function login()
    {
        echo view('plantillas/header');
        echo view('login');
        echo view('plantillas/footer');
    }

    public function registro()
    {
        echo view('plantillas/header');
        echo view('registro');
        echo view('plantillas/footer');
    }

    public function registrar()
    {
        $usuarioNombre = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $usuarioExistente = $this->usuarios->where('usuario', $usuarioNombre)->first();

        if ($usuarioExistente) {
            return $this->response->setJSON([
                'ok'      => false,
                'mensaje' => 'El nombre de usuario ya está en uso. Elige otro.'
            ]);
        }

        $this->usuarios->insert([ 'usuario'  => $usuarioNombre,
            'password' => password_hash((string) $password, PASSWORD_DEFAULT)]);

        return $this->response->setJSON([ 'ok'       => true, 'mensaje'  => '¡Usuario registrado correctamente!',
            'redirect' => base_url('login')
        ]);
    }

    public function ingresar()
    {
        $usuario  = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $datos = $this->usuarios->where('usuario', $usuario)->first();

        if (!$datos || !password_verify((string) $password, $datos['password'])) {
            return $this->response->setJSON([
                'ok'      => false,
                'mensaje' => 'Usuario o contraseña incorrectos'
            ]);
        }

        session()->set([
            'idUsuario' => $datos['id'] ?? null,
            'usuario'   => $datos['usuario'] ?? null
        ]);

        return $this->response->setJSON(['ok' => true]);
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}