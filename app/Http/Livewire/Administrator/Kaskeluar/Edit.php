<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;
use App\Models\Category;
use App\Models\Kas;
use App\Models\Karyawan;

class Edit extends Component
{
    public $id_kk, $id_category, $id_karyawan, $tanggal, $pengeluaran, $nominal, $keterangan;

    public function mount($id)
    {
        $this->id_kk = $id;
        $kas = Kas_keluar::find($id);
        

        if ($kas) {
            $this->id_category = $kas->id_category;
            $this->id_karyawan = $kas->id_karyawan;
            $this->tanggal = $kas->tanggal;
            $this->pengeluaran = $kas->pengeluaran;
            $this->nominal = $kas->nominal;
            $this->keterangan = $kas->keterangan;
        }
    }

    public function update()
    {
        $this->validate([
            'id_category' => 'required',
            'pengeluaran' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);

        $kas = KasKas_keluar::find($this->id_kk);
        $kas->update([
            'id_category' => $this->id_category,
            'tanggal' => $this->tanggal,
            'pengeluaran' => $this->pengeluaran,
            'nominal' => $this->nominal,
            'id_karyawan' => $this->id_karyawan,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('admin.kaskeluar.index');
    }

    public function render()
    {
        return view('livewire.administrator.kas-keluar.edit', [
            'category' => Category::all(),
            'kas' => Kas::latest()->first(),
            'karyawan' => Karyawan::all(),
        ]);
    }
}
