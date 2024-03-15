<?php

namespace App\View\Components;

use App\Models\Documents;
use App\Models\Nasabah;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     */
    public $showNamaFile;
    public function __construct($showNamaFile)
    {
      $this->showNamaFile = $showNamaFile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      $showNamaFile = Documents::orderBy('NamaFile')->get();
      return view('components.filter', compact($showNamaFile));
    }
}
