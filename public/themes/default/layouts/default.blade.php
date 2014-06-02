<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::getContentArgument('subtitle').' '.Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        {{ Theme::asset()->styles() }}
        {{ Theme::asset()->scripts() }}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
    <body>
        <div class="wrapper">
            <div class="header_container">
                {{ Theme::partial('header') }}
            </div>
            <a name="go"></a>
            <div id="menu" class="navigation_container">
                {{ Theme::partial('nav') }}
            </div>
            <div class="section_container">
                @if (Theme::hasContentArgument('page'))
                    {{ Theme::partial(Theme::getContentArgument('page')) }}
                @else 
                    {{ Theme::partial('home') }}
                @endif
            </div>

<!--            <div class="container">
                {{-- Theme::content() --}}
            </div> -->

            <div class="footer_container">
                {{ Theme::partial('footer') }}
            </div>

            {{ Theme::asset()->container('footer')->scripts() }}
        </div>
    </body>
</html>