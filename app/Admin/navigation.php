<?php

use App\Http\Sections\MainBlocks;
use App\Models\Locale;
use App\Models\MainBlock;
use App\Models\Preference;
use App\Models\User;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)


// AdminSection::registerModel(User::class, function (ModelConfiguration $model) { 
// Запрет на просмотр
// $model->disableDisplay();

// Запрет на создание
// $model->disableCreating();

// Запрет на редактирование
// $model->disableEditing();

// Запрет на удаление
// $model->disableDeleting();


// Запрет на восстановление
// $model->disableRestoring();
// });

// AdminNavigation::setFromArray([
//   [
//      'title' => 'Permissions',
//      'icon' => 'fa fa-group',
//      'pages' => [
//        [
//           'title' => 'Users',
//           'url' => ...
//        ],
//        [
//           'title' => 'Roles',
//           'url' => ...
//        ],
//      ]
//    ],
//    (new \SleepingOwl\Admin\Navigation\Page(\App\Model\News::class))
//       ->setIcon('fa fa-newspaper-o')
//       ->setPriority(0)
// ]);

AdminNavigation::setFromArray([
  [



    'title' => 'Главная',
    'pages' => [
      (new Page(MainBlock::class))
        ->setTitle('Главный блок')
        ->setPriority(0),
      (new Page(Preference::class))
        ->setTitle('Преимущества')
        ->setPriority(0),
    ]



  ],
  [
    'title' => 'Дополнительно',
    'icon'  => 'fas fa-info-circle',
    'pages' => [

      [
        'title' => 'Информация',
        'url'   => route('admin.information'),
      ],

      (new Page(Locale::class))
        ->setTitle('Языки')
        ->setPriority(0),
    ]
  ],
  [
    'title' => 'Панель',
    'icon'  => 'fas fa-tachometer-alt',
    'url'   => route('admin.dashboard'),
    'priority' => '0',
  ],
]);


// return [
//   'title' => 'Permissions',
//   'icon' => 'fa fa-group',
//   'pages' => [
//     [
//       'title' => 'Панель',
//       'icon'  => 'fas fa-tachometer-alt',
//       'url'   => route('admin.dashboard'),
//       'priority' => '0',
//     ],

//     [
//       'title' => 'Информация',
//       'icon'  => 'fas fa-info-circle',
//       'url'   => route('admin.information'),
//     ],
//   ]


//   // Examples
//   // [
//   //    'title' => 'Content',
//   //    'pages' => [
//   //
//   //        \App\User::class,
//   //
//   //        // or
//   //
//   //        (new Page(\App\User::class))
//   //            ->setPriority(100)
//   //            ->setIcon('fas fa-users')
//   //            ->setUrl('users')
//   //            ->setAccessLogic(function (Page $page) {
//   //                return auth()->user()->isSuperAdmin();
//   //            }),
//   //
//   //        // or
//   //
//   //        new Page([
//   //            'title'    => 'News',
//   //            'priority' => 200,
//   //            'model'    => \App\News::class
//   //        ]),
//   //
//   //        // or
//   //        (new Page(/* ... */))->setPages(function (Page $page) {
//   //            $page->addPage([
//   //                'title'    => 'Blog',
//   //                'priority' => 100,
//   //                'model'    => \App\Blog::class
//   //		      ));
//   //
//   //		      $page->addPage(\App\Blog::class);
//   //	      }),
//   //
//   //        // or
//   //
//   //        [
//   //            'title'       => 'News',
//   //            'priority'    => 300,
//   //            'accessLogic' => function ($page) {
//   //                return $page->isActive();
//   //		      },
//   //            'pages'       => [
//   //
//   //                // ...
//   //
//   //            ]
//   //        ]
//   //    ]
//   // ]
// ];
