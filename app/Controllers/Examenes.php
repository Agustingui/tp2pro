<?php

namespace App\Controllers;

use App\Models\ExamenModel;

class Examenes extends BaseController
{
    protected $examen;

    public function __construct()
    {
        $this->examen = new ExamenModel();
    }

    public function index()
    {
        echo view('plantillas/header');
        echo view('examenes');
        echo view('plantillas/footer');
    }

    // Lista los exámenes del usuario logueado
    public function listar()
    {
        $filas = $this->examen
            ->select('examen.id, examen.nombreExamen, COUNT(preguntas.id) AS cantidadPreguntas')
            ->join('preguntas', 'preguntas.idExamen = examen.id', 'left')
            ->where('examen.idUsuario', session()->get('idUsuario'))
            ->groupBy('examen.id, examen.nombreExamen')
            ->findAll();

        return $this->response->setJSON($filas);
    }

    // Obtiene un examen
    public function obtener($id)
    {
        $fila = $this->examen
            ->select('examen.id, examen.nombreExamen, COUNT(preguntas.id) AS cantidadPreguntas')
            ->join('preguntas', 'preguntas.idExamen = examen.id', 'left')
            ->where('examen.id', $id)
            ->where('examen.idUsuario', session()->get('idUsuario'))
            ->groupBy('examen.id, examen.nombreExamen')
            ->first();

        return $this->response->setJSON($fila ?? []);
    }

    // Guarda o modifica un examen
    public function guardar()
    {
        $id = $this->request->getPost('id');

        $data = [
            'idUsuario' => session()->get('idUsuario'),
            'nombreExamen' => $this->request->getPost('nombreExamen')
        ];

        if ($id) {
            $this->examen->update($id, $data);
        } else {
            $this->examen->insert($data);
        }

        return $this->response->setJSON([
            'ok' => true
        ]);
    }

    // Elimina un examen
    public function eliminar()
    {
        $id = $this->request->getPost('id');
        $this->examen ->where('id', $id) ->where('idUsuario', session()->get('idUsuario')) ->delete();

        return $this->response->setJSON([
            'ok' => true
        ]);
    }
}
