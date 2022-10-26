<h1>creer une promotion</h1>
<div>
    <form action="{{route('promotion.store')}}" method="post">
        @csrf
        <label for="name">Promotion Name</label>
        <input type="text" id="name" name="NamePromotion" >
        <button>Ajouter</button>
    </form>
</div>