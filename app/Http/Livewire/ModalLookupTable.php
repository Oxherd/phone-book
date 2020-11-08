<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalLookupTable extends Component
{
    public $component = '';
    public $payload;

    protected $listeners = [
        'swapModal',
    ];

    protected $lookup = [
        'contact-form',
    ];

    public function swapModal($component, $payload = null)
    {
        $this->component = $component;
        $this->payload = $payload;
    }

    public function render()
    {
        if (!in_array($this->component, $this->lookup)) {
            return <<<blade
                <div>
                    There is nothing to display.
                </div>
            blade;
        }

        return <<<blade
            <div>
                @livewire("{$this->component}", {$this->payload})
            </div>
        blade;
    }
}
