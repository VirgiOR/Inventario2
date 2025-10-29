<?php
 return [
    
                [
                    'type' => 'header',

                    'title' => 'Principal',

                ],
                [
                    'type' => 'link',
                    'title' =>'Dashboard',
                    'icon' =>'fa-solid fa-gauge',
                    'route' => 'admin.dashboard',
                    'active' => 'admin.dashboard',

                ],


    

                [
                    'type' => 'header',
                    'title' => 'Administrar página',
                ],

                [
                        'type' => 'group',
                        'title' =>'Inventario',
                        'icon' =>'fa-solid fa-boxes-packing',
                        'route' => 'admin.dashboard',
                        'active' => [
                            'admin.categories.*',
                            'admin.products',
                        ],


                        'items' => [

                            [   'type' => 'link',
                                'title' =>'Categorías',
                                'icon' =>'fa-solid fa-list',
                                'route' => 'admin.categories.index',
                                'active' => 'admin.categories.*',

                            
                            ],

                            [
                                    'type' => 'link',
                                    'title' =>'Productos ',
                                    'icon' =>'fa-solid fa-box',
                                    'route' => 'admin.products.index',
                                    'active' => 'admin.products.*',
                            ],
            
                    ],
                ],
                [
                    'type' => 'link',
                    'title' =>'Usuarios',
                    'icon' =>'fa-solid fa-users',
                    'route'=> 'admin.users.index',
                    'active'=>'admin.users.*',
                    
                ],

                [
                    'type' => 'link',
                    'title' => 'Permisos',
                    'icon' =>  'fa-solid fa-lock',
                    


                ],

                [
                    'type' => 'link',
                    'title' => 'Ajustes',
                    'icon' =>  'fa-solid fa-gear',


                ]
                    

                

];







?>