<?php

namespace App\Http\Livewire\Administrator\Nota;

use Livewire\Component;
use App\Models\Nota;

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
        $kas = Nota::where('id', $this->delete_id)->first();
        $kas->delete();

        $this->dispatchBrowserEvent('successDeleted');
    }

    public function render()
    {
        return view('livewire.administrator.nota.index', [
            'nota' => Nota::join('sarana', 'nota_bbm.id_sarana', '=', 'sarana.id')->select('sarana.nama', 'sarana.no_plat', 'sarana.last_km', 'nota_bbm.*')->get(),
        ]);
    }
}
