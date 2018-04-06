<?php

namespace Train\Admin\Sections;


use AdminTemplate;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
/**
 * Class Article
 *
 * @property \Train\Article $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Article extends Section implements Initializable
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
    protected $title='Статті';

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
        $this->addToNavigation($priority = 500)->setTitle('Статті')->setIcon('fa fa-pencil');         
    }
    
 
    
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        
         $display = AdminDisplay::datatables();
        $display->with('user','category','comments');


        $display->setColumns([
            AdminColumn::link('title','Заголовок'),
            AdminColumn::text('desc','Опис'),
            AdminColumn::text('category.title','Категорія'),
            AdminColumn::image('img', 'Зображення'),
            AdminColumn::text('alias','Alias'),
            AdminColumn::text('keywords','Ключові слова'),            
            AdminColumn::text('meta_desc','Мета опис'),
            AdminColumn::datetime('created_at','Створено')->setFormat('d-m-Y H:i:s'),           
        ])->paginate(5);
        
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
                AdminFormElement::date('created_at', 'Створено')->required()->setFormat('d-m-Y H:i:s'),
                AdminFormElement::text('desc', 'Опис')->required(),
                AdminFormElement::wysiwyg('text', 'Text')->required(),
                AdminFormElement::text('keywords','Ключові слова')->required(),
                AdminFormElement::text('meta_desc','Мета опис')->required(), 
                AdminFormElement::text('alias','Alias')->required(),
                AdminFormElement::upload('upload_image', 'Зображення'),

                AdminFormElement::select('category_id', 'Категорія', \Train\Category::class)->setDisplay('title')->required(),
                
            ])->setHtmlAttribute('enctype', 'multipart/form-data');

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
