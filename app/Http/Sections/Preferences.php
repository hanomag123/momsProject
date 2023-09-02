<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use AdminSection;
use App\Models\Preference;
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
 * Class Preferences
 *
 * @property \App\Providers\Preference $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Preferences extends Section implements Initializable
{
  /**
   * @var bool
   */
  protected $checkAccess = false;

  /**
   * @var string
   */
  protected $title = 'Преимущества';

  /**
   * @var string
   */
  protected $alias;

  /**
   * Initialize class.
   */
  public function initialize()
  {
    // $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
  }

  /**
   * @param array $payload
   *
   * @return DisplayInterface
   */
  public function onDisplay($payload = [])
  {
    $section = AdminSection::getModel(Preference::class);
    return $section->fireEdit(1);
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
        AdminFormElement::text('name', 'Заголовок')
          ->required(),
        AdminFormElement::html('<hr>'),


      ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
        AdminFormElement::hasManyLocal(
          'list',
          [
            AdminFormElement::text('name', 'Подзаголовок'),
            AdminFormElement::text('desc', 'Описание'),
          ],
          'Список'
        ),
      ], 'col-lg-12 three-column-draggable'),
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
