<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        // Não excluir nenhuma rota da proteção CSRF
    ];

    protected function tokensMatch($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
        
        if (!$token && $header = $request->header('X-XSRF-TOKEN')) {
            $token = urldecode($header);
        }
        
        return is_string($token) && hash_equals($request->session()->token(), $token);
    }
} 