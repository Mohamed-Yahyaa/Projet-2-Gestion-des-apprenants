
<div id="test">

</div>
<h1>Update promotion</h1>
<div>
    <form action="{{route('promotion.update',['promotion' => $promotion->id])}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Edit Promotion </label>
        <input type="text" id="name" name="NamePromotion" value="{{$promotion->NamePromotion}}" >

        <button>Update</button>
    </form>
</div>
<input type="text" id="search">
<div>
   
<a href="{{route('student.create',$promotion['id'])}}">ajouter apprenant</a>
    
    <table >
        <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>

                </tr>
        </thead>
        <tbody id="table1" class="table1">
           @foreach($students as $student)
            <tr>
                <td>{{$student['First_name']}}</td>
                <td>{{$student['Last_name']}}</td>
                <td>{{$student['Email']}}</td>
                <input type="hidden"  name="PromotionID" value="{{$student->PromotionID}}" id="idp" >

                <td>
                    <a href="{{route('student.edit',$student['Id_student'])}}">edit</a>
                    <form action="{{route('student.destroy',$student->Id_student)}}" method="POST">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- 
<script type="text/javascript">
      $('#search').on('keyup',function(){
        $value=$(this).val();
        $promotion_id=$('#idp').val();
      
    $.ajax({
        type:'get',
        url:'{{URL::to("searchApprenant")}}',
        data:{'search':$value,'promotion_id':$promotion_id},
        success:function(data){
            $('tbody').html(data);

        }
    })
    })

</script> -->
<script type="text/javascript">
    $idpromo=$('#idp').val();
        $('#search').on('keyup',function(){
            $value=$(this).val();
            // if($value){
            //     $('.table1').hide();
            //     $('.table2').show();
            // }
            // else{
            //     $('.table1').show();
            //     $('.table2').hide();
            // }
            $.ajax({
                type:'get',
                url:'{{URL::to("searchstudent")}}',
                data:{'search':$value,
                    'PromotionID':$idpromo},
                success:function(data){
                    console.log(data);
                    $('#table1').html(data);
                }
            });
        })
        </script>