<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;

class Show extends Component
{
    public $id_kaskeluar;

    public function mount($id)
    {
        $this->id_kaskeluar = $id;
    }

    public function render()
    {
        return view('livewire.administrator.kas-keluar.show');
    }
}
