<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\MainBlock;
use App\Models\Page;
use App\Models\User;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

  /**
   * @var array
   */
  protected $sections = [
    User::class => 'App\Http\Sections\Users',
    MainBlock::class => 'App\Http\Sections\MainBlocks',
    Language::class => 'App\Http\Sections\Languages',
  ];

  protected $widgets = [
    \Admin\Widgets\NavigationUserBlock::class,
  ];

  /**
   * Register sections.
   *
   * @param \SleepingOwl\Admin\Admin $admin
   * @return void
   */
  public function boot(\SleepingOwl\Admin\Admin $admin)
  {
    parent::boot($admin);
    $this->app->call([$this, 'registerViews']);
  }

  /**
   * @param WidgetsRegistryInterface $widgetsRegistry
   */
  public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
  {
    foreach ($this->widgets as $widget) {
      $widgetsRegistry->registerWidget($widget);
    }
  }
}
