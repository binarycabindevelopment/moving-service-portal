<div class="tabs">
    <div class="tab @if(request()->is('manage/rule/'.$rule->uuid.'/edit')) active @endif">
        <a href="{{ url('/manage/rule/'.$rule->uuid.'/edit') }}">Rule Details</a>
    </div>
    <div class="tab @if(request()->is('manage/rule/'.$rule->uuid.'/location')) active @endif">
        <a href="{{ url('/manage/rule/'.$rule->uuid.'/location') }}">Applicable Locations</a>
    </div>
</div>