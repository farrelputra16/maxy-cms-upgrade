<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    
        // Buat instance model User dan isi atribut-atributnya dengan data dari CSV
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'type' => 'member',
            'access_group_id' => 2,
            'description' => 'Created by Bulk Action Upload',
            'status' => isset($row['status']) ? (bool)$row['status'] : false,
            'created_at' => now(),
            'created_id' => Auth::user()->id, // Mengisi kolom "created_id" dengan ID pengguna saat ini
            'updated_at' => now(),
            'updated_id' => Auth::user()->id, 
        ]);

    }
}
