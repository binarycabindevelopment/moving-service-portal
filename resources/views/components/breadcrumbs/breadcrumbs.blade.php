<div class="breadcrumbs">
    @foreach($links as $linkLabel => $link)
        <a href="{{ $link }}" class="breadcrumb-item">{{ $linkLabel }}</a>
    @endforeach
</div>