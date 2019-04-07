<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Main</title>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Main
                </div>

                <div class="video">
                    <a href> https://www.youtube.com/watch?v={{ $video->id }} </a>
                </div>

            </div>
        </div>
    </body>
</html>
