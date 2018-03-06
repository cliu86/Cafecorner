(function ($) {
    var p_user_id;
    $.getJSON('../controller/membership.php?action=display', function(data){
        //console.log(data[0].first_name);
        p_user_id = data[0].user_id;
        $('#profile_fn').val(data[0].first_name) ;
        $('#profile_ln').val(data[0].last_name) ;
        $('#profile_phone').val(data[0].phone) ;
        $('#profile_email').val(data[0].email) ;
        $('#profile_receive_discount').val(data[0].receive_discount) ;
    });

    $('#btnProfileSave').on('click',function () {
        var p_fn =  $('#profile_fn').val().trim();
        var p_ln =  $('#profile_ln').val().trim();
        var p_phone =  $('#profile_phone').val().trim();
        var p_email =  $('#profile_email').val().trim();
        var p_pw =  $('#profile_password').val().trim();
        var p_cpw=  $('#profile_confirm_password').val().trim();
        var p_rd =  $('#profile_receive_discount').val();

        var validName = new RegExp("^[a-zA-Z0-9_-]{3,16}$");
        var validEmail = new RegExp("([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|edu|com|cn)|([0-9]{1,3}\.{3}[0-9]{1,3}))");
        var validPhone = new RegExp("^[a-zA-Z0-9_-]{10}$");
        var validPassword = new RegExp("^(?![0-9]{6})[0-9a-zA-Z]{6}$");

        var validFN, validLN, validP,validE,validPW, validCPW ,validD;
        //First name
        if(p_fn.match(validName)) {
            $('#helper_fn').addClass('hidden');
            validFN =true
        }else{
            $('#helper_fn').removeClass('hidden');
            validFN =false
        }
        //Last name
        if(p_ln.match(validName)) {
            $('#helper_ln').addClass('hidden');
            validLN =true
        }else{
            $('#helper_ln').removeClass('hidden');
            validLN =false
        }

        //Check Phone mumber
        if(p_phone.match(validPhone)) {
            $('#helper_phone').addClass('hidden');
            validP =true
        }else{
            $('#helper_phone').removeClass('hidden');
            validP = false
        }

        //Check email
        if(p_email.match(validEmail)) {
            $('#helper_email').addClass('hidden');
            validE =true
        }else{
            $('#helper_email').removeClass('hidden');
            validE = false
        }
        //Check password
        if(p_pw.match(validPassword)) {
            $('#helper_password').addClass('hidden');
            validPW =true
        }else{
            $('#helper_password').removeClass('hidden');
            validPW = false
        }
        //Check confirm password
        if(p_pw === p_cpw&&p_cpw.length>0) {
            $('#helper_confirm_password').addClass('hidden');
            validCPW =true
        }else{
            $('#helper_confirm_password').removeClass('hidden');
            validCPW = false
        }
        //Check receive discount
        if(p_rd.length!=0) {
            $('#helper_discount').addClass('hidden');
            validD =true
        }else{
            $('#helper_discount').removeClass('hidden');
            validD =false
        }


        //Submit the data if all valid
        if (validFN ===true && validLN ===true && validP===true &&validE ===true
            &&validPW ===true&&validCPW ===true &&validD===true){
            $.confirm({
                columnClass: 'col-md-8 col-md-offset-2',
                animation: 'RotateXR',
                autoClose: 'cancel|8000',
                theme: 'black',
                icon: 'fa fa-check-square-o',
                title: 'Confirmation Required!',
                content: '<h4>Do you really want to save this update?</h4>',
                confirm: function(){
                    $.post('../controller/membership.php?action=update',
                        {
                            user_id: p_user_id,
                            first_name:p_fn,
                            last_name:p_ln,
                            email:p_email,
                            phone:p_phone,
                            password:p_pw,
                            discount:p_rd
                        },
                        function () {
                            $.alert({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-star-half-o',
                                title: 'Update successfully!',
                                content: '',
                                autoClose: 'confirm|5000'
                            });
                        }
                    );
                },
                cancel: function(){
                    //Do nothing
                }
            });

        }
    });

    //Date picker
    $( "#reservation_date" ).datepicker();

    function displayReservation() {
        /* -------------- Get reservation status   ---------------------*/
        $.getJSON('../controller/membership.php?action=displayReservation', function(data){
            var content = '';
            $(data).each(function(index, value){
                if(value.people!=null){
                    content+= '<tr>';
                    content+= '<td>' + value.reservation_id + '</td>';
                    content+= '<td>' + value.reservation_date + '</td>';
                    content+= '<td>' + value.people + '</td>';
                    content+= '<td>' + value.reservation_time + '</td>';
                    //   content+= '<td>' + value.receive_discount + '</td>';
                    content+= '<td><i class="btnEdit fa fa-pencil-square-o fa-lg" data-toggle="modal" data-target=".reservation_edit">'
                        +'<span class="hidden user_id">' +value.reservation_id+ '</span></i>'
                        +'<i style="margin-left: 1em" class="btnDelete fa fa-trash-o fa-lg"></i>'
                        + '<span class="hidden user_id">' +value.reservation_id+ '</span></i></td>';
                    content+= '</tr>';
                }
            });
            $('.reservation_list').html(content);
        });
    };

    displayReservation();

    /* -----------------Edit Reservation ------------------------*/
    $('.reservation_list').delegate('.btnEdit', 'click', function(){
        //Remove the validation caused by last open
        $('#reservation_edit_form .form-group').removeClass('has-error has-success');
        $('#reservation_edit_form .form-group span').addClass('hidden');
        var reservation_id = $(this).text().trim();
        //console.log(temp);
        $.post('../controller/membership.php?action=reservation',
            {reservation_id: reservation_id},
            function(data){
                var temp = JSON.parse(data);
                //console.log(temp[0].first_name);
                $('#reservation_id').text(temp[0].reservation_id);
                $('#num_of_people').val(temp[0].people);
                $('#reservation_date').val(temp[0].reservation_date);
                $('#reservation_time').val(temp[0].reservation_time);
            }
        );
    });


    /* -----------------Delete Reservation ------------------------*/
    $('.reservation_list').delegate('.btnDelete', 'click', function(){
        var id = $(this).prev().text().trim();
        $.confirm({
            columnClass: 'col-md-8 col-md-offset-2',
            animation: 'RotateXR',
            autoClose: 'cancel|5000',
            theme: 'black',
            icon: 'fa fa-check-square-o',
            title: 'Confirmation Required!',
            content: '<h4>Do you really want to delete this reservation?</h4>',
            confirm: function(){
                //console.log(user_id);
                $.post('../controller/membership.php?action=deleteReservation',
                    {reservation_id: id},
                    function(data){
                        if(data =='Delete Successfully!'){
                            $.alert({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-hand-peace-o',
                                title: '<h3>' + data + '</h3>',
                                content: '<h4>This reservation has been removed.</h4> '
                            });
                        }
                    }
                );
                //After delte, show the updated user list
                displayReservation();
            },
            cancel: function(){
                // $.alert('Canceled!')
            }
        });
    });

    $('.btn_reservation_submit').on('click', function(){
        var reservation_id=  $('#reservation_id').text().trim();
        var reservation_time = $('#reservation_time').val().trim();
        var num_of_people  =$('#num_of_people').val().trim();
        var reservation_date = $('#reservation_date').val().trim();
        var validNP, validRT, validRD;
        //Check Num of People
        if(num_of_people>0) {
            $('#np_input').removeClass('has-error').addClass('has-success');
            $('#helper_np').addClass('hidden');
            validNP =true
        }else{
            $('#np_input').removeClass('has-success').addClass('has-error');
            $('#helper_np').removeClass('hidden');
            validNP =false
        }
        //Check Reservation time
        if(reservation_time.length>0) {
            $('#rt_input').removeClass('has-error').addClass('has-success');
            $('#helper_rt').addClass('hidden');
            validRT =true;
        }else{
            $('#rt_input').removeClass('has-success').addClass('has-error');
            $('#helper_rt').removeClass('hidden');
            validRT =false;
        }

        //Check Reservation date
        function checkDate (dateString){
            var temp = dateString.replace('/', ',');
            var reservation_date = Date.parse(temp);
            var now = new Date();
            if(reservation_date>now){
                return true;
            }else{
                return false;
            }
        }

        if(reservation_date.length>0&&checkDate(reservation_date)==true) {
            $('#rd_input').removeClass('has-error').addClass('has-success');
            $('#helper_rd').addClass('hidden');
            validRD =true
        }else{
            $('#rd_input').removeClass('has-success').addClass('has-error');
            $('#helper_rd').removeClass('hidden');
            validRD =false
        }

        //Submit the data if all valid
        if (validNP ==true && validRT ==true && validRD==true){
            $.confirm({
                columnClass: 'col-md-8 col-md-offset-2',
                animation: 'RotateXR',
                autoClose: 'cancel|8000',
                theme: 'black',
                icon: 'fa fa-check-square-o',
                title: 'Confirmation Required!',
                content: '<h4>Do you really want to save this update?</h4>',
                confirm: function(){
                    $.post('../controller/membership.php?action=editReservation',
                        {
                            reservation_id: reservation_id,
                            num_of_people:num_of_people,
                            reservation_date:reservation_date,
                            reservation_time: reservation_time
                        },
                        function (data) {
                            if(data == 'Failed'){
                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-warning',
                                    title: 'Update '+data,
                                    content: '<h4>All the postions are full, please select another one!</h4> '
                                });
                            }else{
                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-hand-peace-o',
                                    title: 'Update '+ data,
                                    content: '<h4>Congratulations, the update has been made successfully!</h4> '
                                });
                                $('.reservation_edit').modal('hide');
                                displayReservation();
                            }
                        }
                    );
                },
                cancel: function(){
                    //Do nothing
                }
            });


        }
    });

})(jQuery);
