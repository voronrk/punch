<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Facades\App\Http\Controllers\PunchController;
use Illuminate\Http\Request;
use Facades\App\Http\Controllers\RoleController;


class CardsWrapper extends Component
{

    public $userName = '';
    public $isAdmin = false;

    public $punches;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->punches = Punch::with('products', 'machines', 'materials', 'pics')->get();
        $this->punches = PunchController::index();

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
        return view('components.cards-wrapper', ['punches' => $this->punches]);
    }
}
