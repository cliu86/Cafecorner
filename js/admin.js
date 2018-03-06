(function ($) {
    function display (){
        $.getJSON('../controller/display_user_list.php', function(data){
            //console.log(data);
            var content = '';
            $(data).each(function(index, value){
                if(value.first_name !=null){
                    content+= '<tr>';
                    content+= '<td>' + value.user_id + '</td>';
                    content+= '<td>' + value.first_name + '</td>';
                    content+= '<td>' + value.last_name + '</td>';
                    content+= '<td>' + value.email + '</td>';
                    content+= '<td>' + value.phone + '</td>';
                 //   content+= '<td>' + value.receive_discount + '</td>';
                    content+= '<td><i class="btnEdit fa fa-pencil-square-o fa-lg" data-toggle="modal" data-target=".admin_edit">'
                        +'<span class="hidden user_id">' +value.user_id+ '</span></i>'
                        +'<i style="margin-left: 1em" class="btnDelete fa fa-trash-o fa-lg"></i>'
                        +'<i style="margin-left: 1em" class="btnViewOrder fa fa-shopping-cart fa-lg">'
                        + '<span class="hidden user_id">' +value.user_id+ '</span></i></td>';
                    content+= '</tr>';
                }
            });

            $('.user_list').html(content);
        });
    }

    /* ----------------------Edit user ----------------------*/
    $('.user_list').delegate('.btnEdit', 'click', function(){
        //Remove the validation caused by last open
        $('#admin_form .form-group').removeClass('has-error has-success');
        $('#admin_form .form-group span').addClass('hidden');
        //Get user id
        var user_id = $(this).text().trim();
        //console.log(temp);
        $.post('../controller/admin.php?action=edit',
            {user_id: user_id},
            function(data){
                var temp = JSON.parse(data);
                //console.log(temp[0].first_name);
                $('#admin_user_id').val(temp[0].user_id);
                $('#admin_first_name').val(temp[0].first_name);
                $('#admin_last_name').val(temp[0].last_name);
                $('#admin_email_address').val(temp[0].email);
                $('#admin_phone_number').val(temp[0].phone);
                $('#admin_receive_discount').val(temp[0].receive_discount);
            }
        );

    });

    /*--------------------update user info and Save change--------------------*/
    $('.btn_admin_submit').on('click', function(){
       // console.log( 'sdsdsd');
        function trim(value) {
            return value.replace(/^\s+|\s+$/gm,'');
        }
        var fname = trim($('#admin_first_name').val());
        var lname = trim($('#admin_last_name').val());
        var phone = trim($('#admin_phone_number').val());
        var discount = $('#admin_receive_discount').val();
        var email = trim($('#admin_email_address').val());
        var user_id = trim($('#admin_user_id').val());

        var validFN, validLN, validP, validD;
        var validName = new RegExp("^[a-zA-Z0-9_-]{3,16}$");
        var validPhone = new RegExp("^[a-zA-Z0-9_-]{10}$");
        //Check first name
        if(fname.match(validName)) {
            $('#fn_input').removeClass('has-error');
            $('#fn_input').addClass('has-success');
            $('#helper_fn').addClass('hidden');
            validFN =true
        }else{
            $('#fn_input').removeClass('has-success');
            $('#fn_input').addClass('has-error');
            $('#helper_fn').removeClass('hidden');
            validFN =false
        }
        //Check last name
        if(lname.match(validName)) {
            $('#ln_input').removeClass('has-error');
            $('#ln_input').addClass('has-success');
            $('#helper_ln').addClass('hidden');
            validLN =true
        }else{
            $('#ln_input').removeClass('has-success');
            $('#ln_input').addClass('has-error');
            $('#helper_ln').removeClass('hidden');
            validLN =false
        }
        //Check Phone mumber
        if(phone.match(validPhone)) {
            $('#phone_input').removeClass('has-error');
            $('#phone_input').addClass('has-success');
            $('#helper_phone').addClass('hidden');
            validP =true
        }else{
            $('#phone_input').removeClass('has-success');
            $('#phone_input').addClass('has-error');
            $('#helper_phone').removeClass('hidden');
            validP = false
        }
        //Check receive discount
        if(discount.length!=0) {
            $('#discount_input').removeClass('has-error');
            $('#discount_input').addClass('has-success');
            $('#helper_discount').addClass('hidden');
            validD =true
        }else{
            $('#discount_input').removeClass('has-success');
            $('#discount_input').addClass('has-error');
            $('#helper_discount').removeClass('hidden');
            validD =false
        }

         //Submit the data if all valid
         if (validFN ==true && validLN ==true && validP==true &&validD==true){
                //alert('sdsd')
             $.post('../controller/admin.php?action=updateUser',
                 {
                     user_id: user_id,
                     first_name:fname,
                     last_name:lname,
                     email:email,
                     phone:phone,
                     discount:discount
                 },
                 function () {
                     $.confirm({
                         columnClass: 'col-md-8 col-md-offset-2',
                         animation: 'RotateXR',
                         autoClose: 'cancel|8000',
                         theme: 'black',
                         icon: 'fa fa-check-square-o',
                         title: 'Confirmation Required!',
                         content: '<h4>Do you really want to save this update?</h4>',
                         confirm: function(){
                             $('.admin_edit').modal('hide');
                             display ();
                         },
                         cancel: function(){
                           //Do nothing
                         }
                     });

                 }
             );
         }
    });

    /* ----------------------Delete user ----------------------*/
    $('.user_list').delegate('.btnDelete', 'click', function(){
        //Get user id
        var user_id = $(this).prev().text().trim();
        $.confirm({
            columnClass: 'col-md-8 col-md-offset-2',
            animation: 'RotateXR',
            autoClose: 'cancel|5000',
            theme: 'black',
            icon: 'fa fa-check-square-o',
            title: 'Confirmation Required!',
            content: '<h4>Do you really want to delete this user?</h4>',
            confirm: function(){
                //console.log(user_id);
                $.post('../controller/admin.php?action=delete',
                    {user_id: user_id},
                    function(data){
                        if(data =='Delete Successfully!'){
                            $.alert({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-hand-peace-o',
                                title: '<h3>' + data + '</h3>',
                                content: '<h4>This users has been removed from our database.</h4> '
                            });
                        }
                        if(data =='Error'){
                            $.alert({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-warning',
                                title: '<h3>' + data + '!</h3>',
                                content: '<h4>This is an administrator account, you cannot delete this.</h4> '
                            });
                        }
                    }
                );
                //After delte, show the updated user list
              display ();
            },
            cancel: function(){
                // $.alert('Canceled!')
            }
        });
    });




    /* ----------------------View Customer Order----------------------*/
    $('.user_list').delegate('.btnViewOrder', 'click', function(){
        var user_id = $(this).text().trim();
        // console.log(user_id);
        $.post('../controller/admin.php?action=viewOrder',
            {user_id: user_id},
            function(data){
                var dataArray = JSON.parse(data);
              // console.log(dataArray);
                var content ='';
                content += '<table class="table ">';
                content+=' <thead><tr>'
                    + '<th style="font-size: large"><i class="fa fa-cutlery" aria-hidden="true" style="margin-right: 0.8em"></i>Food Name</th>'
                    + '<th style="font-size: large"><i class="fa fa-money" aria-hidden="true" style="margin-right: 0.8em"></i>Food Price </th>'
                    +'<th>Note</th>'
                    + '</tr></thead>';
                content+= '<tbody>';
                $.each( dataArray, function (key, value) {
                    // console.log(value.first_name);
                    if(value.food_name!=null &&value.food_price!=null){
                        content+= '<tr>';
                        content+= '<td style="font-size: larger">' + value.food_name + '</td>';
                        content+= '<td style="font-size: larger"><i>$ </i>' + value.food_price + '</td>';
                        content+= '<td style="font-size: larger">' + value.note + '</td>';
                        content+= '</tr>';
                    }
                });
                content+= '</tbody></table>';

                $.alert({
                    columnClass: 'col-md-10 col-md-offset-1',
                    animation: 'RotateXR',
                    theme: 'black',
                    icon: 'fa fa-star-o',
                    title: 'Order History',
                    content: content,
                });
            }
        );

    });


    /*--------------------Search --------------------*/
    $('#btnSearch').on('click', function(){
        //$('#formProduct').removeClass('col-lg-6').addClass('hidden');
        //Clear the content
        $('.user_list').html('');
        //Get search text and search label
        var txtSearch = $('#txtSearchResult').val().trim();
        var txtSearchLabel = $('#searchLabel').val().trim();
        // console.log(txtSearchLabel);
        $.post('../controller/admin.php?action=search',
                {
                    txtSearch: txtSearch,
                    txtSearchLabel: txtSearchLabel
                },
                function(data){
                    if(data !='No result found!'){
                        var content = '';
                        var dataArray = $.parseJSON(data);
                        // var temp = JSON.stringify(data);
                        // $('.user_list').html(content);
                        $.each( dataArray, function (key, value) {
                            // console.log(value.first_name);
                            content+= '<tr>';
                            content+= '<td>' + value.user_id + '</td>';
                            content+= '<td>' + value.first_name + '</td>';
                            content+= '<td>' + value.last_name + '</td>';
                            content+= '<td>' + value.email + '</td>';
                            content+= '<td>' + value.phone + '</td>';
                          //  content+= '<td>' + value.receive_discount + '</td>';
                            content+= '<td><i class="btnEdit fa fa-pencil-square-o fa-lg" data-toggle="modal" data-target=".admin_edit">'
                                +'<span class="hidden user_id">' +value.user_id+ '</span></i>'
                                +'<i style="margin-left: 1em" class="btnDelete fa fa-trash-o fa-lg"></i>'
                                +'<i style="margin-left: 1em" class="btnViewOrder fa fa-shopping-cart fa-lg">'
                                + '<span class="hidden user_id">' +value.user_id+ '</span></i></td>';

                            content+= '</tr>';
                        });

                        $('.user_list').html(content).addClass('animated lightSpeedIn');
                    }else{
                        $.alert({
                            columnClass: 'col-md-6 col-md-offset-3',
                            backgroundDismiss: true,
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-warning',
                            title: 'No result Found!',
                            content: '<h4>Please check the information you entered!</h4>'
                        });
                    }

                }
        );
    });


    /*-------------------------Add new product --------------------------*/
    $('#btnAddProduct').on('click', function () {
        //Remove the validation caused by last open
        $('#product_add_form .form-group').removeClass('has-error has-success');
        $('#product_add_form .form-group span').addClass('hidden');
    });


    $('#btnAddProductSubmit').on('click', function(){
        var productName = $('#productName').val().trim();
        var productPrice = $('#productPrice').val().trim();
        var productDesc = $('#productDesc').val().trim();
        var productCategory = $('#productCategory').val().trim();


        var validPN, validPP, validPD, validPC;

        //Check product name
        if(productName.length>0) {
            $('#addProductName').removeClass('has-error').addClass('has-success');
            $('#productNameError').addClass('hidden');
            validPN =true
        }else{
            $('#addProductName').removeClass('has-success').addClass('has-error');
            $('#productNameError').removeClass('hidden');
            validPN =false
        }

        //Check Product price
        if(productPrice>0) {
            $('#addProductPrice').removeClass('has-error').addClass('has-success');
            $('#productPriceError').addClass('hidden');
            validPP =true
        }else{
            $('#addProductPrice').removeClass('has-success').addClass('has-error');
            $('#productPriceError').removeClass('hidden');
            validPP =false
        }

        //Check Product Desc name
        if(productDesc.length>0) {
            $('#addProductDesc').removeClass('has-error').addClass('has-success');
            $('#productDescError').addClass('hidden');
            validPD =true
        }else{
            $('#addProductDesc').removeClass('has-success').addClass('has-error');
            $('#productDescError').removeClass('hidden');
            validPD =false
        }

        //Check Product Category
        if(productCategory.length>0) {
            $('#addProductCategory').removeClass('has-error').addClass('has-success');
            $('#productCategoryError').addClass('hidden');
            validPC =true
        }else{
            $('#addProductCategory').removeClass('has-success').addClass('has-error');
            $('#productCategoryError').removeClass('hidden');
            validPC =false
        }

        //Submit the data if all valid
        if (validPN ==true && validPP ==true && validPD==true &&validPC==true){
            $.confirm({
                columnClass: 'col-md-8 col-md-offset-2',
                animation: 'RotateXR',
                autoClose: 'cancel|5000',
                theme: 'black',
                icon: 'fa fa-check-square-o',
                title: 'Confirmation Required!',
                content: '<h4>Do you really want to add this product?</h4>',
                confirm: function(){
                    $.post('../controller/admin.php?action=addProduct',
                        {
                            productName: productName,
                            productPrice:productPrice,
                            productDesc:productDesc,
                            productCategory: productCategory
                        },
                        function (data) {
                            if(data == 'Insert has been done'){
                                $('#productName').val('');
                                $('#productPrice').val('');
                                $('#productDesc').val('');
                                $('#productCategory').val('');

                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    backgroundDismiss: true,
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-hand-peace-o',
                                    title: 'Successfully!',
                                    content: '<h4>'+data+'</h4>'
                                });
                                //Remove the validation caused by last open
                                $('#product_add_form .form-group').removeClass('has-error has-success');
                                $('#product_add_form .form-group span').addClass('hidden');
                            }else{
                                $.alert({
                                    columnClass: 'col-md-6 col-md-offset-3',
                                    backgroundDismiss: true,
                                    animation: 'RotateXR',
                                    theme: 'black',
                                    icon: 'fa fa-warning',
                                    title: 'No result Found!',
                                    content: '<h4>'+data+'</h4>'
                                });
                            }

                        }
                    );
                },
                cancel: function(){
                    // $.alert('Canceled!')
                }
            });
        }
    });

    /* ---------------- Show the all the product ------------------------*/
    function display_product(){
        $.getJSON('../controller/admin.php?action=displayProduct', function(data){

            //Clear the content
            $('.product_list').html('');
            var content = '';
            // var temp = JSON.stringify(data);
            // $('.user_list').html(content);
            $.each(data, function (key, value) {
                // console.log(value.first_name);
                content+= '<tr>';
                content+= '<td>' + value.product_id + '</td>';
                content+= '<td>' + value.product_name + '</td>';
                content+= '<td>' + value.product_price + '</td>';
                content+= '<td>' + value.product_category + '</td>';
               // content+= '<td>' + value.product_desc + '</td>';
                content+= '<td><i class="btnEdit fa fa-pencil-square-o fa-lg" data-toggle="modal" data-target=".product_edit">'
                    +'<span class="hidden product_id">' +value.product_id+ '</span></i>'
                    +'<i style="margin-left: 1em" class="btnDelete fa fa-trash-o fa-lg"></i>'
                    + '<span class="hidden product_id">' +value.product_id+ '</span></i></td>';
                content+= '</tr>';
            });

            $('.product_list').html(content);
        });
    }

   display_product();

    /* -----------------Edit Product ------------------------*/
    $('.product_list').delegate('.btnEdit', 'click', function(){
        //Remove the validation caused by last open
        $('#product_edit_form .form-group').removeClass('has-error has-success');
        $('#product_edit_form .form-group span').addClass('hidden');
        var id = $(this).text().trim();
        //console.log(temp);
        $.post('../controller/admin.php?action=editProduct',
            {product_id: id},
            function(data){
                var temp = JSON.parse(data);
                //console.log(temp[0].first_name);
                $('#product_id').val(temp[0].product_id);
                $('#product_name').val(temp[0].product_name);
                $('#product_price').val(temp[0].product_price);
                $('#product_desc').val(temp[0].product_desc);
                $('#product_category').val(temp[0].product_category);
            }
        );
    });

    $('.btn_product_submit').on('click', function(){
        // console.log( 'sdsdsd');
        function trim(value) {
            return value.replace(/^\s+|\s+$/gm,'');
        }
        var product_name = trim($('#product_name').val());
        var product_price= trim($('#product_price').val());
        var product_desc= trim($('#product_desc').val());
        var product_id = trim($('#product_id').val());
        var product_category = trim($('#product_category').val());

        var validPN, validPP, validPD, validPC;
        //Check product name
        if(product_name.length>0) {
            $('#pn_input').removeClass('has-error').addClass('has-success');
            $('#helper_pn').addClass('hidden');
            validPN =true
        }else{
            $('#pn_input').removeClass('has-success').addClass('has-error');
            $('#helper_pn').removeClass('hidden');
            validPN =false
        }
        //Check product price
        if(product_price>0) {
            $('#pp_input').removeClass('has-error').addClass('has-success');
            $('#helper_pp').addClass('hidden');
            validPP =true
        }else{
            $('#pp_input').removeClass('has-success').addClass('has-error');
            $('#helper_pp').removeClass('hidden');
            validPP =false
        }
        //Check product desc
        if(product_desc.length>0) {
            $('#pd_input').removeClass('has-error').addClass('has-success');
            $('#helper_pd').addClass('hidden');
            validPD =true
        }else{
            $('#pd_input').removeClass('has-success').addClass('has-error');
            $('#helper_pd').removeClass('hidden');
            validPD = false
        }
        //Check product Category
        if(product_category.length>0) {
            $('#pc_input').removeClass('has-error').addClass('has-success');
            $('#helper_pc').addClass('hidden');
            validPC =true
        }else{
            $('#pc_input').removeClass('has-success').addClass('has-error');
            $('#helper_pc').removeClass('hidden');
            validPC = false
        }

        //Submit the data if all valid
        if (validPN ==true && validPP ==true && validPD==true && validPC ==true ){
            //alert('sdsd')
            $.post('../controller/admin.php?action=updateProduct',
                {
                    product_id:product_id,
                    product_name: product_name,
                    product_price: product_price,
                    product_desc: product_desc,
                    product_category: product_category
                },
                function () {
                    $.confirm({
                        columnClass: 'col-md-8 col-md-offset-2',
                        animation: 'RotateXR',
                        autoClose: 'cancel|8000',
                        theme: 'black',
                        icon: 'fa fa-check-square-o',
                        title: 'Confirmation Required!',
                        content: '<h4>Do you really want to save this update?</h4>',
                        confirm: function(){
                            $('.product_edit').modal('hide');
                            display_product();
                        },
                        cancel: function(){
                            //Do nothing
                        }
                    });

                }
            );
        }
    });

    /* ----------------------Delete Product----------------------*/
    $('.product_list').delegate('.btnDelete', 'click', function(){
        //Get product id
        var product_id = $(this).prev().text().trim();
        $.confirm({
            columnClass: 'col-md-8 col-md-offset-2',
            animation: 'RotateXR',
            autoClose: 'cancel|5000',
            theme: 'black',
            icon: 'fa fa-check-square-o',
            title: 'Confirmation Required!',
            content: '<h4>Do you really want to delete this product?</h4>',
            confirm: function(){
                //console.log(user_id);
                $.post('../controller/admin.php?action=deleteProduct',
                    {product_id: product_id},
                    function(data){
                        if(data =='Delete Successfully!'){
                            $.alert({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-hand-peace-o',
                                title: '<h3>' + data + '</h3>',
                                content: '<h4>This product has been removed from our database.</h4> '
                            });
                        }
                    }
                );
                //After delte, show the updated user list
                display_product();
            },
            cancel: function(){
                // $.alert('Canceled!')
            }
        });
    });

})(jQuery);




















