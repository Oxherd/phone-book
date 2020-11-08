<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalLookupTable extends Component
{
    public $component = '';

    protected $listeners = [
        'swapModal',
    ];

    protected $lookup = [
        'contact-form',
    ];

    public function swapModal($component)
    {
        $this->component = $component;
    }

    public function render()
    {
        $component = in_array($this->component, $this->lookup) ?
        "<livewire:{$this->component} />" :
        '';

        return <<<blade
            <div>
                {$component}
            </div>
        blade;
    }
}
