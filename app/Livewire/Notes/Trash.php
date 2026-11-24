<?php

namespace App\Livewire\Notes;

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Tong Sampah'])]
class Trash extends Component
{
    public function restore(int $id)
    {
        auth()->user()->notes()->onlyTrashed()->findOrFail($id)->restore();
        Cache::forget('stats.' . auth()->id());
    }

    public function forceDelete(int $id)
    {
        auth()->user()->notes()->onlyTrashed()->findOrFail($id)->forceDelete();
        Cache::forget('stats.' . auth()->id());
    }

    public function render()
    {
        return view('livewire.notes.trash', [
            'notes' => auth()->user()->notes()->onlyTrashed()->latest('deleted_at')->get(),
        ]);
    }
}