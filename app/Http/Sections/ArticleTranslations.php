<?php

namespace App\Http\Sections;


use AdminForm;
use AdminFormElement;
use App\Models\ArticleTranslation;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
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
    $form = [
      AdminFormElement::text('title', 'Заголовок статьи'),
      AdminFormElement::wysiwyg('content', 'Текст статьи')->setId('content' . $id)->setEditor('ckeditor5')
        ->setParameters([
          // 'toolbar' => [ 'heading', '|', 'italic','bold', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'sourceEditing', 'image' ],
          'heading' => [
            'options' => [
              ['model' => 'paragraph', 'title' => 'Paragraph', 'class' => 'ck-heading_paragraph'],
              ['model' => 'heading1', 'view' => 'h1', 'title' => 'Heading 1', 'class' => 'ck-heading_heading1'],
              ['model' => 'heading2', 'view' => 'h2', 'title' => 'Heading 2', 'class' => 'ck-heading_heading2'],
              ['model' => 'heading3', 'view' => 'h3', 'title' => 'Heading 3', 'class' => 'ck-heading_heading3'],
              ['model' => 'heading4', 'view' => 'h4', 'title' => 'Heading 4', 'class' => 'ck-heading_heading4'],
              [
                'model' => 'headingFancy',
                'view' => [
                  'name' => 'h2',
                  'classes' => 'fancy'
                ],
                'title' => 'Heading 2 (fancy)',
                'class' => 'ck-heading_heading2_fancy',

                // It needs to be converted before the standard 'heading2'.
                'converterPriority' => 'high'
              ]
            ]
          ]
        ]),
    ];

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
