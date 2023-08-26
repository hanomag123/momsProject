<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use App\Models\Locale;
use App\Models\MainBlock;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\FormElements;

/**
 * Class MainBlock
 *
 * @property \App\Models\MainBlock $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class MainBlocks extends Section implements Initializable
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
  }

  public function onDisplay()
  {

    $tabs = AdminDisplay::tabbed();
    $languages = Locale::all();

    foreach($languages as $language) {
      $item = MainBlock::firstOrCreate(['locale_id' => $language->id]);
      AdminSection::getModel(MainBlock::class)->setModelValue($item);
      $section = AdminSection::getModel(MainBlock::class);
      $forms[] = $section->fireEdit($item->id);
      $tabs->appendTab(new FormElements($forms), $language->name);
      $forms = [];
    }

    return $tabs;

  }

  /**
   * @param int|null $id
   * @param array $payload
   *
   * @return FormInterface
   */
  public function onEdit()
  {

    $formVisual = AdminForm::form()->addElement(
      new FormElements([
        AdminFormElement::text('title', 'Заголовок')
          ->required(),

        AdminFormElement::textarea('intro', 'Описание')
          ->setHtmlAttribute('style', 'height:8rem;')
          ->required(),

        AdminFormElement::image('image.url', 'картинка')->required(),
      ])
    );




    return $formVisual;
  }
}
