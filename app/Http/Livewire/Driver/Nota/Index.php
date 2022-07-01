<?php

namespace App\Http\Livewire\Driver\Nota;

use Livewire\Component;
use App\Models\Nota;

class Index extends Component
{
    public function render()
    {
        return view('livewire.driver.nota.index', [
            'nota' => Nota::join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')
                    ->select('sarana.nama', 'sarana.no_plat', 'sarana.last_km', 'nota_bbm.*')
                    ->orderBy('nota_bbm.id', 'desc')->get(),
        ]);
    }
}
