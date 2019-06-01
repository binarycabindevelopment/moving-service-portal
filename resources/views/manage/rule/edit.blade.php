@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Edit Rule</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Rules' => url('/manage/rule'),
                'Edit Rule' => url('/manage/rule/'.$rule->uuid.'/edit'),
            ]
            ])
        </div>
    </div>

    @include('manage.rule.partials.tabs')

    <div class="bg-white shadow">
        <div class="p-6">
            {!! Former::open('/manage/rule/'.$rule->uuid)->method('PATCH') !!}
            {!! Former::populate($rule) !!}

            <div class="flex -mx-4">
                <div class="w-1/3 px-4">{!! Former::text('name','Name')->required() !!}</div>
            </div>
            <div class="flex -mx-4">
                <div class="w-1/3 px-4">{!! Former::text('adjustment_factor','Rate Adjustment Factor') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('service_charge_rate','Service Charge Rate')->prepend('$') !!}</div>
            </div>
            <div class="flex -mx-4">
                <div class="w-1/3 px-4">{!! Former::text('maximum_hours_per_man','Maximum Hours per Man')->append('Hours') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('minimum_hours_per_man','Minimum Hours per Man')->append('Hours') !!}</div>
            </div>
            <div class="flex -mx-4">
                <div class="w-1/3 px-4">{!! Former::text('travel_time','Travel Time')->append('Hours') !!}</div>
            </div>
            <div class="flex -mx-4">
                <div class="w-1/3 px-4">{!! Former::checkbox('allow_drive_time','Drive Time')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::checkbox('allow_double_drive_time','Double Drive Time')->value('1') !!}</div>
            </div>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::text('two_men_on_one_truck_price','Two Men One Truck Price')->prepend('$') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('three_men_on_one_truck_price','Two Men One Truck Price')->prepend('$') !!}</div>
            </div>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::text('four_men_on_one_truck_price','Two Men One Truck Price')->prepend('$') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('five_men_on_one_truck_price','Two Men One Truck Price')->prepend('$') !!}</div>
            </div>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::text('weight_limit_for_quote','Weight Limit for Quote')->append('lbs.') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('mileage_limit_for_quote','Mileage Limit for Quote')->append('miles') !!}</div>
            </div>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::text('truck_weight_limit','Truck weight limit')->append('lbs.') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('additional_truck_service_charge','Additional Truck Service Charge')->prepend('$') !!}</div>
            </div>

            <h2>Additional Factors</h2>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::checkbox('premium_for_flights_of_stairs','Premium for Flights of Stairs')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::checkbox('premium_for_parking_restrictions','Premium for Parking Restrictions')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::checkbox('premium_for_parking_distance','Premium for Parking Distance')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::checkbox('premium_charges','Premium for Charges')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::checkbox('premium_for_elevator','Premium for Elevator')->value('1') !!}</div>
            </div>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::text('packing_charges','Packing Charges')->prepend('$') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('assembling_and_disassembling','Assembling and Disassembling')->prepend('%') !!}</div>
            </div>

            <h2>Availability Settings</h2>
            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::checkbox('availability_saturday','Availability Saturday')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('availability_saturday_rate_increase','Saturday Rate Increase')->append('%') !!}</div>
            </div>

            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::checkbox('availability_sunday','Availability Sunday')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('availability_sunday_rate_increase','Sunday Rate Increase')->append('%') !!}</div>
            </div>

            <div class="flex -mx-4 flex-wrap">
                <div class="w-1/3 px-4">{!! Former::checkbox('availability_holiday','Availability on National Holidays')->value('1') !!}</div>
                <div class="w-1/3 px-4">{!! Former::text('availability_holiday_rate_increase','Holiday Rate Increase')->append('%') !!}</div>
            </div>

            @component('components.buttons.submit')
                Save
            @endcomponent
            {!! Former::close() !!}
        </div>

    </div>

    <div class="text-right py-4">
        {!! Former::open('/manage/rule/'.$rule->uuid)->method('DELETE') !!}
        @component('components.buttons.submit-delete')
            <span class="text-xs">Delete Rule</span>
        @endcomponent
        {!! Former::close() !!}
    </div>

@endsection