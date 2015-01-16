<!doctype html>
<html>
<head>
  <title>TapQuote Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<div ng-app="tqAdmin">
  <table ng-controller="overviewCtrl" class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Tag</th>
        <th>Zip</th>
        <th>Requests Sent</th>
        <th>Quotes Received</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="project in projects">
        <td>[[ project.id ]]</td>
        <td>[[ project.created_at ]]</td>
        <td>[[ project.tag ]]</td>
        <td>[[ project.zip ]]</td>
        <td>[[ project.rfqs.length ]]</td>
        <td>[[ project.quotes.length ]]</td>
      </tr>
    </tbody>

  </table>
</div>
<script src="/js/all.js"></script>
<script type="text/javascript">
  var tqAdmin = angular.module('tqAdmin', []);
  tqAdmin.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
  }]);
  tqAdmin.controller('overviewCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout){
    $scope.getData = function(){
      $http.get('/admin/api').success(function(data){
        $scope.projects = data;
      });
    };

    $scope.intervalFunction = function(){
      $timeout(function() {
        $scope.getData();
        $scope.intervalFunction();
      }, 10000)
    };

    $scope.getData();
    $scope.intervalFunction();
  }]);
</script>
</body>
</html>