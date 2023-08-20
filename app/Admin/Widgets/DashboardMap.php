<?php

namespace Admin\Widgets;

use AdminTemplate;
use App\Models\Form;
use SleepingOwl\Admin\Widgets\Widget;

class DashboardMap extends Widget
{

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
      $messages = Form::count();
        return view('dashboard', compact('messages'));
    }

    /**
     * @return string|array
     */
    public function template()
    {
        return AdminTemplate::getViewPath('dashboard');
    }

    /**
     * @return string
     */
    public function block()
    {
        return 'block.top';
    }
}