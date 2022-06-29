<?php

namespace App\Http\Livewire\Administrator\Sarana;

use Livewire\Component;
use App\Models\Sarana;

class Edit extends Component
{
    public $id_sarana, $nama, $no_plat, $last_km, $keterangan;

    public function mount($id)
    {
        $data = Sarana::find($id);

        if ($data) {
            $this->id_sarana = $data->id;
            $this->nama = $data->nama;
            $this->no_plat = $data->no_plat;
            $this->last_km = $data->last_km;
            $this->keterangan = $data->keterangan;
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'no_plat' => 'required',
        ]);

        if ($this->id_sarana) {
            $sar = Sarana::find($this->id_sarana);

            if ($sar) {
                $sar->update([
                    'nama' => $this->nama,
                    'no_plat' => $this->no_plat,
                    'last_km' => $this->last_km,
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        // $this->dispatchBrowserEvent('success');
        session()->flash('message', 'Data Berhasil Diupudate.');

        return redirect()->route('admin.sarana.index');
    }

    public function render()
    {
        return view('livewire.administrator.sarana.edit');
    }
}
