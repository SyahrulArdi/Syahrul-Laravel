<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Menampilkan semua data (index)
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    // Menampilkan form input data (create)
    public function create()
    {
        return view('employees.create');
    }

    // Menyimpan data baru ke database (store)
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    // Menampilkan detail data (show)
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    // Menampilkan form edit data (edit)
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    // Memperbarui data ke database (update)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
        ]));

        return redirect()->route('employees.index');
    }

    // Menghapus data (destroy)
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
