<div class="space-y-4">
    <flux:heading size="xl">Tong Sampah</flux:heading>

    @forelse ($notes as $note)
        <flux:card wire:key="trash-{{ $note->id }}" class="space-y-2">
            <flux:heading>{{ $note->title }}</flux:heading>
            <flux:text>{{ Str::limit($note->content, 100) }}</flux:text>
            <div class="flex flex-wrap gap-2">
                <flux:button size="sm" wire:click="restore({{ $note->id }})">Pulihkan</flux:button>
                <flux:button size="sm" variant="danger" wire:click="forceDelete({{ $note->id }})"
                    wire:confirm="Hapus permanen? Tidak bisa dikembalikan.">Hapus Permanen</flux:button>
            </div>
        </flux:card>
    @empty
        <flux:text>Tong sampah kosong.</flux:text>
    @endforelse

    <a href="{{ route('notes.index') }}" class="text-blue-600 underline">← Kembali ke catatan</a>
</div>