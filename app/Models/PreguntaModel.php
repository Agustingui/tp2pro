<?php
namespace App\Models;
use CodeIgniter\Model;

class PreguntaModel extends Model
{
    protected $table         = 'preguntas';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['idExamen', 'textoPregunta'];
}
