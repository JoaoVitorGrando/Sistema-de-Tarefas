<?php

namespace App\Models; // Task.php e User.php, representam as entidades do nosso banco de dados e contêm a lógica para interagir com as tabelas correspondentes (tarefas e usuários)."

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id'
    ];

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
