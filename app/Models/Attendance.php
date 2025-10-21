<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel secara eksplisit karena tidak mengikuti konvensi plural Laravel.
     */
    protected $table = 'attendance';

    /**
     * Properti yang dapat diisi secara massal.
     */
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    /**
     * Mendefinisikan relasi ke model Employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}

