<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $count = count($row);
        for($i=0;$i <= ($count)-1;$i++){
            echo 'sr.No'.$i .'Value '.$row[$i].'<br>';
        }
        // dd('dd');
        // return new User([
        //     'name' => $row[0],
        //     'email' => $row[1],
        //     'password' => bcrypt('$row[2]'),
        // ]);
    }
}
