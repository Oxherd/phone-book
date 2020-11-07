<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalLookupTable extends Component
{
    public $component = 'create-new-contact';

    protected $listeners = [
        'swapModal',
    ];

    protected $table = [
        'create-new-contact',
    ];

    public function swapModal($component)
    {
        $this->component = $component;
    }

    public function render()
    {
        $component = in_array($this->component, $this->table) ?
        "<livewire:{$this->component} />" :
        '';

        return <<<blade
            <div>
                {$component}
            </div>
        blade;
    }
}
