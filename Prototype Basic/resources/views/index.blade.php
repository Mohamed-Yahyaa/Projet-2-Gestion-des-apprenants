<html>
    <body>
        <a href="create">Ajouter une promotion</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nom de promotion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $value)
                    
                
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->NamePromotion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>