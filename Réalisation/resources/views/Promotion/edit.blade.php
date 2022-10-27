<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>


<body>

    <section>
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center pb-3">
                <div class="col col-lg-9 col-xl-7 card2">
                    <div class="card rounded-2 ">
                        <div class="card-body p-4">
                            <a class="btn btn-primary" href="{{ route('promotion.index') }}">Home</a>
                            <h4 class="text-center my-3 pb-3">Gestion de la promotion </h4>

                            <div class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="text" id="search" name="search"
                                            placeholder="&#xF002; Search " style="font-family:Arial, FontAwesome"
                                            class="form-control" />



                                        <div>
                                            <form
                                                action="{{ route('promotion.update', ['promotion' => $promotion->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <label for="name">Edit Promotion </label>
                                                <input type="text" id="name" name="NamePromotion"
                                                    value="{{ $promotion->NamePromotion }}">

                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                            <a href="{{ route('student.create', $promotion['id']) }}">ajouter
                                                apprenant</a>


                                                <table class="table mb-4 " id="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">Prénom</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col" class="d-flex  justify-content-center">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="table1" class="table1">
                                                        @foreach ($students as $student)
                                                            <tr>
                                                                <td scope="row">{{ $student['First_name'] }}</td>
                                                                <td scope="row">{{ $student['Last_name'] }}</td>
                                                                <td scope="row">{{ $student['Email'] }}</td>
                                                                <input type="hidden" name="PromotionID"
                                                                    value="{{ $student->PromotionID }}" id="idp">

                                                                <td class="d-flex   justify-content-end" >
                                                                    <button class=" btn btn-success edit mr-3"><a
                                                                            href="{{ route('student.edit', $student['Id_student']) }}">edit</a></button>
                                                                    <form
                                                                        action="{{ route('student.destroy', [$student->Id_student]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger edi">Supprimer</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>


                                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                            <!--
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        $promotion_id = $('#idp').val();

        $.ajax({
            type: 'get',
            url: '{{ URL::to('searchApprenant') }}',
            data: {
                'search': $value,
                'promotion_id': $promotion_id
            },
            success: function(data) {
                $('tbody').html(data);

            }
        })
    })
</script> -->
                                            <script type="text/javascript">
                                                $idpromo = $('#idp').val();
                                                $('#search').on('keyup', function() {
                                                    $value = $(this).val();
                                                    // if($value){
                                                    //     $('.table1').hide();
                                                    //     $('.table2').show();
                                                    // }
                                                    // else{
                                                    //     $('.table1').show();
                                                    //     $('.table2').hide();
                                                    // }
                                                    $.ajax({
                                                        type: 'get',
                                                        url: '{{ URL::to('searchstudent') }}',
                                                        data: {
                                                            'search': $value,
                                                            'PromotionID': $idpromo
                                                        },
                                                        success: function(data) {
                                                            console.log(data);
                                                            $('#table1').html(data);
                                                        }
                                                    });
                                                })
                                            </script>
