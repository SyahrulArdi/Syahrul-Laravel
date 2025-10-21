<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salaries extends Model 
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'karyawan_id', 
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    /**
     * Relasi ke model Employee.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'karyawan_id'); 
    }

    /**
     * Accessor untuk mendapatkan nama bulan dari angka bulan.
     * $salary->bulan_name
     */
    public function getBulanNameAttribute()
    {
        if (!$this->bulan) {
            return null;
        }
        // Membuat objek tanggal hanya dari nomor bulan (1-12) dan memformatnya
        return \Carbon\Carbon::createFromFormat('!m', $this->bulan)->format('F');
    }
}