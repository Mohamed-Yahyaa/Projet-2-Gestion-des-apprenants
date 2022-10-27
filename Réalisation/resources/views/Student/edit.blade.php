<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    
    
    <body>
  
        <section>
          <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center pb-3">
              <div class="col col-lg-9 col-xl-7 card2">
                <div class="card rounded-2 ">
                  <div class="card-body p-4">
                         <a class="btn btn-primary"  href="{{ route('promotion.index') }}">Home</a>
                    <h4 class="text-center my-3 pb-3">Gestion de la promotion </h4>
      
                    <div class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                      <div class="col-6">
                        <div class="form-outline">
<div>
    <form action="{{route('student.update',[$student->Id_student])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <table class="table mb-4 " id="table">
            <label for="name">Edit apprenant </label>
            <input type="text"  name="First_name" value="{{$student->First_name}}" >
            <input type="text"  name="Last_name" value="{{$student->Last_name}}" >
            <input type="text"  name="Email" value="{{$student->Email}}" >
            <input type="hidden" name="PromotionID"  value='{{$student->PromotionID}}' >

        </div>

    </table>
    <button type="submit"
    class="btn btn-success edi" >Update</button>
</form>
</div>
</div>
</div>
</div>
</section>
       
