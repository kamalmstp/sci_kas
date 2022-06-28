<?php

namespace App\Http\Livewire\Driver\Bbm;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Nota;
use App\Models\Sarana;
use Image;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    public $id_sarana, $id_user, $datetime, $nominal, $km, $photo, $keterangan;

    public function mount()
    {
        $this->id_user = auth()->user()->id;
    }

    public function store()
    {
        $this->validate([
            'id_sarana' => 'required',
            'nominal' => 'required',
            'photo' => 'required',
            'km' => 'required',
        ]);

        $nama_file = $this->photo->hashName();
        $image = $this->photo;
        $img = Image::make($image->getRealPath())->resize(500, null, function($c){
            $c->aspectRatio();
        });
        $img->stream();
        Storage::disk('local')->put('public/nota/'.$nama_file, $img, 'public');

        // $this->photo->storeAs('public/nota', $nama_file);

        $kas = Nota::create([
            'id_sarana' => $this->id_sarana,
            'id_karyawan' => $this->id_user,
            'datetime' => $this->datetime,
            'nominal' => $this->nominal,
            'km' => $this->km,
            'photo' => $nama_file,
            'keterangan' => $this->keterangan
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('driver.bbm.index');
    }

    public function render()
    {
        return view('livewire.driver.bbm.create', [
            'sarana' => Sarana::all(),
        ]);
    }
}
