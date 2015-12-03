<?php

namespace App\Models\Demo;

use Illuminate\Database\Eloquent\Model;

class TestTransactionC extends Model
{

    protected $connection = 'mysql2';

    protected $table = 'demo_transaction_c';

}
