<html>
    <head>
        @if ($title)
                <title>{{ $title }}</title>
        @else
                <title>CMS App</title>
        @endif
    </head>
    <body>
        <div>
          <a href="/home">Home</a> |
          @foreach ($categories as $key => $category)
            <a href="/category/{{ $category->slug }}">{{ $category->title }}</a> |
          @endforeach
          <a href="/add-page">Add New Category</a>
        </div>
        <hr/>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
