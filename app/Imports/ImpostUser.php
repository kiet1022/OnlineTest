<?php
namespace App\Imports;
use App\Questions;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');
class ImpostUser implements ToModel, ToArray, WithHeadingRow
{
    use Importable;

    public function array(array $row) {
      if(!is_null($row[0])) {
        return $row;
      }
    }
/**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
      if(!is_null($row[0])) {
        return new User([
           'email' => $row['Email'],
        	'level' =>$row['Level'],
        	'password' => Hash::make('123456'),
        	'status' => 0,
        	'updated_by' => Auth::user()->id,
        	'name' => $row['Name'],
        	'address' => $row['Address'],
        	'phone_number' => $row['Phone Number'],
        	'sex' => $row['Sex']
        ]);
      }
      return null;
    }
}