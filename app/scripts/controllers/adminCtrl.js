/*
  this is angular controllers for the content inside ui-view. 
  In this file will include feature such as angular CRUD, angular multiple
  delete.

  This angular controller is fully developed by Burhan Med.
*/

app.controller('dbCtrl',function($rootScope, $scope, $http) { 
  $rootScope.header = "Dashboard | Home"; 

  $http.get('statistics/count_all_links')
    .success(function(data){
      // console.log(data);
      $scope.show_all_count = data;
    });
  $http.get('statistics/link_clicked')
    .success(function(data){
      // console.log(data);
      $scope.totalClicked = data;
    });
  $http.get('statistics/get_top_view')
    .success(function(data){
      // console.log(data);
      $scope.topView = data;
    });
});//homeCtrl

app.controller('linksCtrl', function($rootScope, $scope, $http) { 
  $rootScope.header = "Dashboard | Links Management";
  $scope.links = [];
  $scope.editc = {};
  $http.get(BASE_URL+'link_management/list_links')
    .success(function(data){
      var links = data;
      // console.log(data);
       // $scope.otherCondition = true;
    $scope.propertyName = 'id';
    $scope.reverse = true;
    $scope.links = links;

    $scope.sortBy = function(propertyName) {
      $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
      $scope.propertyName = propertyName;
    };
    });

    $scope.itemsPerPage = 50;
    $scope.currentPage = 0;
    $scope.datalists = $scope.links ; 

    $scope.range = function() {
     var rangeSize = 6;
     var ps = [];
     var start;

     start = $scope.currentPage;

     if ( start > $scope.pageCount()-rangeSize ) {
      start = $scope.pageCount()-rangeSize+1;
      }
     for (var i=start; i<start+rangeSize; i++) {
     ps.push(i);
    }
    return ps;
    };
    $scope.prevPage = function() {
    if ($scope.currentPage > 0) {
    $scope.currentPage--;
    }
    };

    $scope.DisablePrevPage = function() {
    return $scope.currentPage === 0 ? "disabled" : "";
    };

    $scope.pageCount = function() {
    return Math.ceil($scope.datalists.length/$scope.itemsPerPage)-1;
    };

    $scope.nextPage = function() {
    if ($scope.currentPage > $scope.pageCount()) {
    $scope.currentPage++;
    }
    };

    $scope.DisableNextPage = function() {
    return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
    };

    $scope.setPage = function(n) {
    $scope.currentPage = n;
    };

   $scope.editLink = function($id){
    // $scope.editc = [];
      $http.get('link_management/get_edit_data/' + $id)
      .success(function(data){
        $scope.editc = data;
      })
   }
    $scope.editsubmit = function($id) {
       $http({
          method:'POST',
          url:'link_management/edit_link/'+$id,
          data:$scope.editc,
          header:{ 'Content-Type': 'application/x-www-form-urlencoded' } 
       }).success(function(data){
        var obj = $.parseJSON(JSON.stringify(data));
        if(obj['msg']=='success'){
          $(".modal").modal("hide");
          $('#notif').show().html('<div class="alert alert-success">'+
            '<strong>Success!</strong> '+obj['isi']+'.</div>').delay( 1000 ).hide( 400 );
        } 
        if (obj['msg']=='err') {
           $('#notif').show().html('<div class="alert alert-warning">'+
            '<strong>Warning!</strong> '+obj['isi']+'.</div>').delay( 1000 ).hide( 400 );
        }

        $scope.refresh();
       });
    }
    $scope.delete = function($id){
      var res = confirm('Are you sure want to delete it?');
      if(res){
      $http.get(BASE_URL+'link_management/deleteLink/'+$id)
      .success(function(){
        // $scope.links.splice($id,1);
        $scope.refresh();
        console.log('berhasil Di delete ');
      });
      }
    }
    $scope.delMultiple = function(){
      $scope.itemList = [];
      angular.forEach($scope.links, function(link){
        if (!!link.selected) {
          $scope.itemList.push(link.id)
        }
      });
      var res = confirm('Are you sure want to delete it?');
      if (res) {
      $http.post(BASE_URL+'link_management/delMultiple/',{'id':$scope.itemList})
      .success(function(data){
        // console.log($scope.itemList);
        // console.log(data);
        $scope.refresh();
      });
      }
    }
    $scope.refresh = function(){
    $http.get(BASE_URL+'link_management/list_links')
          .success(function(data){
               $scope.links = data;
      });
    }

}); //linkCtrl Function

app.filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

app.controller('viewsCtrl', function($scope,$rootScope,$http){
  $rootScope.header = "Dashboard | Link Stats";

  $scope.links = [];
  $http.get(BASE_URL+'link_management/list_links')
    .success(function(data){
      var links = data;
       // $scope.otherCondition = true;
    $scope.propertyName = 'url_views';
    $scope.reverse = true;
    $scope.links = links;

    $scope.sortBy = function(propertyName) {
      $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
      $scope.propertyName = propertyName;
    };
    });

    $scope.itemsPerPage = 50;
    $scope.currentPage = 0;
    $scope.datalists = $scope.links ; 

    $scope.range = function() {
     var rangeSize = 6;
     var ps = [];
     var start;

     start = $scope.currentPage;

     if ( start > $scope.pageCount()-rangeSize ) {
      start = $scope.pageCount()-rangeSize+1;
      }
     for (var i=start; i<start+rangeSize; i++) {
     ps.push(i);
    }
    return ps;
    };
    $scope.prevPage = function() {
    if ($scope.currentPage > 0) {
    $scope.currentPage--;
    }
    };

    $scope.DisablePrevPage = function() {
    return $scope.currentPage === 0 ? "disabled" : "";
    };

    $scope.pageCount = function() {
    return Math.ceil($scope.datalists.length/$scope.itemsPerPage)-1;
    };

    $scope.nextPage = function() {
    if ($scope.currentPage > $scope.pageCount()) {
    $scope.currentPage++;
    }
    };

    $scope.DisableNextPage = function() {
    return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
    };

    $scope.setPage = function(n) {
    $scope.currentPage = n;
    };
}); //viewCtrl

app.controller('profileCtrl',function($scope,$http,$rootScope){
  $rootScope.header = "Profile Page";
  $http.get('profile/show_user_based_id')
  .success(function(data){
    // console.log(data);
    $scope.profile = data;
  });

  $scope.submitEditProfile = function($id){
    $http.post('profile/submitEdit/'+$id, 
      { 'name':$scope.profile.name
      }).success(function(data){
        // console.log(data);
        $(".modal").modal("hide");
      })
  }
  $scope.changePass = function($id){
    $http({
          method:'POST',
          url:'profile/changePass/'+$id,
          data:{'password': $scope.password,'cpassword':$scope.cpassword},
          header:{ 'Content-Type': 'application/x-www-form-urlencoded' } 
       }).success(function(data){
        // console.log($scope.password);
        // $(".modal").modal("hide");
        var obj = $.parseJSON(JSON.stringify(data));
        if (obj['id']=='res') {
          $('#notif').show().html('<div class="alert alert-success">'+
            '<strong>Success!</strong> '+obj['res']+'.</div>').delay( 1000 ).hide( 400 );
          // if (delay==1000) {location.reload();}
          setTimeout(function(){location.reload()},1500);
        } else if (obj['id']=='err') {
          $('#notif').show().html('<div class="alert alert-warning">'+
            '<strong>Warning!</strong> '+obj['res']+'.</div>').delay( 1000 ).hide( 400 );
        }

      });
  }
}); //profile ctrl