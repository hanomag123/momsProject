<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use AdminSection;
use App\Models\MainBlock as ModelsMainBlock;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Form\Buttons\Restore;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;

/**
 * Class MainBlock
 *
 * @property \App\Models\MainBlock $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class MainBlock extends Section implements Initializable
{
  /**
   * @var bool
   */
  protected $checkAccess = false;

  /**
   * @var string
   */
  protected $title = 'Главный блок';

  /**
   * @var string
   */
  protected $alias;

  /**
   * Initialize class.
   */
  public function initialize()
  {
    $this->addToNavigation()->setPriority(100);
  }

  public function onDisplay() {
    $id = ModelsMainBlock::firstOrCreate()->id;
    return AdminSection::getModel(ModelsMainBlock::class)->fireEdit($id);
  }

  /**
   * @param int|null $id
   * @param array $payload
   *
   * @return FormInterface
   */
  public function onEdit()
  {

    $form = AdminForm::card()->addBody([
      AdminFormElement::columns()
        ->addColumn([

          AdminFormElement::html('<h2>Рус.</h2>'),
          AdminFormElement::text('title-ru', 'Заголовок')
            ->required(),

          AdminFormElement::textarea('intro-ru', 'Описание')
            ->setHtmlAttribute('style', 'height:8rem;')
            ->required(),

        ], 'col-sm-12 col-xl-6')

        ->addColumn([

          AdminFormElement::html('<h2>Бел.</h2>'),
          AdminFormElement::text('title-by', 'Заголовок')
            ->required(),

          AdminFormElement::textarea('intro-by', 'Описание')
            ->setHtmlAttribute('style', 'height:8rem;')
            ->required(),

        ], 'col-sm-12 col-xl-6')

        ->addColumn([
          AdminFormElement::image('img', 'Главная картинка')
          ->required(),
        ])

    ]);

    return $form;
  }
}
