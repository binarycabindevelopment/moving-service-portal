{!! Former::open_vertical('/api/moving-estimator/html/'.$estimate->uuid)->method('PATCH') !!}
{!! Former::hidden('redirect_to',request()->get('redirect_to')) !!}
@if($estimate->rule)
{{ $estimate->rule->uuid }}
@else
    No rule found
@endif
<button type="submit" class="btn btn-primary">Submit</button>
{!! Former::close() !!}