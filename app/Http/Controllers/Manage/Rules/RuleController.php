<?php

namespace App\Http\Controllers\Manage\Rules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuleController extends Controller {

    public function index(){
        $rules = \App\Rule::orderBy('name','ASC')->get();
        return view('manage.rule.index',['rules'=>$rules]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $rule = \App\Rule::create($request->all());
        return redirect('manage/rule/'.$rule->uuid.'/edit');
    }

    public function edit($ruleKey){
        $rule = \App\Rule::findByUuid($ruleKey);
        return view('manage.rule.edit',['rule'=>$rule]);
    }

    public function update(Request $request, $ruleKey){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $rule = \App\Rule::findByUuid($ruleKey);
        $ruleData = $request->all();
        $ruleData['allow_drive_time'] = $request->get('allow_drive_time',false);
        $ruleData['allow_double_drive_time'] = $request->get('allow_double_drive_time',false);
        $ruleData['premium_for_flights_of_stairs'] = $request->get('premium_for_flights_of_stairs',false);
        $ruleData['premium_for_parking_restrictions'] = $request->get('premium_for_parking_restrictions',false);
        $ruleData['premium_for_parking_distance'] = $request->get('premium_for_parking_distance',false);
        $ruleData['premium_charges'] = $request->get('premium_charges',false);
        $ruleData['premium_for_elevator'] = $request->get('premium_for_elevator',false);
        $ruleData['availability_saturday'] = $request->get('availability_saturday',false);
        $ruleData['availability_sunday'] = $request->get('availability_sunday',false);
        $ruleData['availability_holiday'] = $request->get('availability_holiday',false);
        $rule->update($ruleData);
        return redirect('manage/rule/'.$rule->uuid.'/edit')->withSuccess('Rule saved!');
    }

    public function destroy($ruleKey){
        $rule = \App\Rule::findByUuid($ruleKey);
        $rule->delete();
        return redirect('manage/rule')->withSuccess('Rule deleted!');
    }

}