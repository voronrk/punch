<?php

namespace App\View\Components;

use Illuminate\View\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Facades\App\Http\Controllers\RoleController;

use App\Models\Product;
use App\Models\Material;
use App\Models\Machine;

class AddPunch extends Component
{

    public $products;
    public $materials;
    public $machines;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = Product::all();
        $this->materials = Material::all();
        $this->machines = Machine::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-punch');
    }
}
