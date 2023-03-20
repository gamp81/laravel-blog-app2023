<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
  /**
   * The theme type;
   * 
   * @var string
   */
  public string $theme;

  public string $active;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(string $theme)
  {
    $segment = request()->segment(1);
    $this->active =  $segment === null ? 'home' : $segment;
    $this->theme = $theme;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.navbar');
  }
}
