<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {


    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = ['titulo', 'data_criacao', 'data_conclusao', 'status', 'descricao'];
}
