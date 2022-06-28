<?php

namespace App\Http\Livewire\Administrator\Sarana;

use Livewire\Component;
use App\Models\Sarana;

class Create extends Component
{
    public $nama, $no_plat, $last_km, $keterangan;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'no_plat' => 'required',
        ]);

        $sarana = Sarana::create([
            'nama' => $this->nama,
            'no_plat' => $this->no_plat,
            'last_km' => $this->last_km,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.sarana.index');
    }

    public function render()
    {
        return view('livewire.administrator.sarana.create');
    }
}
