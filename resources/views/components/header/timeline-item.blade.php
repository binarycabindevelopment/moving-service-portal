<div class="vertical-timeline-item vertical-timeline-element">
    <div>
        <span class="vertical-timeline-element-icon bounce-in">
            <i class="badge badge-dot badge-dot-xl badge-{{ $type ?? 'info' }}"> </i>
        </span>
        <div class="vertical-timeline-element-content bounce-in">
            <h4 class="timeline-title">{!! $title !!}</h4>
            {!! $slot ?? '' !!}
        </div>
    </div>
</div>