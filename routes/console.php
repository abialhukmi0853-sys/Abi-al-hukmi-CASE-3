<?php

use App\Models\Note;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Hapus permanen catatan yang sudah 30 hari di tong sampah
Schedule::call(function () {
    Note::onlyTrashed()->where('deleted_at', '<', now()->subDays(30))->forceDelete();
})->daily()->name('bersihkan-tong-sampah');