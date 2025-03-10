<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Brand;

class FormController extends Controller
{
    public function form(Request $request) {

        $questions = Question::select('question', 'type')->get()->toArray();

        $brands = Brand::select('brand', 'variety')->get()->toArray();
        
        $selectedBrand = $request->input('brand');

        return view('dashboard', compact('questions', 'brands', 'selectedBrand')); // ['form' => $form]
    } 
}
