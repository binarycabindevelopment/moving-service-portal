<?php

namespace App\Http\Controllers\Manage\Rules\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller {

    public function index($ruleKey){
        $rule = \App\Rule::findByUuid($ruleKey);
        $locations = $rule->locations;
        return view('manage.rule.location.index',['rule'=>$rule,'locations'=>$locations]);
    }

    public function store(Request $request, $ruleKey){
        $rule = \App\Rule::findByUuid($ruleKey);
        $this->validate($request, [
            'zipcodes' => 'required',
        ]);
        $zipcodes = [];
        $zipcodesString = $request->zipcodes;
        $zipcodeLines = explode(PHP_EOL, $zipcodesString);
        foreach($zipcodeLines as $zipcodeLine){
            $zipcodeItems = explode(',', $zipcodeLine);
            foreach($zipcodeItems as $zipcodeItem){
                $zipcode = trim($zipcodeItem);
                if(!empty($zipcode)){
                    $zipcodes[] = trim($zipcodeItem);
                }
            }
        }
        foreach($zipcodes as $zipcode){
            $location = \App\Location::where('rule_id',$rule->id)->where('zipcode',$zipcode)->first();
            if(!$location){
                $locationData = [];
                $locationData['zipcode'] = $zipcode;
                $locationData['rule_id'] = $rule->id;
                $location = \App\Location::create($locationData);
            }
        }
        return redirect('manage/rule/'.$rule->uuid.'/location');
    }

    public function destroy($ruleKey, $locationKey){
        $rule = \App\Rule::findByUuid($ruleKey);
        $location = \App\Location::findByUuid($locationKey);
        $location->delete();
        return redirect('manage/rule/'.$rule->uuid.'/location')->withSuccess('Location deleted!');
    }

}