<?php

namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Demo\TestTransactionA;
use App\Models\Demo\TestTransactionB;
use App\Models\Demo\TestTransactionC;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            \DB::beginTransaction();
            $randNum = mt_rand(1, 1000);
            $title = 'Title'.$randNum;

            // 添加test_transaction_a数据
            $test_transaction_a_add_id = TestTransactionA::query()->insertGetId([
                'title' => $title
            ]);
            /*return TestTransactionA::create([
                'title' => $title
            ]);*/

            $ret = json_encode([]);

            if ($test_transaction_a_add_id) {
                $test_transaction_c_add_ret = TestTransactionC::query()->insertGetId([
                    'transaction_a_id' => $test_transaction_a_add_id
                ]);
            }

            // 添加learnlaravel2.test_transaction_b数据
            // ...

            // 抛出异常
            throw new \Exception('Here is a exception.');

            if ($test_transaction_a_add_id) {
                $test_transaction_b_add_ret = TestTransactionB::query()->insertGetId([
                    'transaction_a_id' => $test_transaction_a_add_id
                ]);
                $ret = $test_transaction_b_add_ret;
            }

            // 添加test_transaction_b数据
            \DB::commit();
            return $ret;
        } catch (\Exception $ex) {
            \DB::rollback();
            //print_r($ex->getMessage());
            \Log::error($ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
