<?php

namespace App\Http\Livewire\Driver\Bbm;

use Livewire\Component;
use App\Models\Nota;

class Index extends Component
{
    public function render()
    {
        $id_user = auth()->user()->id;

        // dd($id_user);
        
        return view('livewire.driver.bbm.index', [
            'bbm' => Nota::where('id_karyawan', $id_user)->get(),
        ]);
    }
}
