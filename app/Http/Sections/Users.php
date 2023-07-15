<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminColumnEditable;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
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
 * Class Users
 *
 * @property \App\Models\User $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Users extends Section implements Initializable
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
    $this->addToNavigation()->setPriority(100)->setIcon('fa fa-user')->setTitle('Пользователи');
  }

  /**
   * @param array $payload
   *
   * @return DisplayInterface
   */
  public function onDisplay($payload = [])
  {
    $columns = [
      AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
      AdminColumn::image('image', 'Фото')->setWidth('80px')->setHtmlAttribute('class', 'img-circle'),
      AdminColumnEditable::text('name', 'Имя', 'created_at')
        ->setSearchCallback(function ($column, $query, $search) {
          return $query
            ->orWhere('name', 'like', '%' . $search . '%');
        }),
      AdminColumn::email('email', 'Электронная почта'),
      AdminColumn::boolean('isAdmin', 'Админ'),
      AdminColumn::datetime('updated_at', ' Дата обновления')
        ->setWidth('160px')
        ->setSearchable(false),
    ];

    $display = AdminDisplay::datatables()
      ->setName('firstdatatables')
      ->setOrder([[0, 'asc']])
      ->setDisplaySearch(true)
      ->paginate(25)
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-primary table-hover');

    $display->setColumnFilters([
      AdminColumnFilter::select()
        ->setModelForOptions(\App\Models\User::class, 'name')
        ->setLoadOptionsQueryPreparer(function ($element, $query) {
          return $query;
        })
        ->setDisplay('name')
        ->setColumnName('id')
        ->setPlaceholder('Выбрать имя'),
    ]);
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
        AdminFormElement::image('image', 'Фото'),
        AdminFormElement::html('<hr>'),

      ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
        AdminFormElement::text('email', 'Электронная почта')
          ->required()->addValidationRule('email'),
        AdminFormElement::html('<hr>'),
        AdminFormElement::datetime('created_at', "Дата создания")
          ->setVisible(true)
          ->setReadonly(true),
        AdminFormElement::text('id', 'ID')->setReadonly(true),
      ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
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
    return true;
  }

  /**
   * @return void
   */
  public function onRestore($id)
  {
    // remove if unused
  }
}
