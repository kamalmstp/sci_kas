<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;

class Edit extends Component
{
    public $id_kas, $no_umk, $nominal, $tanggal, $keterangan;

    public function mount($id)
    {
        $kas = Kas::find($id);

        if ($kas) {
            $this->id_kas = $kas->id;
            $this->no_umk = $kas->no_umk;
            $this->nominal = $kas->nominal;
            $this->tanggal = $kas->tanggal;
            $this->keterangan = $kas->keterangan;
        }
    }

    public function update()
    {
        $this->validate([
            'no_umk' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
        ]);

        if ($this->id_kas) {
            $kas = Kas::find($this->id_kas);

            if ($kas) {
                $kas->update([
                    'no_umk' => $this->no_umk,
                    'nominal' => $this->nominal,
                    'tanggal' => $this->tanggal,
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        // $this->dispatchBrowserEvent('success');
        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('admin.kas.index');
    }

    public function render()
    {
        return view('livewire.administrator.kas-keluar.edit');
    }
}
