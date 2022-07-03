<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;
use App\Models\Kas;

class Show extends Component
{
    public $id_kaskeluar, $delete_id, $kas_id;
    protected $listeners = ['deleteConfirmed' => 'destroy'];

    public function mount($id)
    {
        $this->id_kaskeluar = $id;
        $kas = Kas::where('status', 1)->first();
        $this->kas_id = $kas->id;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $this->id_kaskeluar = null;
        $kas = Kas_keluar::where('id', $this->delete_id)->first();
        $kas->delete();

        session()->flash('message', 'Data Berhasil Dihapus.');
        // $this->render();
        return redirect()->route('admin.kaskeluar.index');
    }

    public function render()
    {
        $detail = Kas_keluar::join('category', 'kas_keluar.id_category', '=', 'category.id')
                ->join('kas', 'kas_keluar.id_kas', '=', 'kas.id')
                ->join('m_karyawan', 'kas_keluar.id_karyawan', '=', 'm_karyawan.id')
                ->where('kas_keluar.id', $this->id_kaskeluar)
                ->select('kas_keluar.id as id_kk','kas_keluar.pengeluaran', 'kas_keluar.nominal', 'kas_keluar.tanggal','m_karyawan.nama as nama_karyawan', 'category.kode', 'category.keterangan as cat_keterangan', 'kas.no_umk')
                ->first();
        // dd($detail);
        if ($detail == null) {
            return view('livewire.administrator.kas-keluar.index', [
                'kas_keluar' => Kas_keluar::where('id_kas', $this->kas_id)->get(),
                'kas' => Kas::where('status', 1)->first(),
                'total_keluar' => Kas_keluar::where('id_kas', $this->kas_id)->sum('nominal'),
            ]);
        }else{
            return view('livewire.administrator.kas-keluar.show', compact('detail'));
        }
    }
}
