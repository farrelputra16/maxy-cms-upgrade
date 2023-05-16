<html>
    <head>

    </head>
    <body>
        <form action="" method="POST">
            @csrf
            <label for="">Jenenge sopo?</label><br>
            <input type="text" name="name"><br>
            <label for="">Email kowe</label><br>
            <input type="email" name="email"><br>
            <label for="">Password kowe</label><br>
            <input type="password" name="password" ><br>
            <label for="">ID Partner University Detail (ra iso diisi, abaikan)</label><br>
            <input type="email" name="id_partner_university_detail" value="3" disabled style="margin-bottom: 12px;"><br>
            <button type="submit">Daftar nengkene</button>
        </form>
    </body>
</html>