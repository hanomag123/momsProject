<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use AdminSection;
use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Language;
use App\Models\MainBlock;
use App\Models\User;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Facades\FormElement;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Form\FormElements;

/**
 * Class Articles
 *
 * @property \App\Model\Article $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Articles extends Section implements Initializable
{
  /**
   * @var bool
   */
  protected $checkAccess = false;

  /**
   * @var string
   */
  protected $title = 'Новости';

  /**
   * @var string
   */
  protected $alias;

  /**
   * Initialize class.
   */
  public function initialize()
  {
    $this->addToNavigation()->setPriority(100)->setIcon('fa fa-newspaper');
  }

  /**
   * @param array $payload
   *
   * @return DisplayInterface
   */
  public function onDisplay($payload = [])
  {
    $columns = [
      AdminColumn::text('id', '#')->setWidth('100px')->setHtmlAttribute('class', 'text-center'),
      AdminColumn::image('image', 'Картинка'),
      AdminColumn::lists('articleTranslations.title', 'Названия'),
      AdminColumn::text('created_at', 'Created / updated', 'updated_at')
        ->setWidth('160px')
        ->setOrderable(function ($query, $direction) {
          $query->orderBy('updated_at', $direction);
        })
        ->setSearchable(false),
    ];

    $display = AdminDisplay::datatables()
      ->setName('firstdatatables')
      ->with('articleTranslations')
      ->setOrder([[0, 'asc']])
      ->paginate(25)
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-primary table-hover');

    $display->setColumnFilters([
      AdminColumnFilter::range()->setFrom(
        AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('d.m.Y')
      )->setTo(
        AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('d.m.Y')
      )->setColumnName('id'),

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
  public function onEdit($id)
  {

    $display = AdminDisplay::tabbed();
    $display->setTabs(function () use ($id) {
      $tabs = [];

      $form = AdminForm::form();
      $form->setElements([
        AdminFormElement::text('id', 'id')->setReadonly(true),
        AdminFormElement::image('image', 'Главная картинка'),
      ]);

      $form->getButtons()->setButtons([
        'save'  => new Save(),
        'save_and_close'  => new SaveAndClose(),
        'cancel'  => (new Cancel()),
      ]);

      $tabs[] = AdminDisplay::tab($form)->setLabel("Основные сведения");

      if (!is_null($id)) {
        $languages = Language::all();
        foreach ($languages as $language) {
          $item = ArticleTranslation::firstOrCreate([
            'language_id' => $language->id,
            'article_id' => $id,
          ]);
          AdminSection::getModel(ArticleTranslation::class)->setModelValue($item);
          $section = AdminSection::getModel(ArticleTranslation::class);
          $forms[] = $section->fireEdit($item->id, ['language_id' => $language->id]);
          $tabs[] = AdminDisplay::tab(new FormElements($forms), $language->name);
          $forms = [];
        }
      }
      return $tabs;
    });




    return $display;
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
