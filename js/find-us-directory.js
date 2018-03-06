angular.module("myApp",[])
    .controller('searchController', function($scope, $http) {
        $scope.location ='Boston, MA';
        $scope.businesses ='';
        $scope.getData = function() {
                //Set start address
                window.sessionStorage.setItem('start_location',$scope.location );
                var url ='../controller/display_yelp_api_data.php?location='+$scope.location;
                $http({
                    method: 'GET',
                    url: url
                }).then(function successCallback(response) {
                  //  console.log(response.data.error);
                    if(response.data.error == undefined){
                        $scope.businesses = response.data.businesses;
                    }else{
                        $.dialog({
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-warning',
                            title: 'Error!',
                            content: '<h2>Please check the location and enter again!</h2>'
                        });
                    }

                }, function errorCallback(response) {
                    alert('There is an Error Here')
                });
        };

        $scope.getRestaurantDetail = function () {
            $('#find-us-directory').fadeOut();
            $('.find-us-directory-main #mainContent').css('display', 'block');
        }

    });


(function($){
    $('.find-us-directory-main #mainContent').css('display', 'none');
    $('.search-results').css('display', 'none');
    $('#btnSearchLocation').on('click', function () {
        $('.find-us-text').fadeOut('slow');
        $('.find-us').css('display', 'none');
        $('.search-results').css('display', 'flex');
    });
    $('#btnSearchAgain').on('click', function () {
        $('.find-us-text').fadeIn('slow');
        $('.find-us').css('display', 'block');
        $('.search-results').css('display', 'none');
    });
}(jQuery));