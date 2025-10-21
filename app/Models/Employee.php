<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'departemen_id',
        'jabatan_id', // Diubah dari position_id
        'status',
    ];

    /**
     * Mendapatkan departemen dari pegawai.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    /**
     * Mendapatkan jabatan dari pegawai.
     */
    public function position()
    {
        // Menggunakan jabatan_id sebagai foreign key
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}

