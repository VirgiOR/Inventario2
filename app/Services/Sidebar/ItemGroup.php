<?php

namespace App\Services\Sidebar;

use Pest\Mutate\Mutators\Sets\StringSet;

class ItemGroup implements ItemInterface
{
    private string $title;
    private String $icon;
    private bool $active;
    private array $items=  [];

    public function __construct(string $title,  bool $active = false, string $icon )
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->active = $active;
        
    }

    public function add(ItemInterface $item): self
    {
        $this->items[] = $item;
        return  $this;
    }

   public function render(): string
   {
              $open = $this->active ? 'true' : 'false';

              $itemsHtml = collect($this->items)
                         ->map(function(ItemInterface $item) {
                                return '<li class="pl-4">'. $item->render() .'</li>';
                         })->implode("\n");

              return <<<HTML
                       <div x-data="{ open}">
                                        <button type="button"  @click="open = !open"  class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" >
                                            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                                <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                                                </svg>
                                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">"{$this->title}"</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                        <ul x-show="open" x-cloak class="py-2 space-y-2">
                                            {{ $itemsHtml }}
                                        </ul>
                        </div>

            HTML;
   }
    public function authorize(): bool
    {
         return true;
    }
}
