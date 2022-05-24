<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\make;
use App\Models\make_years;
use App\Models\moodel;
class MakeMakeyearsModelDropdown extends Component
{
    public $makes;
    public $makes_years;
    public $moodels;
    public $selectedmake = NULL;
    public $selectedmakeyears = NULL;

    public function mount()
    {
        $this->makes = make::all();
        $this->makes_years = collect();
        $this->moodels = collect();
    }

    public function render()
    {
        return view('livewire.make-makeyears-model-dropdown');
    }
    public function updatedSelectedMake($make)
    {
        if (!is_null($make)) {
            $this->makes_years = make_years::where('make_id', $make)->get();
        }
    }
    public function updatedSelectedMakeYears($make_years)
    {
        if (!is_null($make_years)) {
            $this->moodels = moodel::where('make_years_id', $make_years)->get();
        }
    }

}
