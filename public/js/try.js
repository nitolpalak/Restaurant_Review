$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").on('click' , function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();
        var pre= {!! json_encode(url('/')) !!};
        var url= '/ajaxRequest';
        $.ajax({
            type:'POST',
            url:pre+url,
            data:{name:name, password:password, email:email},
            success:function(data){
                console.log("Success" , data);
                var opn = '<div id='+data.id+'>';
                var cls = '</div>';
                var btn = '<button class="button-delete" value='+data.id+'>Delete</button>';
                var add = opn+name+btn+cls;
                $('#names').append(add);
                $('#name').val("");
                $('#password').val("");
                $('#email').val("");

//                $('.button-delete').each(function () {
//                    console.log("button found =>" + $(this).val());
//                });
                //alert(data.success);

//                $(".button-delete").on('click' , function(e){
//                    e.preventDefault();
//                    var id = $(this).val();
//                    var url = 'ajaxTestDelete/'+id;
//                    console.log(id);
//                    $.ajax({
//                        type:'POST',
//                        url:url,
//                        success:function(data){
//                            console.log("Success" , data);
//                            $('#'+id).remove();
//                            //alert(data.success);
//                        },
//                        error: function (data) {
//                            console.log('Error:', data);
//                        }
//                    });
//                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $(document).on('click' , '.button-delete' , function(e){
        e.preventDefault();
        var id = $(this).val();
        var url = 'ajaxTestDelete/'+id;
        console.log(" => "+id);
        $.ajax({
            type:'POST',
            url:url,
            success:function(data){
                console.log("Success" , data);
                $('#'+id).remove();
                //alert(data.success);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });