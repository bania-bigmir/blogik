<?php

namespace Train\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Display\Tree\OrderTreeType;


/**
 * Class Comment
 *
 * @property \Train\Comment $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Comment extends Section implements Initializable
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
    protected $title='Коментарі';

    /**
     * @var string
     */
    protected $alias;
    
    public function initialize()
    {
        // Добавление пункта меню 
        $this->addToNavigation($priority = 501)->setTitle('Коментарі'); 
                
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::tree(OrderTreeType::class);
        
        $display->with('article','user');
        $display->setValue('text');        
        $display->setParentField('parent_id');
        $display->setOrderField('id');
       //dd($display->getActions());
        
//        $display->setColumns([        
//            AdminColumn::text('name','Ім\'я'),
//            AdminColumn::text('email','Email'),
//            AdminColumn::text('articles.title','Стаття'),                      
//            AdminColumn::text('meta_desc','Мета опис'),
//            AdminColumn::datetime('created_at','Створено')->setFormat('Y-m-d H:i:s'),           
//        ])->paginate(5);
        
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
