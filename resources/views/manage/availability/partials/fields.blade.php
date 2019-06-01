{!! Former::select('type','Type')->options(\App\Options\AvailabilityEventType::get('---')) !!}
{!! Former::text('name','Event Name') !!}
<div class="flex">
    <div class="mr-4">
        {!! Former::select('rule_id','Rule')->options(\App\Options\Rule::get('--'))->help('If applicable') !!}
    </div>
    <div>
        {!! Former::text('rule_increase_percentage','Rule Increase Percentage')->help('Increase the rates total by a percentage on this date') !!}
    </div>
</div>
{!! Former::checkbox('is_all_day','')->text('All Day Event') !!}
<h2 class="mb-2">Start</h2>
@include('manage.availability.partials.date-input',['prefix'=>'start_at_'])
<h2 class="mb-2">End</h2>
@include('manage.availability.partials.date-input',['prefix'=>'end_at_'])
{!! Former::checkbox('is_repeatable','')->text('Repeatable Event') !!}
{!! Former::select('repeat_type','Repeat Type')->options(\App\Options\AvailabilityEventRepeatType::get('--')) !!}
<h2 class="mb-2">Repeat Until</h2>
@include('manage.availability.partials.date-input',['prefix'=>'repeat_end_'])
