<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Facades\App\Http\Controllers\RoleController;

class header extends Component
{

    public $userName = '';
    public $isAdmin = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if ($request->user()) {
            $this->userName = $request->user()->name;
            $this->isAdmin = RoleController::show($request->user()->role_id) == 'admin';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header', ['userName' => $this->userName, 'isAdmin' => $this->isAdmin]);
    }
}
