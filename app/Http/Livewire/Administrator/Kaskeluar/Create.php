<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;
use App\Models\Kas;
use App\Models\Category;
use App\Models\Karyawan;

class Create extends Component
{
    public $id_kas, $id_category, $id_karyawan, $tanggal, $pengeluaran, $nominal, $keterangan;

    public function mount()
    {
        $kas = Kas::where('status', 1)->first();

        $this->id_kas = $kas->id;
    }

    public function store()
    {
        $this->validate([
            'id_category' => 'required',
            'pengeluaran' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);

        $kas_keluar = Kas_keluar::create([
            'id_kas' => $this->id_kas,
            'id_category' => $this->id_category,
            'pengeluaran' => $this->pengeluaran,
            'nominal' => $this->nominal,
            'id_karyawan' => $this->id_karyawan,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.kaskeluar.index');
    }

    public function render()
    {
        return view('livewire.administrator.kas-keluar.create', [
            'category' => Category::all(),
            'kas' => Kas::latest()->first(),
            'karyawan' => Karyawan::all(),
        ]);
    }
}
