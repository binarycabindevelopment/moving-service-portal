@component('components.links.link',[
    'url' => $url,
    'classes' => 'text-lg leading-normal text-blue hover:text-blue-dark no-underline ml-8',
])
    {!! $slot !!}
@endcomponent