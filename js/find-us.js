(function ($) {
    var currentUrl = window.location.href;
    //Get url value
    var temp = currentUrl.split('/');
    var value = temp[temp.length-1].split('?')[1];
   // console.log(value);
    var url ='../controller/display_restaurant_detail.php?' +value ;
    $.getJSON(url, function(data){
        var dataArray = data.businesses[0];
       console.log(data);
        $('.find-us-text .restaurant-name').text(dataArray.name);
        $('.find-us-text .ratings img').attr('src', dataArray.rating_img_url);
        $('.find-us-text .ratings span').text('(Review count: ' +dataArray.review_count +')');
        $('.find-us-text .restaurant_categories').text(
            dataArray.categories[0][0]
        );
        $('.find-us-text .snippet_text').text('Snippet text: ' + dataArray.snippet_text);
        $('.restaurant-address ').append(
            '<dd style="font-size: 0.9em;text-indent: 2.6em;color: #1d1d1d;font-weight: 500">'
                + dataArray.location.display_address[0] +'</dd>' +
            '<dd style="font-size: 0.9em;text-indent: 2.6em;color: #1d1d1d;font-weight: 500">'
                + dataArray.location.display_address[1] +'</dd>' +
            '<dd style="font-size: 0.9em;text-indent: 2.6em;color: #1d1d1d;font-weight: 500">'
                + dataArray.location.display_address[2] +'</dd>'
        );

        //Get end location
        sessionStorage.setItem('end_location', dataArray.location.display_address);

        $('.restaurant-phone').text( dataArray.display_phone);
        //console.log(dataArray.location.coordinate.longitude);
        //Set up the google map
        var lat = dataArray.location.coordinate.latitude;
        var lng = dataArray.location.coordinate.longitude;
       // console.log(lat);
        var myCenter = new google.maps.LatLng(lat,lng);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: myCenter,
            zoom: 14
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
           // animation: google.maps.Animation.BOUNCE,
            icon:'../images/mid-logo-cafe-rouge-sm-location.png'
        });
        marker.setMap(map);

        map.set('styles', [
           // {"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":20},{"color":"#ececec"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"on"},{"color":"#f0f0ef"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#f0f0ef"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#d4d4d4"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ececec"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"lightness":21},{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#d4d4d4"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#303030"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"geometry.stroke","stylers":[{"lightness":"-61"},{"gamma":"0.00"},{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#dadada"},{"lightness":17}]}
           {"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}
        ]);
        /*
        var infowindow = new google.maps.InfoWindow({
            content: dataArray.name
        });
        infowindow.open(map,marker);
        */

        google.maps.event.addListener(marker,'click',function() {
            var infowindow = new google.maps.InfoWindow({
                content: dataArray.name
            });
            infowindow.open(map,marker);
        });
    });


    //Get direction from mapQuest API
    $('#btnGetDirection').on('click', function () {
        //Clear the direction detial
        $('#direction_results').find('thead tr').html('');
        $('#direction_results').find('tbody').html('');

        var start = sessionStorage.getItem('start_location');
        var end = sessionStorage.getItem('end_location');
        var addressFrom= encodeURIComponent(start);
        var addressTo =encodeURIComponent(end);
        var apiKey = '7hjQvG43huMksuywdrev7WwMlUYciJXC';
        var mapRequestUrl ='http://open.mapquestapi.com/directions/v2/route?key='
            +apiKey
            +'&from=' +addressFrom
            +'&to='+addressTo;
            //+'?callback=jsonp';
        console.log(addressFrom);

        $.ajax({
            url: mapRequestUrl,
            // Tell jQuery we're expecting JSONP
            dataType: "jsonp",
            // Work with the response
            success: function(data) {
                console.log( data.route );
                var distance_time = '<th>'+'Distance: ' + data.route.distance +'</th>'
                                    +'<th></th>'
                                    +'<th>'+'Time: '+ data.route.formattedTime+'</th>'
                                    +'<th></th>';

                $.each(data.route.legs[0].maneuvers, function (i, val) {
                   //Direction Detail
                    var direction_detail ='';
                    direction_detail +='<tr>';
                    //Icon
                    direction_detail+='<td>'+'<img src="'+val.iconUrl+'">'+'</td>';
                    //Index
                    direction_detail+='<td>'+'#' +i+'</td>';
                    //Narrative and mapUrl
                    direction_detail+= '<td><a href="'+val.mapUrl+'" style="color: #fbf7ef" target="_blank">'
                                       +val.narrative+'</a></td>';
                    //Distance
                    direction_detail+='<td>' +val.distance +'m</td>';
                    direction_detail+='</tr>';
                    $('#direction_results').find('tbody').append(direction_detail);
                });

                $('#direction_results').find('thead tr').html(distance_time);

               // $('#myModalLabel').text('From: '+start + ' To: ' +end );
            }
        });

    });

})(jQuery);





