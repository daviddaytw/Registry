<?php

namespace App\View\Components;

use App\Models\Registry;
use Illuminate\View\Component;

class UseSample extends Component
{
    /**
     * The registry instance.
     */
    public Registry $registry;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($registry = new Registry)
    {
        if (! $registry->id) {
            $registry->id = 'ooooxxxx-oooo-xxxx-oooo-xxxxooooxxxx';
            $registry->write_token = '$token';
        }
        $this->registry = $registry;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.use-sample', [
            'registry' => $this->registry,
        ]);
    }
}
