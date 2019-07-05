<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Rank;

class APIController extends BaseController
{
    public function getDatas() {
        $dataCollection = Rank::all();
        $dataArr = $dataCollection->toArray();
        echo json_encode($dataArr);
    }

    public function putData() {

    }
}
