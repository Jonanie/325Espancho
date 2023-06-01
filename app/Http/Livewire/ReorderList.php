<?php

namespace App\Http\Livewire;

use App\Models\ListItem;
use Livewire\Component;
use Livewire\WithPagination;

class ReorderList extends Component
{
    use WithPagination;

    public $Pregnant;

    public function mount()
    {
        $this->Pregnant = Pregnant::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.reorder-list');
    }

    public function dragDrop($list)
    {
        foreach ($list as $index => $item) {
            Pregnant::where('FirstName', $item['value'])->update(['order' => $index]);
        }

        $this->Pregnant = Pregnant::orderBy('order')->get();
    }
}
