<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
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

    public function putData(\Request $request) {
        $result = true;
        try {
            $name = $request->name;
            $score = $request->score;

            $query = new Rank();
            $query->name = $name;
            $query->score = $score;
            $query->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $result = false;
        }
        return $result;
    }
}
