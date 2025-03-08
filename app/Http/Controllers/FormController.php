<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(Request $request) {

        $questions = Question::all()->toArray();

        $brands = [
            'Chesterfield' => ['Red', 'Blue', 'Menthol'],
            'Fortuna' => ['Original Soft', ' Line', 'Dark Green Menthol', 'Red', 'Blue'],
            'Lucky Strike' => ['Blue', 'Red', 'Wild', 'White', 'Amber'],
            'Marlboro' => ['Gold', 'Red', 'Touch', 'Silver', 'Menthol'],
            'Winston' => ['Classic Soft', 'Blue', 'Silver', 'Expression Duo', 'Compact Impulse']
                    ];
        
        $selectedBrand = $request->input('brand');

        return view('dashboard', compact('questions', 'brands', 'selectedBrand')); // ['form' => $form]
    } 
}
