<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use AdminNavigation;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;

/**
 * Class Languages
 *
 * @property \App\Models\Language $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Languages extends Section implements Initializable
{
  /**
   * @var bool
   */
  protected $checkAccess = false;

  /**
   * @var string
   */
  protected $title;

  /**
   * @var string
   */
  protected $alias;

  /**
   * Initialize class.
   */
  public function initialize()
  {
    
  }

  /**
   * @param array $payload
   *
   * @return DisplayInterface
   */
  public function onDisplay($payload = [])
  {
    $columns = [
      AdminColumn::text('id', '#')->setWidth('10%'),
      AdminColumn::link('name', 'Название', 'created_at')->setWidth('60%')
    ];

    $display = AdminDisplay::datatables()
      ->setName('firstdatatables')
      ->setOrder([[0, 'asc']])
      ->setDisplaySearch(false)
      ->paginate(25)
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-primary table-hover');

    $display->getColumnFilters()->setPlacement('card.heading');

    return $display;
  }

    /**
   * @param int|null $id
   * @param array $payload
   *
   * @return FormInterface
   */

   public function onEdit($id = null, $payload = [])
   {
     $form = AdminForm::card()->addBody([
       AdminFormElement::columns()->addColumn([
         AdminFormElement::text('name', 'Имя')
           ->required(),
       ])
     ]);
 
     $form->getButtons()->setButtons([
       'save'  => new Save(),
       'save_and_close'  => new SaveAndClose(),
       'save_and_create'  => new SaveAndCreate(),
       'cancel'  => (new Cancel()),
     ]);
 
     return $form;
   }

  /**
   * @return FormInterface
   */
  public function onCreate($payload = [])
  {
    return $this->onEdit(null, $payload);
  }

  /**
   * @return bool
   */
  public function isDeletable(Model $model)
  {
    return false;
  }

  /**
   * @return void
   */
  public function onRestore($id)
  {
    // remove if unused
  }
}
