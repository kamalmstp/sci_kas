<?php

namespace App\Http\Livewire\Administrator\Kas;

use Livewire\Component;

class KasStatus extends Component
{
    public Model $model;
    
    public $field;

    public $status;

    public function mount()
    {
        $this->status = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

    }

    public function render()
    {
        return view('livewire.administrator.kas.kas-status');
    }
}
