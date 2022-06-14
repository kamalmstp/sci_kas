<?php

namespace App\Http\Livewire\Administrator\Category;

use Livewire\Component;
use App\Models\Category;

class Index extends Component
{

    public function destroy($id)
    {
        $cat = Category::find($id);

        if ($cat) {
            $cat->delete();
        }

        return redirect()->route('admin.cat.index');
    }
    public function render()
    {
        return view('livewire.administrator.category.index', [
            'category' => Category::all()
        ]);
    }
}
