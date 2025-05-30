<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
//s Controllers, como o TaskController.php, atuam como intermediários, processando as requisições dos usuários, interagindo com os Models e selecionando a View apropriada para exibir a resposta