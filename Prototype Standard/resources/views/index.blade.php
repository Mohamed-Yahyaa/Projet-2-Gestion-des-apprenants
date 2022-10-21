<a href="create">Ajouter une promotion</a>
<form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom promotion</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $value)
                
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->NamePromotion}}</td>
                <td>
                    <a href="edit/{{$value->id}}">Modifier</a>
                    <a href="delete/{{$value->id}}">Supprimer</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</form>