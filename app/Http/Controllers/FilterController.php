<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Material;
use App\Models\Machine;


class FilterController extends Controller
{
    public function __invoke(Request $request) {
        $products = Product::all();
        $materials = Material::all();
        $machines = Machine::all();
        if ($request->path() == '/') {
            $view = 'index';
        } else {
            $view = $request->path();
        };
        return view($view, [
            'products' => $products,
            'materials' => $materials,
            'machines' => $machines,
        ]);
    }
}
