<?php

namespace App\Http\Livewire\Administrator\Category;

use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public $kode;
    public $keterangan;

    public function store()
    {
        $this->validate([
            'kode' => 'required',
            'keterangan' => 'required',
        ]);

        $cat = Category::create([
            'kode' => $this->kode,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.cat.index');
    }
    public function render()
    {
        return view('livewire.administrator.category.create');
    }
}
