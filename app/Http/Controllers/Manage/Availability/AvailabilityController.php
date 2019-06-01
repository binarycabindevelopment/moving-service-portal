<?php

namespace App\Http\Controllers\Manage\Availability;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailabilityController extends Controller {

    public function index(){
        $availabilityEvents = \App\AvailabilityEvent::orderBy('name','ASC')->whereNotNull('start_at')->whereNotNull('end_at')->get();
        $calendar = \Calendar::addEvents($availabilityEvents)
            ->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
           'dayClick' => 'function(date, jsEvent, view) { window.location="/manage/availability/create?day="+date.format("YYYY-MM-DD"); }'
           // 'viewRender' => 'function() {alert("Callbacks!");}'
        ]);
        return view('manage.availability.index',['availabilityEvents'=>$availabilityEvents,'calendar'=>$calendar]);
    }

    public function create(Request $request){
        $defaultValues = [];
        if($request->has('day')){
            $dateStart = \Carbon\Carbon::parse($request->day);
            $dateEnd = \Carbon\Carbon::parse($request->day)->addHour(1);
            $defaultValues['start_at_month'] = $dateStart->month;
            $defaultValues['start_at_day'] = $dateStart->day;
            $defaultValues['start_at_year'] = $dateStart->year;
            $defaultValues['start_at_hour'] = \Carbon\Carbon::now()->hour;
            $defaultValues['start_at_minute'] = 0;
            $defaultValues['start_at_ampm'] = \Carbon\Carbon::now()->format('A');

            $defaultValues['end_at_month'] = $dateEnd->month;
            $defaultValues['end_at_day'] = $dateEnd->day;
            $defaultValues['end_at_year'] = $dateEnd->year;
            $defaultValues['end_at_hour'] = \Carbon\Carbon::now()->addHour(1)->hour;
            $defaultValues['end_at_minute'] = 0;
            $defaultValues['end_at_ampm'] = \Carbon\Carbon::now()->addHour(1)->format('A');
        }
        return view('manage.availability.create',['defaultValues'=>$defaultValues]);
    }

    public function store(Request $request){
        $availabilityData = \App\AvailabilityEvent::prepareDataForSave($request->all());
        $availability = \App\AvailabilityEvent::create($availabilityData);
        return redirect('/manage/availability')->withSuccess('Saved');
    }

    public function edit($availabilityEventKey){
        $availabilityEvent = \App\AvailabilityEvent::findByUuid($availabilityEventKey);
        return view('manage.availability.edit',['availabilityEvent'=>$availabilityEvent]);
    }

    public function update(Request $request, $availabilityEventKey){
        $availabilityEvent = \App\AvailabilityEvent::findByUuid($availabilityEventKey);
        $availabilityData = \App\AvailabilityEvent::prepareDataForSave($request->all());
        $availabilityEvent->update($availabilityData);
        return redirect('/manage/availability')->withSuccess('Saved');

    }

}