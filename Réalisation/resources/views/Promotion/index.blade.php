
           <h1>Liste des promotions</h1>
           <div class="search">
               <input type="text" id="search" placeholder="Chercher promotion">
           </div>
   
           <a href="{{route('promotion.create')}}">Create promotion</a>

           <table id="promotions">
               <thead >
                   <tr>
                       <th>Id</th>
                       <th>Nom</th>
                       <th>fonctions</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach($promotion as $promotion)
                       <tr>
                           <td scope="row">{{ $promotion['id'] }}</td>
                           <td> 

                               <a href="{{route('promotion.show',['promotion'=>$promotion['id']])}}">
                                   <li>{{ $promotion['NamePromotion'] }} </li>
                               </a>
                           </td>
                           <td>
                               <a href="{{route('promotion.edit',$promotion['id'])}}">edit</a>
                               <form action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <input  type="submit" value="Delete" />
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
