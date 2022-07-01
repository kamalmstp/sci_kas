<?php

namespace App\Http\Livewire\Administrator\Bahanbakar;

use Livewire\Component;
use App\Models\Bahanbakar;

class Create extends Component
{
    public $nama, $harga;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $bbm = Bahanbakar::create([
            'nama' => $this->nama,
            'harga' => $this->harga
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.bahanbakar.index');
    }

    public function render()
    {
        return view('livewire.administrator.bahanbakar.create');
    }
}
