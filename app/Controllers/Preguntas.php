<?php

namespace App\Controllers;

use App\Models\ExamenModel;
use App\Models\PreguntaModel;

/**
 * ABM de preguntas. Cada pregunta pertenece a un examen,
 * y el examen debe pertenecer al usuario logueado.
 */
class Preguntas extends BaseController
{
    protected $examen;
    protected $pregunta;

    public function __construct()
    {
        $this->examen = new ExamenModel();
        $this->pregunta = new PreguntaModel();
    }
    public function index()
    { 
        echo view('plantillas/header');
        echo view('preguntas');
        echo view('plantillas/footer');
    }
    public function listar($idExamen)
    {
        $filas = $this->pregunta->where('idExamen', $idExamen)->findAll();

        return $this->response->setJSON($filas);
    }
    public function guardar()
    {
        $id = $this->request->getPost('id');
        $data = [
            'idExamen'      => $this->request->getPost('idExamen'),
            'textoPregunta' => $this->request->getPost('textoPregunta')
        ];

        $id ? $this->pregunta->update($id, $data) : $this->pregunta->insert($data);

        return $this->response->setJSON(['ok' => true]);
    }
    public function eliminar()
    {
        $this->pregunta->delete($this->request->getPost('id'));

        return $this->response->setJSON(['ok' => true]);
    }
}
