<div class="space-y-6">
    <div class="flex items-center justify-between gap-4">
        <flux:heading size="xl">CatatanKu</flux:heading>
        <div class="flex gap-2">
            <flux:button href="{{ route('notes.trash') }}" wire:navigate>Tong Sampah</flux:button>
            <flux:button variant="primary" wire:click="create">+ Catatan Baru</flux:button>
        </div>
    </div>

    <flux:input wire:model.live.debounce.300ms="search" placeholder="Cari catatan..." />

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($notes as $note)
            <flux:card wire:key="note-{{ $note->id }}" class="space-y-2">
                <div class="flex items-start justify-between gap-2">
                    <flux:heading>{{ $note->title }}</flux:heading>
                    @if ($note->is_pinned)
                        <span title="Dipin">⭐</span>
                    @endif
                </div>
                <flux:text>{{ Str::limit($note->content, 120) }}</flux:text>
                <div class="flex flex-wrap gap-2">
                    <flux:button size="sm" wire:click="togglePin({{ $note->id }})">
                        {{ $note->is_pinned ? 'Lepas Pin' : 'Pin' }}
                    </flux:button>
                    <flux:button size="sm" wire:click="edit({{ $note->id }})">Edit</flux:button>
                    <flux:button size="sm" variant="danger" wire:click="delete({{ $note->id }})"
                        wire:confirm="Pindahkan ke tong sampah?">Hapus</flux:button>
                </div>
            </flux:card>
        @empty
            <flux:text>Belum ada catatan.</flux:text>
        @endforelse
    </div>

    {{ $notes->links() }}

    <flux:modal name="note-form" class="w-full max-w-md">
        <form wire:submit="save" class="space-y-4">
            <flux:heading>{{ $editingId ? 'Edit' : 'Tambah' }} Catatan</flux:heading>
            <flux:input wire:model="title" label="Judul" />
            <flux:textarea wire:model="content" label="Isi" rows="6" />
            <flux:button type="submit" variant="primary">Simpan</flux:button>
        </form>
    </flux:modal>
</div>