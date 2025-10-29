<?php
 namespace  App\Views\Composers;
 use  App\Services\Sidebar\ItemHeader;
 use App\Services\Sidebar\Itemlink;
 use App\Services\Sidebar\ItemGroup;
 


 class SidebarComposer
 {
    public function compose($view){

        $items = collect(config('sidebar'))->map(function ($item) {
            return $this->parseItem($item);
        }
    );
        $view->with('itemsSiderbar', $items);

    }

    public function parseItem(array $item)
    {

        switch ($item['type']){
            case 'header':
                return new ItemHeader(
                    title: $item['title'],
                    can: $item['can'] ??[],

                );

                break;

            case 'link':
                return new Itemlink(
                    title: $item['title'],
                    url: isset($item['route']) ? route($item['route']) : '#' ,
                    icon: $item['icon']  ?? 'fa-regular fa-circle',
                    active: isset($item['active']) ? request()->routeIs($item['active']) : false,
                    can: $item['can'] ?? [],

                );

                foreach ($item['items'] as $subItem ) {
                    $group-> add($this->parseItem($subItem));
                }

                break;

              case 'group':
                return new ItemGroup(
                    title:   $item['title'],
                    icon: $item['icon'] ?? 'fa-regular-circle',
                    active: isset($item['active']) ? request()->routeIs($item['active']) :false,
                );

                foreach ($item['items'] as $subItem) {
                    $group->add($this->parseItem($subItem));
                }

                 return $group;



                break;

            default:
              throw  new  \InvalidArgumentException("Unknow");

               break;


        }

    }


 }





 ?>