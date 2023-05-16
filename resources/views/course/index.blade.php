<html>
    <head>
        
    </head>
    <body>
        <p>ID kowe: {{$myuserid}}</p>
        <h3 style="margin-bottom: 12px;">Sugeng rawuh, {{ Auth::user()->name }}</h3>
        @foreach ($mybatch as $item)
            <p>Kowe terdaftar ning batch {{ $item->batch }}</p> 
        @endforeach
        <form action="" method="post">
            @csrf
            <button type="submit">Logout nengkene</button>
        </form>
        <h3>Kowe jupuk kursus ing:</h3>
        @foreach ($mycourse as $item)
            <li>{{ $item->course_name }}</li>
        @endforeach
    </body>
</html>