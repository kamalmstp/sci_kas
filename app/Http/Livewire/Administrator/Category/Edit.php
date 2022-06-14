<?php

namespace App\Http\Livewire\Administrator\Category;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Category;

class Edit extends Component
{
    public $id_cat;
    public $kode;
    public $keterangan;

    public function mount($id)
    {
        $category = Category::find($id);

        if ($category) {
            $this->id_cat = $category->id;
            $this->kode = $category->kode;
            $this->keterangan = $category->keterangan;
        }
    }

    public function update()
    {
        $this->validate([
            'kode' => 'required',
            'keterangan' => 'required',
        ]);

        if ($this->id_cat) {
            $cat = Category::find($this->id_cat);

            if ($cat) {
                $cat->update([
                    'kode' => $this->kode,
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        return redirect()->route('admin.cat.index');
    }

    public function render()
    {
        return view('livewire.administrator.category.edit');
    }
}
