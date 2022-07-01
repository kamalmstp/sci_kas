<?php

namespace App\Http\Livewire\Administrator\Bahanbakar;

use Livewire\Component;
use App\Models\Bahanbakar;

class Index extends Component
{
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'destroy'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $kas = Bahanbakar::where('id', $this->delete_id)->first();
        $kas->delete();

        $this->dispatchBrowserEvent('successDeleted');
    }

    public function render()
    {
        return view('livewire.administrator.bahanbakar.index', [
            'bbm' => Bahanbakar::all(),
        ]);
    }
}
