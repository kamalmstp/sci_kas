<?php

namespace App\Http\Livewire\Administrator\Bahanbakar;

use Livewire\Component;
use App\Models\Bahanbakar;

class Edit extends Component
{
    public $id_bbm, $nama, $harga;

    public function mount($id)
    {
        $data = Bahanbakar::find($id);

        if ($data) {
            $this->id_bbm = $data->id;
            $this->nama = $data->nama;
            $this->harga = $data->harga;
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        if ($this->id_bbm) {
            $sar = Bahanbakar::find($this->id_bbm);

            if ($sar) {
                $sar->update([
                    'nama' => $this->nama,
                    'harga' => $this->harga
                ]);
            }
        }

        // $this->dispatchBrowserEvent('success');
        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('admin.bahanbakar.index');
    }

    public function render()
    {
        return view('livewire.administrator.bahanbakar.edit');
    }
}
