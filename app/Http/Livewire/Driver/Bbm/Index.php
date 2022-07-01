<?php

namespace App\Http\Livewire\Driver\Bbm;

use Livewire\Component;
use App\Models\Nota;
use App\Models\Sarana;

class Index extends Component
{
    public function render()
    {
        $id_user = auth()->user()->id;

        return view('livewire.driver.bbm.index', [
            'bbm' => Nota::join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')
                    ->where('id_karyawan', $id_user)
                    ->select('sarana.nama', 'sarana.no_plat', 'sarana.last_km', 'nota_bbm.*')->get(),
        ]);
    }
}
