<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Form;
use App\Models\Locale;
use App\Models\MainBlock;
use App\Models\Page;
use App\Models\Preference;
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
    Preference::class => 'App\Http\Sections\Preferences',
    Locale::class => 'App\Http\Sections\Locales',
    Article::class => 'App\Http\Sections\Articles',
    Form::class => 'App\Http\Sections\Forms',
    Page::class => 'App\Http\Sections\Pages',
  ];

  protected $widgets = [
    \Admin\Widgets\DashboardMap::class,
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
