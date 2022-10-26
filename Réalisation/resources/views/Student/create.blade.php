<h1>ajouter apprenant</h1>
<div>
    <form action="{{route('student.store')}}" method="post">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="First_name" >
        </div>
        <div>
            <label for="name">Prénom</label>
            <input type="text" id="name" name="Last_name" >
        </div> 
        <div>
            <label for="name">Email</label>
            <input type="text" id="name" name="Email" >
        </div>
        <div>
            <input type="hidden" name="PromotionID"  value='{{$PromotionID}}' >
        </div>
        <button>Ajouter</button>

    </form>
</div>