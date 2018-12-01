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
class ImportQuestion implements ToModel, ToArray, WithHeadingRow
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
           // 'content'     => $row[0],
           // 'id_type'    => $row[1],
           // 'a' => $row[2],
           // 'b' => $row[3],
           // 'c' => $row[4],
           // 'd' => $row[5],
           // 'correct_answer' => $row[6],
           // 'owner' => Auth::user()->id
           // 
           'content'     => $row['Content'],
           'id_type'    => $row['Type'],
           'a' => $row['a'],
           'b' => $row['b'],
           'c' => $row['c'],
           'd' => $row['d'],
           'correct_answer' => $row['Correct'],
           'owner' => Auth::user()->id
        ]);
      }
      return null;
    }
}