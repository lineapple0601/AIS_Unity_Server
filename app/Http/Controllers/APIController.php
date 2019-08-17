<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Rank;
use Log;

class APIController extends BaseController
{
    public function getDatas() {
        $result = array();
        try {
            $dataCollection = Rank::all();
            $result = $dataCollection->toArray();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $result = false;
        }
        return json_encode($result);
    }

    public function putData(Request $request) {
        $result = "200";
	Log::info(var_export($request->all(), true));
        try {
            $name = $request->input('name');
            $score = $request->input('score');

            $query = new Rank();
            $query->name = $name;
            $query->score = $score;
            $query->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $result = $e->getMessage();
        }
        return $result;
    }
}
