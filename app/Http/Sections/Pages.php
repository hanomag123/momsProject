<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Facades\Form;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Form\FormElements;

/**
 * Class Pages
 *
 * @property \App\Models\Page $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Pages extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Страницы";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-file');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($id = null,$payload = [])
    {
      $fistColumnFields = [];
      if ($id !== null) {
        $fistColumnFields[] = AdminFormElement::text('id', 'ID')->setReadonly(true);
      }
      $fistColumnFields = array_merge($fistColumnFields, [
        AdminFormElement::text('title', 'Заголовок')
          ->required(),
          AdminFormElement::text('slug', 'Псевдоник')
          ->required(),
        AdminFormElement::html('<hr>'),
      ]);
      $form = new FormElements(
        [
          AdminFormElement::columns()
            ->addColumn(
              $fistColumnFields,
              'col-xs-12 col-sm-6 col-md-4 col-lg-4'
            )
        ]
      );
  
      $tabs = AdminDisplay::tabbed();
      $tabs->appendTab($form, 'Основные');
  
      // добавляем форму-вкладку для SEO полей
  
      $seoForm = new FormElements([
        AdminFormElement::text('meta_title', 'Тег &#60;title&#62;'),
        AdminFormElement::text('meta_description', 'Поисковый сниппет'),
        AdminFormElement::text('meta_keywords', 'Ключевые слова'),
      ]);
      $tabs->appendTab($seoForm, 'SEO');
  
      $panel = Form::panel();
      $panel->addElement($tabs);
      return $panel;
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
                AdminFormElement::text('name', 'Name')
                    ->required()
                ,
                AdminFormElement::html('<hr>'),
                AdminFormElement::datetime('created_at')
                    ->setVisible(true)
                    ->setReadonly(false)
                ,
                AdminFormElement::html('last AdminFormElement without comma')
            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                AdminFormElement::text('id', 'ID')->setReadonly(true),
                AdminFormElement::html('last AdminFormElement without comma')
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
