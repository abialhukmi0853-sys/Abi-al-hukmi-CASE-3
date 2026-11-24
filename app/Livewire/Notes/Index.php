<?php

namespace App\Livewire\Notes;

use Flux\Flux;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app', ['title' => 'Catatan'])]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $editingId = null;

    #[Validate('required|min:3|max:100')]
    public string $title = '';

    #[Validate('nullable|max:5000')]
    public string $content = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->reset(['title', 'content', 'editingId']);
        $this->resetValidation();
        Flux::modal('note-form')->show();
    }

    public function save()
    {
        $this->validate();

        auth()->user()->notes()->updateOrCreate(
            ['id' => $this->editingId],
            ['title' => $this->title, 'content' => $this->content]
        );

        Cache::forget('stats.' . auth()->id());
        $this->reset(['title', 'content', 'editingId']);
        Flux::modal('note-form')->close();
    }

    public function edit(int $id)
    {
        $note = auth()->user()->notes()->findOrFail($id);
        $this->editingId = $note->id;
        $this->title = $note->title;
        $this->content = $note->content ?? '';
        $this->resetValidation();
        Flux::modal('note-form')->show();
    }

    public function togglePin(int $id)
    {
        $note = auth()->user()->notes()->findOrFail($id);
        $note->update(['is_pinned' => ! $note->is_pinned]);
        Cache::forget('stats.' . auth()->id());
    }

    public function delete(int $id)
    {
        auth()->user()->notes()->findOrFail($id)->delete();
        Cache::forget('stats.' . auth()->id());
    }

    public function render()
    {
        $notes = auth()->user()->notes()
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->orderByDesc('is_pinned')
            ->latest()
            ->paginate(9);

        return view('livewire.notes.index', compact('notes'));
    }
}