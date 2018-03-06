(function ($) {
    /*------------------------------Order food online--------------------------------------*/
// Show or hidden the menu list
    $('a.dinner-menu').on('click', function(){
        $('.order-menu-main').toggleClass("hidden");
        $('.big-menu').toggleClass("hidden");
        $('.order-menu-new').toggleClass("hidden");
        $('.order-menu-special').toggleClass("hidden");
        $('.order-menu-drink').toggleClass("hidden");
    });


    $('a.dinner-menu-new').on('click', function(){
        $('.order-menu-new').toggleClass("hidden");
        $('.big-menu').toggleClass("hidden");
    });

    $('a.dinner-menu-special').on('click', function(){
        $('.order-menu-special').toggleClass("hidden");
        $('.big-menu').toggleClass("hidden");
    });

    $('a.dinner-menu-drink').on('click', function(){
        $('.order-menu-drink').toggleClass("hidden");
        $('.big-menu').toggleClass("hidden");
    });



    $('button.btnCloseMenu').on('click', function(){
        $('.big-menu').removeClass("hidden");
        $('.order-menu-main').addClass("hidden");
        //Reset all plusButton to its original color
        $('h4 i').css('color', '#fbf7ef');
    });

    /* -----------------Menu Page - order button  --------------------------*/
    var plusButton = '.order-menu-left>h4 .fa-plus-square, .order-menu-right>h4 .fa-plus-square';
    $(plusButton).on('click', function(){
        var itemName = $(this).parents().siblings('.dish-name').text();
        var itemPrice = $(this).siblings('.dish-price').text();
        if(can_order ==true){
            //Set the plusButton color to gold
            $(this).css('color', '#d9a32e');
            $.post('../controller/order.php?action=add_order',
                {
                    order_name: itemName,
                    order_price: itemPrice
                },
                function(data){
                    if(data.length!=0){
                        $.dialog({
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-warning',
                            title: 'Error!',
                            content: data
                        });
                    }
                }
            );
        }else{

        }

    });

    /* -----------------Order List  --------------------------*/
    $('#btnOrderList').on('click', function(){
        function getOrderList(){
            $.getJSON('../controller/order.php?action=view_order', function(data){
                var content = '';
                var total_price = 0;
                for (var i = 0;i<data.length;i++){
                    var temp = data[i].food_price;
                    if (temp != null){
                        total_price+=eval(temp);
                    }
                }
                // console.log(eval(total_price));
                $(data).each(function(index, value){
                    if(value.food_name !=null){
                        content+= '<tr>';
                        content+= '<td>' + value.food_name + '</td>';
                        content+= '<td>' + '$ ' + value.food_price + '</td>';
                        content+= '<td colspan="2" class="hidden-xs">'+ value.note +'</td>';
                        content+= '<td class="hidden-xs hvr-pop"><i class="fa fa-trash-o fa-lg" aria-hidden="true"><span>'
                            +value.food_id+ '</span></i></td>';
                        content+= '<td class="hidden-xs hvr-pop"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"><span>'
                            +value.food_id+ '</span></i></td>';
                        content+= '<td class="hidden-xs hvr-pop"><i class="fa fa-plus-square fa-lg" aria-hidden="true"><span>'
                            +value.food_id+ '</span></i></td>';


                        content+= '</tr>';
                    }
                });
                content+= '<tr>' +'<td><b>Total Price</b></td>' +'<td><b>$ '+ eval(total_price).toPrecision(4)+'</b></td>' + '</tr>';

                $('#order_result').html(content);
            });
        }

        //Check it the user was registered and can order
        if (can_order == true){
            getOrderList();
            setInterval(getOrderList,1500);
        }else{
            localStorage.setItem('order_list',order_list);
            //console.log(order_list);
        }


    });

//Delete Order
    $("#order_result").delegate(".fa-trash-o", "click", function(){
        $(this).parentsUntil('tbody').fadeOut('1500');
        var food_id = $(this).children().text();
        $.post('../controller/order.php?action=delete_order',
            {
                food_id: food_id
            },
            function(data){
                if(data.length!=0){
                    $.dialog({
                        columnClass: 'col-md-6 col-md-offset-3',
                        animation: 'RotateXR',
                        theme: 'black',
                        icon: 'fa fa-warning',
                        title: 'Error!',
                        content: '<h3>' + data+  '<h3>'
                    });
                }
            }
        );
    });

    //add food note
    $("#order_result").delegate(".fa-pencil-square-o", "click", function(){
        var food_id = $(this).children().text();
        var content = '';
        $.post('../controller/order.php?action=add_note',
            {
                food_id: food_id
            },
            function(data){
                if(data.length!=0){
                    var temp = JSON.parse(data);
                    var content = '<table class="table" >';
                    content += '<thead><tr><th>Food Name</th><th>Food Price</th></tr></thead>';
                    content += '<tbody><tr><td>'+temp[0].food_name+'</td>';
                    content +='<td>$'+temp[0].food_price+'</td></tr>';
                    content +='</tbody></table>';
                    content += ' <input type="text" class="note form-control"  maxlength="30" placeholder="note to the order">';

                    $.confirm({
                        columnClass: 'col-md-6 col-md-offset-3',
                        animation: 'RotateXR',
                        theme: 'black',
                        icon: 'fa fa-check-square-o',
                        title: 'Add note to your order',
                        content: content,
                        confirm: function(){
                            var txtNote = $('input.note').val();
                            //console.log(txtNote);
                            $.post('../controller/order.php?action=save_note',
                                {
                                    food_id:temp[0].food_id,
                                    note:txtNote
                                },
                                function(){
                                    //do nothing
                                }
                            );
                        },
                        cancel: function(){
                            //Do nothing
                        }
                    });
                }
            }
        );
    });

    //add same food again
    $("#order_result").delegate(".fa-plus-square", "click", function(){
        var food_id = $(this).children().text();
       // alert(food_id);
        $.post('../controller/order.php?action=add_same_food',
            {
                food_id: food_id
            },
            function(data){
               if(data=='Error'){
                   $.dialog({
                       columnClass: 'col-md-6 col-md-offset-3',
                       animation: 'RotateXR',
                       theme: 'black',
                       icon: 'fa fa-warning',
                       title: 'Error!',
                       content: '<h3>' + data+  '<h3>'
                   });
               }
            }
        );
    });


})(jQuery);




