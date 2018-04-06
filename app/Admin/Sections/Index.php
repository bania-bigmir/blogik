<?php

namespace Train\Admin\Sections;

use AdminTemplate;
use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use \Train\ChromePhp;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
/**
 * Class Index
 *
 * @property \Index $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Index extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Головна';

    /**
     * @var string
     */
    protected $alias;
    
    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню 
        $this->addToNavigation($priority = 500)->setTitle('Головна')->setIcon('fa fa-eye');         
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        AdminColumn::text('title', 'Заголовок'),
            AdminColumn::text('text','Текст'),
            AdminColumn::datetime('updated_at', 'Оновлено')->setFormat('d-m-Y H:i'),
            ]);
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel()
            ->addBody([
                 AdminFormElement::text('title', 'Заголовок')->required(),
                 AdminFormElement::wysiwyg('text', 'Text')->required(),
                ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
