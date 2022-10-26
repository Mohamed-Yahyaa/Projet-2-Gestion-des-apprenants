<h1>Update promotion</h1>
<div>
    <form action="{{route('student.update',[$student->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Edit apprenant </label>
            name:<input type="text"  name="First_name" value="{{$student->First_name}}" >
            last name:<input type="text"  name="Last_name" value="{{$student->Last_name}}" >
            email:<input type="text"  name="Email" value="{{$student->Email}}" >
            <input type="hidden" name="PromotionID"  value='{{$student->PromotionID}}' >

        </div>
       

        <button>Update</button>
    </form>
</div>