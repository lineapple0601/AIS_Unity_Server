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
            $dataCollection = Rank::orderBy('score', 'desc')->orderBy('created_at', 'asc')->get();
            $result = $dataCollection->toArray();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $result = false;
        }
        return json_encode($result);
    }

    public function putData(Request $request) {
        $result = "-1";
        Log::info(var_export($request->all(), true));
        try {
            $name = $request->input('name');
            $score = $request->input('score');

            $query = new Rank();
            $query->name = $name;
            $query->score = $score;
            $query->save();

            $id = $query->id;

            $rankLists = Rank::orderBy("score", "desc")->get();
            foreach($rankLists as $idx => $rank) {
                if ($rank->id == $id) {
                    $result = $idx+1;
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        return $result;
    }
}
