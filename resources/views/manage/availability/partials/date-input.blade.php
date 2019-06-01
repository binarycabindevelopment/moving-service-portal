<div class="flex mb-2">
    <div class="mr-1">{!! Former::select($prefix.'month','Month')->options(\App\Options\DateMonth::get('-MM-')) !!}</div>
    <div class="mr-1">{!! Former::select($prefix.'day','Day')->options(\App\Options\DateDay::get('-DD-')) !!}</div>
    <div class="mr-2">{!! Former::select($prefix.'year','Year')->options(\App\Options\DateYear::get('-YYYY-')) !!}</div>
    <div class="mr-1">{!! Former::select($prefix.'hour','Hour')->options(\App\Options\DateHour::get('-HH-')) !!}</div>
    <div class="mr-1">{!! Former::select($prefix.'minute','Minute')->options(\App\Options\DateMinute::get('-MM-')) !!}</div>
    <div class="mr-1">{!! Former::select($prefix.'ampm','AM / PM')->options(\App\Options\DateAMPM::get('-AM/PM-')) !!}</div>
</div>