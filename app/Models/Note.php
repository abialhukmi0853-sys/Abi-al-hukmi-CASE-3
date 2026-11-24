<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Note extends Model
{
    use HasFactory, SoftDeletes;
   protected $fillable = ['user_id', 'title', 'content', 'is_pinned', 'priority'];
    // Cache statistik dibersihkan setiap data berubah (dipakai di Langkah 8)
    protected static function booted(): void
    {
        foreach (['saved', 'deleted', 'restored', 'forceDeleted'] as $event) {
            static::$event(fn (Note $note) => Cache::forget('stats.user.' . $note->user_id));
        }
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}