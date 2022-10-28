<?php

namespace App\View\Components;

use Illuminate\View\Component;
// use App\Models\Punch;
use Facades\App\Http\Controllers\PunchController;

class CardsWrapper extends Component
{

    public $punches;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->punches = Punch::with('products', 'machines', 'materials', 'pics')->get();
        $this->punches = PunchController::index();
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
