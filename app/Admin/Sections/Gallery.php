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
 * Class Gallery
 *
 * @property \Train\Gallery $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Gallery extends Section implements Initializable
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
        $this->addToNavigation($priority = 500)->setTitle('Галереї')->setIcon('fa fa-pencil');         
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->with('photo','filters');

        
        $display->setColumns([
            AdminColumn::text('name','Назва'),
            AdminColumn::text('description','Опис'),
            AdminColumn::text('alias','Alias'),
            AdminColumn::image('preview', 'Прев\'ю'),
            AdminColumnEditable::checkbox('active','Так', 'Ні')->setLabel('Опубліковано'), 
            AdminColumn::lists('filters.name','Фільтри'),
            AdminColumn::text('keywords','Ключові слова'),            
            AdminColumn::text('meta_desc','Мета опис'),
            AdminColumn::datetime('created_at','Створено')->setFormat('Y-m-d H:i:s'),           
        ])->paginate(8);
        
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        
       // dd($this->model->photo()->pluck('id'));
        
        
      $form = AdminForm::panel()
            ->addBody([
                            
                AdminFormElement::text('name', 'Заголовок')->required(),
                
                AdminFormElement::text('description', 'Опис')->required(),
                AdminFormElement::text('alias','Alias')->required(),
                AdminFormElement::multiselect('filters.name','Фільтри'),
                AdminFormElement::text('keywords','Ключові слова')->required(),
                AdminFormElement::text('meta_desc','Мета опис')->required(), 
                
                AdminFormElement::images('photo.url', 'Зображення')->required(),

                
                
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
