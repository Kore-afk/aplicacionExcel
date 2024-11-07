<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class UsersImport implements ToModel, WithMappedCells
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => Hash::make($row['password']),
            'row' => json_encode(['name' => '2', 'email' => '4', 'phone' => '3', 'password' => '5']),
            'column' => json_encode(['name' => 'C', 'email' => 'C', 'phone' => 'C', 'password' => 'C']),
        ]);
    }
    public function mapping(): array
    {
        return [
            'name'  => 'C2',
            'email' => 'C4',
            'phone' => 'C3',
            'password' => 'C5',
        ];
    }
    public function collection(array $row)
    {
    }


}

