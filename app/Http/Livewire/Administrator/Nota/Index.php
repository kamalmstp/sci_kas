<?php

namespace App\Http\Livewire\Administrator\Nota;

use Livewire\Component;
use App\Models\Nota;
use App\Models\Kas_keluar;
use App\Models\Kas;
use App\Models\Category;

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
        $kas = Kas::where('status', 1)->first();
        $nota = Nota::join('m_bbm', 'nota_bbm.id_bbm', '=', 'm_bbm.id')->
                join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')->
                where('nota_bbm.id', $id)->select('m_bbm.nama', 'm_bbm.harga', 'sarana.nama as sarana', 'sarana.no_plat', 'nota_bbm.*')->first();
        $liter = floor(($nota->nominal/$nota->harga)*100);
        $in = 'Pembelian BBM '.$nota->nama.' '.$nota->sarana.' ('.$nota->no_plat.') / '.number_format($liter/100, 2, '.', '').' L @IDR '.number_format($nota->harga).' @KM '.number_format($nota->km);

        $kas_keluar = Kas_keluar::create([
            'id_kas' => $kas->id,
            'id_category' => 1,
            'pengeluaran' => $in,
            'nominal' => $nota->nominal,
            'id_karyawan' => $nota->id_karyawan,
            'nota' => $nota->photo,
            'tanggal' => date('Y-m-d',strtotime($nota->datetime)),
        ]);

        if ($kas_keluar) {
            $fs = Nota::find($id);
            $fs->update([
                'forward_status' => 1,
            ]);
            session()->flash('message', 'Berhasil Membuat Pengeluaran Baru');
        }

        return redirect()->route('admin.nota.index');
    }

    public function render()
    {
        $nota = Nota::join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')
                ->select('sarana.nama', 'sarana.no_plat', 'sarana.last_km', 'nota_bbm.*')->get();

        return view('livewire.administrator.nota.index', compact('nota'));
    }
}
