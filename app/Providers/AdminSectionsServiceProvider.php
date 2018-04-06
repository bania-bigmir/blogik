<?php

namespace Train\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider {

    /**
     * @var array
     */
    protected $sections = [
        \Train\User::class => 'Train\Admin\Sections\Users',
        \Train\Article::class => 'Train\Admin\Sections\Article',
        \Train\Category::class => 'Train\Admin\Sections\Category',
        \Train\Comment::class => 'Train\Admin\Sections\Comment',
        \Train\Gallery::class => 'Train\Admin\Sections\Gallery',
        \Train\Filter::class => 'Train\Admin\Sections\Filter',
        \Train\Message::class => 'Train\Admin\Sections\Message',
        \Train\Index::class => 'Train\Admin\Sections\Index',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin) {
        //

        parent::boot($admin);
    }
    

}
