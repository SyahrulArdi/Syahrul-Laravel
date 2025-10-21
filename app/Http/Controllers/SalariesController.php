<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    private $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];

    public function index()
    {
        $salaries = Salaries::with('employee')->latest()->paginate(10); 
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        // DIUBAH: orderBy 'nama_lengkap'
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get(); 
        $months = $this->months;
        return view('salaries.create', compact('employees', 'months')); 
    }

    public function store(Request $request)
    {
        // DIUBAH: Validasi 'tahun_input' dihapus
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id', 
            'bulan_input' => 'required|numeric|min:1|max:12',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ]);

        $dataToStore = [
            'karyawan_id' => $validatedData['karyawan_id'], 
            'gaji_pokok' => $validatedData['gaji_pokok'],
            'tunjangan' => $validatedData['tunjangan'],
            'potongan' => $validatedData['potongan'],
            'bulan' => $validatedData['bulan_input'], // DIUBAH: Langsung simpan angka bulan
        ];
        
        $dataToStore['total_gaji'] = $dataToStore['gaji_pokok'] + $dataToStore['tunjangan'] - $dataToStore['potongan'];

        Salaries::create($dataToStore);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji baru berhasil ditambahkan.');
    }

    public function show(Salaries $salary) 
    {
        $salary->load('employee'); 
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salaries $salary) 
    {
        // DIUBAH: orderBy 'nama_lengkap'
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get(); 
        $months = $this->months;
        
        // DIUBAH: 'bulan' sekarang hanya angka, tidak perlu explode
        $bulan = (int)$salary->bulan; 
        
        // DIUBAH: '$tahun' dihapus dari compact
        return view('salaries.edit', compact('salary', 'employees', 'months', 'bulan')); 
    }

    public function update(Request $request, Salaries $salary) 
    {
        // DIUBAH: Validasi 'tahun_input' dihapus
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id', 
            'bulan_input' => 'required|numeric|min:1|max:12',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ]);

        $dataToUpdate = [
            'karyawan_id' => $validatedData['karyawan_id'], 
            'gaji_pokok' => $validatedData['gaji_pokok'],
            'tunjangan' => $validatedData['tunjangan'],
            'potongan' => $validatedData['potongan'],
            'bulan' => $validatedData['bulan_input'], // DIUBAH: Langsung simpan angka bulan
        ];

        $dataToUpdate['total_gaji'] = $dataToUpdate['gaji_pokok'] + $dataToUpdate['tunjangan'] - $dataToUpdate['potongan'];

        $salary->update($dataToUpdate);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Salaries $salary) 
    {
        try {
            $salary->delete();
            return redirect()->route('salaries.index')
                             ->with('success', 'Data gaji berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('salaries.index')
                             ->with('error', 'Gagal menghapus data gaji. Pesan: ' . $e->getMessage());
        }
    }
}