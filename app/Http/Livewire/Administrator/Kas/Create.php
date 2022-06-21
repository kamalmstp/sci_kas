<?php

namespace App\Http\Livewire\Administrator\Kas;

use Livewire\Component;
use App\Models\Kas;

class Create extends Component
{
    public $no_umk, $nominal, $tanggal, $keterangan;

    public function store()
    {
        $this->validate([
            'no_umk' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);

        $kas = Kas::create([
            'no_umk' => $this->no_umk,
            'nominal' => $this->nominal,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.kas.index');
    }

    public function render()
    {
        return view('livewire.administrator.kas.create');
    }
}
