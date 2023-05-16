<html>
    <head>
        
    </head>
    <body>
        <h3 style="margin-bottom: 12px;">Sugeng rawuh, {{ Auth::user()->name }}</h3>
        @foreach ($mybatch as $item)
            <p>Kowe terdaftar ning batch {{$item->batch}}</p> 
        @endforeach
        <form action="" method="post">
            <button type="submit">Logout nengkene</button>
        </form>
    </body>
</html>