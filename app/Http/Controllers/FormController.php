<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form() {
        $form = [
            ['question1' => 'Which is your preferred brand of cigarettes?'],
            ['question2' => 'What is your preferred variety of cigarette?']
        ];

        return view(
            'dashboard', 
            ['form' => $form]
        );
    } 
}
