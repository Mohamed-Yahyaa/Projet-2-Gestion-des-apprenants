
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  
  
  </head>
  
  <body>
  
    <section>
      <div class="container py-4 h-100">
        <div class="row  ">
          <div class="col col-lg-9 col-xl-7">
            <div class="card rounded-3 card2">
              <div class="card-body p-4">
  
                <h4 class="text-center my-3 pb-3">Gestion de la promotion </h4>
  
                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                  <div class="col-6">
                    <div class="form-outline">
                      <input type="text" id="search" name="search" placeholder="&#xF002; Search " style="font-family:Arial, FontAwesome" class="form-control" />
  
         
           {{-- <div class="search">
               <input type="text" id="search" placeholder="Chercher promotion">
           </div> --}}
           <div class="col-4 create-btn">
            <button type="submit" class="btn btn-primary "><a id="addNew"  href="{{route('promotion.create')}}">Create promotion</a> </button>
          </div>
   
           {{-- <a href="{{route('promotion.create')}}">Create promotion</a> --}}

           

                <table class="table mb-4" id="table">
               <thead >
                   <tr>
                       <th scope="col">Id</th>
                       <th scope="col">Nom</th>
                       <th scope="col" class="d-flex  justify-content-center">fonctions</th>
                   </tr>
               </thead>
               <tbody>
                <form action=""></form>
                   @foreach($promotion as $promotion)
                       <tr>
                           <td scope="row">{{ $promotion['id'] }}</td>
                           <td scope="row">{{ $promotion['NamePromotion'] }}</td>
               
                           <td class="d-flex  justify-content-end"  >
                            {{-- <a  href="{{route('promotion.show',['promotion'=>$promotion['id']])}}">
                                <li>{{ $promotion['NamePromotion'] }} </li>
                            </a> --}}
                             <button class=" btn btn-success edit mr-3"><a href="{{route('promotion.edit',$promotion['id'])}}">Edit</a></button>  
                               <form action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger edi">Supprimer</button> 
                               </form>
                           </td>
                       </tr>

                   @endforeach
               </tbody>
           
           </table>
       </div>
   </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">
   $('#search').on('keyup',function(){
       $value=$(this).val();
   $.ajax({
       type:'get',
       url:'{{URL::to('search')}}',
       data:{'search':$value},
       success:function(data){
           $('tbody').html(data);

       }
   })
   })

</script>
</body>
</html>
