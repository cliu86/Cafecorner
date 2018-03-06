
$(document).ready(function(){

    function display_midLogo(){
        $('.mid-logo-symbol img').css('display', 'block');
    }
    setTimeout(display_midLogo, 1200);

    //Date picker
    $( "#date" ).datepicker();
   //AnimatedModal
    $(".btnJoinUs").animatedModal({
        animatedIn:'bounceIn',
        animatedOut:'bounceOut',
        color:'rgb(155, 27, 37)'
    });
    $("#animate-nav").animatedModal({
        animatedIn:'bounceIn',
        animatedOut:'bounceOut',
        color:'rgb(155, 27, 37)'
    });
    //Windows scroll
    $(window).scroll(function(){
        var carousel_offset = $('#carousel-example-generic').offset().top;
        //alert(carousel_offset);
        var scroll_position = $(window).scrollTop();
        if(scroll_position>=carousel_offset){
            $('#slideInNav').css('display', 'block');
        }else{
            $('#slideInNav').css('display', 'none');
        }
    });

    $('button.btn-get-offer').on('click', function(){
        $.alert({
            columnClass: 'col-md-6 col-md-offset-3',
            animation: 'RotateXR',
            theme: 'black',
            icon: 'fa fa-star-half-o',
            title: 'Congratulations! ',
            content: '<h4>Great! You have got this offer!</h4>',
            autoClose: 'confirm|5000'
        });
    });

    $('a.btn-get-offer').on('click', function(){
        $.alert({
            columnClass: 'col-md-6 col-md-offset-3',
            animation: 'RotateXR',
            theme: 'black',
            icon: 'fa fa-star-half-o',
            title: 'Thank you for your interest in Cafe Corner',
            content: '<h4>If you need more information, please visit Real Cafe News.</h4>',
            autoClose: 'confirm|7000'
        });
    });


    /*------------------------------Reservation Booking--------------------------------------*/


    $('#bookTable').on('submit',function(e){
        e.preventDefault();
    });

    $('#btnBookNow').on('click',function(){
        var num_of_people =$('#numberOfPeople').val();
        var reservation_date = $('#date').val();
        var reservation_time = $('#time').val();
        //check date make sure it is a date that in the future
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
        if(reservation_date.length==0 || checkDate(reservation_date)==false){
            $.alert({
                columnClass: 'col-md-6 col-md-offset-3',
                backgroundDismiss: true,
                animation: 'RotateXR',
                theme: 'black',
                icon: 'fa fa-warning',
                title: 'Required field missing!',
                content: '<h4>Please select a valid date!</h4>'
            });
        }else{
            $.confirm({
                columnClass: 'col-md-8 col-md-offset-2',
                animation: 'RotateXR',
                autoClose: 'cancel|8000',
                theme: 'black',
                icon: 'fa fa-check-square-o',
                title: 'Confirmation Required!',
                content: '<h4>Do you really want to make this reservation?</h4>',
                confirm: function(){
                    $.post('../controller/reservation.php?action=make_reservation',
                        {
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
                                    title:  data +'!',
                                    content: '<h4>All the postions are full, please select another one!</h4> '
                                });
                            }
                            else if (data =='Successfully'){
                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-hand-peace-o',
                                    title: data +'!',
                                    content: '<h4>Congratulations, the reservation has been made successfully!</h4> '
                                });
                            }
                            else{
                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-warning',
                                    title: 'Error!',
                                    content: '<h4>'+data+'</h4>'
                                });
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


    //MAKE AN ENQUIRY
    $('#formEnquiry').on('submit',function(e){
        e.preventDefault();
    });

    $('#btnSendEnquiry').on('click',function(){
        $.alert({
            columnClass: 'col-md-6 col-md-offset-3',
            animation: 'RotateXR',
            theme: 'black',
            icon: 'fa fa-star-o',
            title: 'Thank you for your interest in Cafe Corner.',
            content: '<h4>Due to the time limit, this section is currently not available.</h4>',
            autoClose: 'cancel|10000'
        });
    });

    // Email Subscribe
    $('#email_subscribe').prev().on('click', function(){
        $(this).css('cursor','pointer');
        if($(this).next().val().length!=0){
            $.alert({
                columnClass: 'col-md-6 col-md-offset-3',
                animation: 'RotateXR',
                theme: 'black',
                icon: 'fa fa-star-o',
                title: 'Email Added Successfully',
                content: '<h4>Thank you for your interest in Cafe Corner</h4>',
                autoClose: 'confirm|5000'
            });
        }else{
            $.alert({
                columnClass: 'col-md-6 col-md-offset-3',
                backgroundDismiss: true,
                animation: 'RotateXR',
                theme: 'black',
                icon: 'fa fa-warning',
                autoClose: 'confirm|5000',
                title: 'Required field missing!',
                content: '<h4>Email Address can not be empty!</h4>'
            });
        }
    });
});



/*-------------------------Reservation Status --------------------------*/
$('div.btn-group a[title=btnReservationStatus]').on('click', function(){
    $.getJSON('../controller/reservation.php?action=check_reservation', function(data){

        //console.log(data);
        var content = '<table id="reservationTable" class="table">';
        content+=' <thead><tr><th style="font-size: large"><span class="hidden-xs">Reservation</span>ID#</th>' +
            '<th style="font-size: large"><span class="hidden-xs">People</span><i style="margin-left: 6px" class="fa fa-users" aria-hidden="true"></i></th>'
            + '<th style="font-size: large"><span class="hidden-xs">Reservation date</span><i style="margin-left: 6px" class="fa fa-calendar" aria-hidden="true"></i></th> '
            + '<th style="font-size: large"><span class="hidden-xs">Time Period</span><i style="margin-left: 6px" class="fa fa-clock-o" aria-hidden="true"></th> '
            + '<th>'+' '+'</th></tr></thead>';
        content+= '<tbody>';

        $(data).each(function(index, value){
            if(value.people!=null || value.reservation_date!=null){
                content+= '<tr>';
                content+= '<td style="font-size: larger">' + value.reservation_id + '</td>';
                content+= '<td style="font-size: larger">' + value.people + '</td>';
                content+= '<td style="font-size: larger">' + value.reservation_date+ '</td>';
                content+= '<td style="font-size: larger">' + value.reservation_time+ '</td>';
                content+= '</tr>';
            }
        });

        content+= '</tbody></table>';

        $.alert({
            columnClass: 'col-md-10 col-md-offset-1',
            animation: 'RotateXR',
            theme: 'black',
            icon: 'fa fa-star-half-o',
            title: 'Reservation Status',
            content: content
        });

    });
});
























