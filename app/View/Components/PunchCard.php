<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use App\Models\Punch;

class PunchCard extends Component
{

    public $name;
    public $orderNum;
    public $year;
    public $products;
    public $materials;
    public $machines;
    public $sizeLength;
    public $sizeWidth;
    public $sizeHeight;
    public $knifeSizeLength;
    public $knifeSizeWidth;
    public $pics;

    /**
     * Undocumented function
     *
     * @param Punch $punch
     */
    public function __construct(Punch $punch)
    {
        $this->name = $punch->name;
        $this->orderNum = $punch->ordernum;
        $this->year = $punch->year;
        $this->products = $punch->products->implode('value', ', ');
        $this->materials = $punch->materials->implode('value', ', ');
        $this->machines = $punch->machines->implode('value', ', ');
        $this->sizeLength = $punch->size_length;
        $this->sizeWidth = $punch->size_width;
        $this->sizeHeight = $punch->size_height;
        $this->knifeSizeLength = $punch->knife_size_length;
        $this->knifeSizeWidth = $punch->knife_size_width;
        $this->pics = $punch->pics;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.punch-card');
    }
}
