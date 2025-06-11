<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'string' => 'O campo :attribute deve ser um texto.',
    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',

    'attributes' => [
        'title' => 'título',
        'description' => 'descrição',
        'completed' => 'concluída',
    ],

    'custom' => [
        'title' => [
            'max' => 'O título não pode ter mais que 30 caracteres.',
        ],
        'description' => [
            'max' => 'A descrição não pode ter mais que 80 caracteres.',
        ],
    ],
]; 