<?php
namespace App\Controllers;
use App\Models\ExamenModel;
use App\Models\PreguntaModel;

class Sorteo extends BaseController
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
        echo view('sorteo');
        echo view('plantillas/footer');
    }
    public function realizar()
    {
        $idExamen = $this->request->getPost('idExamen');
        $cantidad = (int) $this->request->getPost('cantidad');

        if (empty($idExamen) || $cantidad < 1) {
            return $this->response->setJSON([
                'ok' => false,
                'mensaje' => 'Faltan datos para realizar el sorteo.'
            ]);
        }

        $total = $this->pregunta->where('idExamen', $idExamen)->countAllResults();

        if ($cantidad > $total) {
            return $this->response->setJSON([
                'ok' => false,
                'mensaje' => 'La cantidad pedida supera la cantidad de preguntas del examen.'
            ]);
        }

        $sorteadas = $this->pregunta
            ->where('idExamen', $idExamen)
            ->orderBy('RAND()')
            ->limit($cantidad)
            ->find();

        return $this->response->setJSON(['ok' => true, 'preguntas' => $sorteadas]);
    }
}
