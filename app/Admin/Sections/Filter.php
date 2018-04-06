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
 * Class Filter
 *
 * @property \Train\Filter $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Filter extends Section implements Initializable
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
    protected $title;

    /**
     * @var string
     */
    protected $alias;
    
    public function initialize() {
        // Добавление пункта меню 
        $this->addToNavigation($priority = 500)->setTitle('Фільтри')->setIcon('fa fa-filter');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->setColumns([
            AdminColumn::text('name', 'Назва'),
            AdminColumn::datetime('created_at','Створено')->setFormat('Y-m-d H:i:s'),
            
            ])->paginate(10);

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
                            AdminFormElement::text('name', 'Назва')->required(),
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
