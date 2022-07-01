<?php

namespace App\Http\Livewire\Administrator\Nota;

use Livewire\Component;
use App\Models\Nota;

class Index extends Component
{
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'destroy'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $kas = Nota::where('id', $this->delete_id)->first();
        $kas->delete();

        $this->dispatchBrowserEvent('successDeleted');
    }

    public function forward($id)
    {
        $nota = Nota::join('m_bbm', 'nota_bbm.id_bbm', '=', 'm_bbm.id')->
                join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')->
                where('nota_bbm.id', $id)->select('m_bbm.nama', 'm_bbm.harga', 'sarana.nama as sarana', 'sarana.no_plat', 'nota_bbm.*')->first();
        $liter = ($nota->nominal/$nota->harga);
        $in = 'Pembelian BBM '.$nota->nama.' '.$nota->sarana.' ('.$nota->no_plat.') / '.number_format($liter, 2).' L @IDR '.number_format($nota->harga).' @KM '.number_format($nota->km);
        dd($in);
    }

    public function render()
    {
        return view('livewire.administrator.nota.index', [
            'nota' => Nota::join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')->select('sarana.nama', 'sarana.no_plat', 'sarana.last_km', 'nota_bbm.*')->get(),
        ]);
    }
}
