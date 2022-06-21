<?php

namespace App\Http\Livewire\Administrator\Kaskeluar;

use Livewire\Component;
use App\Models\Kas_keluar;
use App\Models\Kas;
use App\Models\Category;

class Index extends Component
{
    public $delete_id, $kas_id;
    protected $listeners = ['deleteConfirmed' => 'destroy'];

    public function mount()
    {
        $kas = Kas::where('status', 1)->first();
        $this->kas_id = $kas->id;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $kas = Kas_keluar::where('id', $this->delete_id)->first();
        $kas->delete();

        $this->dispatchBrowserEvent('successDeleted');
    }

    public function render()
    {
        return view('livewire.administrator.kas-keluar.index', [
            'kas_keluar' => Kas_keluar::where('id_kas', $this->kas_id)->get(),
            'kas' => Kas::where('status', 1)->first(),
            'total_keluar' => Kas_keluar::where('id_kas', $this->kas_id)->sum('nominal'),
        ]);
    }
}
