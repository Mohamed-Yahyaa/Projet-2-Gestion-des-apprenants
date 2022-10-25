@if(session('status'))
<h1 style="color: rgb(121, 234, 121)">{{ session('status') }}</h1>
@endif

search <input type="text" id="search">
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
        <tbody id="tbody">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/Search.js"></script>
</form>