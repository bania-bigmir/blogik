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
        $this->addToNavigation($priority = 500)->setTitle('Статті');         
    }
    
 
    
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
         $display = AdminDisplay::datatables();
        $display->with('user','category','comments');
//        $display->setFilters(
//            AdminDisplayFilter::related('created_at')->setModel(Country::class)
//        );
       // dd($display);
        $display->setColumns([
            AdminColumn::link('title','Заголовок'),
            AdminColumn::text('desc','Опис'),
            AdminColumn::text('category.title','Категорія'),
            AdminColumn::image('img', 'Зображення'),
            AdminColumn::text('alias','Alias'),
            AdminColumn::text('keywords','Ключові слова'),            
            AdminColumn::text('meta_desc','Мета опис'),
            AdminColumn::datetime('created_at','Створено')->setFormat('Y-m-d H:i:s'),           
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
                AdminFormElement::date('created_at', 'Створено')->required()->setFormat('Y-m-d H:i:s'),
                AdminFormElement::text('desc', 'Опис')->required(),
                AdminFormElement::wysiwyg('text', 'Text'),
                AdminFormElement::text('keywords','Ключові слова'),
                AdminFormElement::text('meta_desc','Мета опис'), 
                AdminFormElement::text('alias','Alias'),
                AdminFormElement::image('img', 'Зображення'),
                AdminFormElement::select('category_id', 'Категорія', \Train\Category::class)->setDisplay('title'),
                
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
