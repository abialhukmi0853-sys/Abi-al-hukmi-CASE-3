<?php

namespace App\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Dashboard'])]
class Dashboard extends Component
{
    public function render()
    {
        $id = auth()->id();

        $stats = Cache::remember('stats.user.' . $id, 300, fn () => [
            'total'   => Note::where('user_id', $id)->count(),
            'pinned'  => Note::where('user_id', $id)->where('is_pinned', true)->count(),
            'trashed' => Note::onlyTrashed()->where('user_id', $id)->count(),
        ]);

        return view('livewire.dashboard', compact('stats'));
    }
}