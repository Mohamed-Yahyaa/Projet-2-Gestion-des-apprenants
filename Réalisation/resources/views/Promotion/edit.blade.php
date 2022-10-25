@foreach ($promotion as $valuee)
<h1>Modifier promotion</h1>
<form action="{{url("update")}}/{{$valuee->id}}" method="Post">
    @csrf
    <input type="text" value="{{$valuee->NamePromotion}}" name="name" >
    <button>Modifier</button>
</form>

@endforeach