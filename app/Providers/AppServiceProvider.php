<?php

namespace App\Providers;

use App\Admin\Admin;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(191);

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add(
                [
                    'text' => 'Dashbaord',
                    'url' => route('admin.dashboard'),
                    'icon' => 'dashboard',
                ]);

            $event->menu->add(
                [
                    'text' => 'Packages',
                    'url' => route('admin.packages.index'),
                    'icon' => 'cubes',
                ]);

            $event->menu->add(
                [
                    'text' => 'Users Management',
                    'url' => route('admin.users.index'),
                    'icon' => 'user',
                    'submenu' => [
                        [
                            'text' => 'All Users',
                            'url' => route('admin.users.index'),
                            'icon' => 'user',
                        ],
                        [
                            'text' => 'Pending Users',
                            'url' => route('admin.users.pendingApproval'),
                            'icon' => 'user',
                        ],
                    ],
                ]);

            $event->menu->add(
                [
                    'text' => 'User Reports',
                    'url' => route('admin.userReports.index'),
                    'icon' => 'ban'
                ]);
           

            $event->menu->add(
                [
                    'text' => 'Package Purchases',
                    'url' => route('admin.purchaseMgt.index'),
                    'icon' => 'user',
                    'submenu' => [
                        [
                            'text' => 'Pending Package Purchases',
                            'url' => route('admin.purchaseMgt.index'),
                            'icon' => 'shopping-bag',
                        ],
                        [
                            'text' => 'Approved Package Purchases',
                            'url' => route('admin.purchaseMgt.approved'),
                            'icon' => 'check',
                        ],
                        [
                            'text' => 'Canceled Package Purchases',
                            'url' => route('admin.purchaseMgt.canceled'),
                            'icon' => 'ban',
                        ],
                    ],
                ]
            );

            if ((Admin::find(Auth::guard('admin')->user()->id))->admin_type === 1) {

                $event->menu->add(
                    [
                        'text' => 'Admin Management',
                        'url' => route('admin.adminMgt.index'),
                        'icon' => 'audio-description',
                        'submenu' => [
                            [
                                'text' => 'All Admins',
                                'url' => route('admin.adminMgt.index'),
                                'icon' => 'desktop',
                            ],
                            [
                                'text' => 'Add New Admin',
                                'url' => route('admin.adminMgt.create'),
                                'icon' => 'plus',
                            ],
                        ],
                    ]
                );

            }
            $event->menu->add(
                [
                    'text' => 'Add Agent to User',
                    'url' => route('admin.userAgent.addUserAgent'),
                    'icon' => 'magnet',
                ]

            );
            $event->menu->add(
                [
                    'text' => 'User Agent Requests',
                    'url' => route('admin.userAgentRequest.index'),
                    'icon' => 'user-secret',
                ]

            );

            $event->menu->add(
                [
                    'text' => 'Diary',
                    'url' => route('admin.diary.index'),
                    'icon' => 'audio-description',
                    'submenu' => [
                        [
                            'text' => 'All Diary Entries',
                            'url' => route('admin.diary.index'),
                            'icon' => 'book',
                        ],
                        [
                            'text' => 'Add New Diary',
                            'url' => route('admin.diary.create'),
                            'icon' => 'plus',
                        ],
                    ],
                ]
            );
            $event->menu->add(
                [
                    'text' => 'Contact Messages',
                    'url' => route('admin.contactus.index'),
                    'icon' => 'envelope'
                ]);
            $event->menu->add(
                [
                    'text' => 'My Account',
                    'url' => route('admin.adminAccount.index'),
                    'icon' => 'audio-description',
                    'submenu' => [
                        [
                            'text' => 'View My Profile',
                            'url' => route('admin.adminAccount.index'),
                            'icon' => 'book',
                        ],
                        [
                            'text' => 'Edit My Profile',
                            'url' => route('admin.adminAccount.edit'),
                            'icon' => 'edit',
                        ],
                    ],
                ]
            );

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
