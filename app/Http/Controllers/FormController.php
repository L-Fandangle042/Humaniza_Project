<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(Request $request) {

        $question = new Question();
        $question->question = "this is a test question";
        $question->type = "example type";
        $question->create();


        $brands = [
            'Chesterfield' => ['Red', 'Blue', 'Menthol'],
            'Fortuna' => ['Original Soft', ' Line', 'Dark Green Menthol', 'Red', 'Blue'],
            'Lucky Strike' => ['Blue', 'Red', 'Wild', 'White', 'Amber'],
            'Marlboro' => ['Gold', 'Red', 'Touch', 'Silver', 'Menthol'],
            'Winston' => ['Classic Soft', 'Blue', 'Silver', 'Expression Duo', 'Compact Impulse']
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
