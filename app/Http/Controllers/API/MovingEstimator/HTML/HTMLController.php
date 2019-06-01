<?php

namespace App\Http\Controllers\API\MovingEstimator\HTML;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HTMLController extends Controller {

    public function create(){
        $html = View::make('api.moving-estimator.html.create')->render();
        return response()->json([
            'html' => $html,
        ]);
    }

    public function store(Request $request){
        $estimateData = $request->all();
        $estimate = \App\Estimate::create($estimateData);
        if($request->get('redirect_to')){
            $redirectURL = $request->get('redirect_to');
            if (strpos($redirectURL, '?') !== false) {
                $redirectURL.='&estimateUUID='.$estimate->uuid;
            }else{
                $redirectURL.='?estimateUUID='.$estimate->uuid;
            }
            return redirect($redirectURL);
        }
        return redirect()->back();
    }

    public function edit(Request $request, $estimateKey){
        $estimate = \App\Estimate::findByUuid($estimateKey);
        if(!$estimate){
            abort(404);
        }
        $html = View::make('api.moving-estimator.html.edit',[
            'estimate'=>$estimate
        ])->render();
        return response()->json([
            'html' => $html,
        ]);
    }

}