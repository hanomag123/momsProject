<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use AdminSection;
use App\Models\ArticleTranslation;
use App\Models\Language;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Form\FormElements;

/**
 * Class ArticleTranslations
 *
 * @property \App\Models\ArticleTranslation $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class ArticleTranslations extends Section implements Initializable
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
   * @param int|null $id
   * @param array $payload
   *
   * @return FormInterface
   */
  public function onEdit($id, $payload)
  {
    $form = [];

    if (isset($payload['language_id'])) {
      $form = [
        AdminFormElement::text('language_id')
          ->setDefaultValue($payload['language_id'])
          ->setReadonly(true)
          ->setHtmlAttribute('hidden', true),
        AdminFormElement::text('title', 'Заголовок статьи'),
        AdminFormElement::wysiwyg('content', 'Текст статьи')
        ->setId('content' . $payload['language_id'])
      ];
    }

    $formVisual = AdminForm::form()->addElement(
      new FormElements($form)
    );

    $formVisual->getButtons()->setButtons([
      'save'  => new Save(),
      'save and close'  => new SaveAndClose(),
    ]);

    return $formVisual;
  }
}
