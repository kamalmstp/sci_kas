<?php

namespace App\Http\Livewire\Driver\Bbm;

use Livewire\Component;
use App\Models\Nota;

class Show extends Component
{
    public $id_detail;

    public function mount($id)
    {
        $this->id_detail = $id;
    }

    public function render()
    {
        return view('livewire.driver.bbm.show', [
            'detail' => Nota::find($this->id_detail),
        ]);
    }
}
