<?php
namespace App\Models;
use CodeIgniter\Model;

class ExamenModel extends Model
{
    protected $table         = 'examen';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['idUsuario', 'nombreExamen'];
}
