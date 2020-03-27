<?php
    $menus = [];
    $menus[] = [
        'type' => 'header',
        'label' => 'MAIN NAVIGATION',
    ];

    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-dashboard"></i>',
        'label' => 'Dashboard',
        'link' => ''
    ];

    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-user"></i>',
        'label' => 'Users',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách thành viên',
                'link' => $this->Url->build([
                    'controller' => 'Users',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm thành viên',
                'link' => $this->Url->build([
                    'controller' => 'Users',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ]
        ]
    ];
    
    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-product-hunt"></i>',
        'label' => 'Products',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách sản phẩm',
                'link' => $this->Url->build([
                            'controller' => 'Products',
                            'action' => 'index',
                            'prefix' => 'admin',
                        ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm sản phẩm',
                'link' => $this->Url->build([
                            'controller' => 'Products',
                            'action' => 'add',
                            'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'List Categories',
                'link' => $this->Url->build([
                    'controller' => 'Categories',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm Category',
                'link' => $this->Url->build([
                    'controller' => 'Categories',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ]
        
        ]
    ];

    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-user"></i>',
        'label' => 'Permission',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách phân quyền',
                'link' => $this->Url->build([
                    'controller' => 'ListPermissions',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm quyền',
                'link' => $this->Url->build([
                    'controller' => 'ListPermissions',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
                
            ]
        
        ]
    ];

    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-user"></i>',
        'label' => 'Group Users',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách nhóm',
                'link' => $this->Url->build([
                    'controller' => 'Groups',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm nhóm Users',
                'link' => $this->Url->build([
                    'controller' => 'Groups',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ]
        ]
    ];


    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-shopping-cart"></i>',
        'label' => 'Purchase Order',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'List Order',
                'link' => $this->Url->build([
                    'controller' => 'Orders',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm Order',
                'link' => $this->Url->build([
                    'controller' => 'Orders',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Chi tiết đơn hàng',
                'link' => $this->Url->build([
                    'controller' => 'OrdersProducts',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'List Coupon',
                'link' => $this->Url->build([
                    'controller' => 'Coupons',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ]
        ]
    ];



    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-file"></i>',
        'label' => 'Pages',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách các trang',
                'link' => $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm trang',
                'link' => $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ]
        ]
    ];


    $menus[] = [
        'type' => 'link',
        'icon' => '<i class="fa fa-cogs"></i>',
        'label' => 'Configs',
        'link' => '#',
        'child' => [
            [
                'type' => 'link',
                'label' => 'Danh sách cấu hình',
                'link' => $this->Url->build([
                    'controller' => 'Configs',
                    'action' => 'index',
                    'prefix' => 'admin',
                ])
            ],
            [
                'type' => 'link',
                'label' => 'Thêm cấu hình',
                'link' => $this->Url->build([
                    'controller' => 'Configs',
                    'action' => 'add',
                    'prefix' => 'admin',
                ])
            ]
        ]
    ];

?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?php if (isset($menus) && $menus): ?>
            <ul class="sidebar-menu" data-widget="tree">
                <?php foreach ($menus as $key => $menu): ?>
                    <?php if (isset($menu['type'])): ?>
                        <?php if ($menu['type'] == 'header'): ?>
            
                          <li class="header"><?= (isset($menu['label']) ? $menu['label'] : ''); ?></li>
            
                            <?php elseif($menu['type'] == 'link'): ?>
                                <?php
                                    $class = [];
                                    $htmlChild = '';
                                ?>
                                <?php if (isset($menu['child']) && !empty($menu['child'])): ?>
                                    <?php $class[] = 'treeview'; ?>
                                    <?php $htmlChild = '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>'; ?>
                                <?php endif; ?> 
            
                          <li class="<?= implode(' ', $class); ?>">
                            <a href="<?= isset($menu['link']) ? $menu['link'] : ''; ?>">
                                <?= isset($menu['icon']) ? $menu['icon'] : ''; ?> <span><?= isset($menu['label']) ? $menu['label'] : ''; ?></span>
                                <?= $htmlChild; ?>
                            </a>
                            <?php if (isset($menu['child']) && !empty($menu['child'])): ?>
                                <ul class="treeview-menu">
                                    <?php foreach ($menu['child'] as $key => $child): ?>
                                        <li><a href="<?= isset($child['link']) ? $child['link'] : ''; ?>">
                                            <i class="fa fa-circle-o"></i>
                                            <?= isset($child['label']) ? $child['label'] : ''; ?>
                                        </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?> 
                            </li>
                        <?php else: ?>       
                        <?php endif; ?> 
                    <?php endif; ?> 
                <?php endforeach; ?> <!-- end forecach menu -->               
            </ul>
        <?php endif; ?>
    </section>
</aside>