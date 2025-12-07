<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDropdown extends Component
{
    public $users;
    public $selected;

    /**
     * Create a new component instance.
     */
    public function __construct($users = [], $selected = [])
    {
        $this->users = $users;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-dropdown');
    }
}
