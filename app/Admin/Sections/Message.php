<?php

namespace Train\Admin\Sections;

use AdminTemplate;
use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Message
 *
 * @property \Train\Message $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Message extends Section implements Initializable
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
    
public function initialize()
    {
        // Добавление пункта меню 
        $this->addToNavigation($priority = 500)->setTitle('Повідомлення');         
    }
    
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->setColumns([
            AdminColumn::text('name','Ім\'я'),
            AdminColumn::email('email', 'Email'),
            AdminColumn::text('text','Повідомлення'),
            AdminColumnEditable::checkbox('read','Так', 'Ні')->setLabel('Прочитано'),
            
            AdminColumn::datetime('created_at','Створено')->setFormat('Y-m-d H:i:s'),           
        ])->paginate(5);
       
       $display->getColumns()->getControlColumn()->setEditable(false); //удаляем значек редактирования
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // remove if unused
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
