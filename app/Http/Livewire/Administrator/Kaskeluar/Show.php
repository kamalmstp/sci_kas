<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;

class Show extends Component
{
    public $id_kaskeluar, $delete_id;
    protected $listeners = ['deleteConfirmed' => 'destroy'];

    public function mount($id)
    {
        $this->id_kaskeluar = $id;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $kas = Kas_keluar::where('id', $this->delete_id)->first();
        $kas->delete();

        $this->id_kaskeluar = null;

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
        return view('livewire.administrator.kas-keluar.show', compact('detail'));
        
    }
}
