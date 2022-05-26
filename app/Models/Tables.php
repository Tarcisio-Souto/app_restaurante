<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tables extends Model
{
    use HasFactory;

    public static function ListAllTables() {

        $tables = DB::table('tables')
        ->select('id', 'number', 'status')
        ->get();

        return $tables;

    }

}
