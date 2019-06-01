<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('metaTitle',config('app.name'))</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('metaTitle',config('app.name'))" />
<meta property="og:description" content="@yield('metaDescription','')" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:image" content="@yield('metaImage',asset('/img/media-card.png?a'))" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@steedlemoving" />
<meta name="twitter:title" content="@yield('metaTitle',config('app.name'))" />
<meta name="twitter:description" content="@yield('metaDescription','')" />
<meta name="twitter:image" content="@yield('metaImage',asset('/img/media-card.png?a'))" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">