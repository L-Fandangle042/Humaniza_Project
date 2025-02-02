<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(Request $request) {
        $brands = [
            'Marlboro' => ['Gold', 'Red', 'Touch', 'Silver', 'Menthol'],
            'Chesterfield' => ['Red', 'Blue', 'Menthol'],
            'Lucky Strike' => ['Blue', 'Red', 'Wild', 'White', 'Amber']
        ];
        
        $selectedBrand = $request->input('brand');

        $form = [
            ['question' => 'Which is your preferred brand of cigarettes?', 'type' => 'brand'],
            ['question' => 'What is your preferred variety of cigarette?', 'type' => 'variety'],
            ['question' => 'Which alternative brand do you prefer?', 'type' => 'alternative'],
            ['question' => 'Did you buy the preferred brand?', 'type' => 'purchase']
        ];

        return view('dashboard', compact('form', 'brands', 'selectedBrand')); // ['form' => $form]
    } 
}
