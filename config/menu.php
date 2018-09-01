<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

//Menu::macro('fullsubmenuexample', function () {
//    return Menu::new()->prepend('<a href="#"><span> Multilevel PROVA </span> <i class="fa fa-angle-left pull-right"></i></a>')
//        ->addParentClass('treeview')
//        ->add(Link::to('/link1prova', 'Link1 prova'))->addClass('treeview-menu')
//        ->add(Link::to('/link2prova', 'Link2 prova'))->addClass('treeview-menu')
//        ->url('http://www.google.com', 'Google');
//});

Menu::macro('adminlteSubmenu', function ($submenuName) {
    return Menu::new()->prepend('<a href="#"><span> ' . $submenuName . '</span> <i class="fa fa-angle-left pull-right"></i></a>')
        ->addParentClass('treeview')->addClass('treeview-menu');
});
Menu::macro('adminlteMenu', function () {
    return Menu::new()
        ->addClass('sidebar-menu');
});
Menu::macro('adminlteSeparator', function ($title) {
    return Html::raw($title)->addParentClass('header');
});

Menu::macro('adminlteDefaultMenu', function ($content) {
    return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
});

// default menu
Menu::macro('sidebar_def', function () {
    return Menu::adminlteMenu()
        ->add(Html::raw('HEADER')->addParentClass('header'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Home</span>')
        //->link('http://www.acacha.org', Menu::adminlteDefaultMenu('Another link'))
//        ->url('http://www.google.com', 'Google')
       // ->add(Menu::adminlteSeparator('Acacha Adminlte'))
        #adminlte_menu
       // ->add(Menu::adminlteSeparator('SECONDARY MENU'))
//        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-share"></i><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>')
//            ->addParentClass('treeview')
//            ->add(Link::to('/link1', 'Link1'))->addClass('treeview-menu')
//            ->add(Link::to('/link2', 'Link2'))
//            ->url('http://www.google.com', 'Google')
//            ->add(Menu::new()->prepend('<a href="#"><span>Multilevel 2</span> <i class="fa fa-angle-left pull-right"></i></a>')
//                ->addParentClass('treeview')
//                ->add(Link::to('/link21', 'Link21'))->addClass('treeview-menu')
//                ->add(Link::to('/link22', 'Link22'))
//                ->url('http://www.google.com', 'Google')
//            )
//        )
//        ->add(
//            Menu::fullsubmenuexample()
//        )
//        ->add(
//            Menu::adminlteSubmenu('Best menu')
//                ->add(Link::to('/acacha', 'acacha'))
//                ->add(Link::to('/profile', 'Profile'))
//                ->url('http://www.google.com', 'Google')
//        )

        ->add(Link::toUrl('analytics', '<i class="fa fa-bar-chart"></i><span>Analytics</span>'))

        ->setActiveFromRequest();
});

Menu::macro('sidebar', function () {


    return Menu::adminlteMenu()
        ->add(Html::raw('PROMOTION NEXTDOOR VENDOR')->addParentClass('header'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Home</span>')

        ->add(Link::toUrl(route('profile.edit' , Auth::user()->id), '<i class="fa fa-user"></i><span>Profile</span>'))

        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-tasks"></i><span>Promotion</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to(route('promotion.create'), 'Add'))->addClass('treeview-menu')
            ->add(Link::to(route('promotion.index'), 'View'))
        )


        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-tasks"></i><span>Location</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to(route('location.create'), 'Add'))->addClass('treeview-menu')
            ->add(Link::to(route('location.index'), 'View'))
        )

        ->add(Link::toUrl('trash/promotions', '<i class="fa fa-trash"></i><span>Trash</span>'))

        ->add(Link::toUrl('analytic', '<i class="fa fa-bar-chart"></i><span>Analytics</span>'))

        ->add(Link::toUrl('contact', '<i class="fa fa-user"></i><span>Contact</span>'))

        ->setActiveFromRequest();
});


Menu::macro('sidebar_admin', function () {


    return Menu::adminlteMenu()
        ->add(Html::raw('PROMOTION NEXTDOOR ADMIN')->addParentClass('header'))
        ->action('AdminController@index', '<i class="fa fa-home"></i><span>Home</span>')

        ->add(Link::toUrl(route('user.index'), '<i class="fa fa-bar-chart"></i><span>Vendors</span>'))


        ->add(Link::toUrl(route('admin.promotion.index'), '<i class="fa fa-bar-chart"></i><span>Promotion</span>'))

        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-tasks"></i><span>Category</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to(route('category.create'), 'Add'))->addClass('treeview-menu')
            ->add(Link::to(route('category.index'), 'View'))
        )

        ->add(Menu::new()->prepend('<a href="#"><i class="fa fa-tasks"></i><span>Subcategory</span> <i class="fa fa-angle-left pull-right"></i></a>')
            ->addParentClass('treeview')
            ->add(Link::to(route('subcategory.create'), 'Add'))->addClass('treeview-menu')
            ->add(Link::to(route('subcategory.index'), 'View'))
        )

//        ->add(Link::toUrl('analytics', '<i class="fa fa-bar-chart"></i><span>Analytics</span>'))
//
//        ->add(Link::toUrl('location', '<i class="fa fa-map-marker"></i><span>Location</span>'))



        ->setActiveFromRequest();

});