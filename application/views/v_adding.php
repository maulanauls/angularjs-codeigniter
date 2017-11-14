<!doctype html>
<html lang="en">

<head>
    <title>adding use angular js</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!--alerts CSS -->
    <link href="<?=base_url("assets/back/");?>plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="<?=base_url("assets/back/");?>plugins/sweetalert2/sweetalert2.min.js"></script>


    <script>var asset_url="<?=base_url();?>assets/back"; var base_url ="<?=base_url();?>firstpage/";</script>

    <script src="<?=base_url("assets/back/");?>plugins/angularjs/angular.min.js"></script>
    <script src="<?=base_url("assets/back/");?>plugins/jquery/jquery.validate.min.js"></script>
    <script src="<?=base_url("assets/back/");?>plugins/angularjs/angular-validate.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div ng-app="app" ng-controller="dataController" ng-init="showdata()" class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">adding data</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted m-t-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">aksi</button>
                                    <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" ng-click="showme=true">menambahkan data</a>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" ng-model="enteredValue" placeholder="pencarian masukkan kata disini . . .">
                                <span class="input-group-btn"><button ng-Click="findValue(enteredValue)" class="btn btn-default" type="button">search</button></span>
                            </div>
                        </div>
                    </div>
                    <div id="formAdd" class="row" ng-show="showme">
                        <div class="col-8">
                            <form name="myForm" class="form-horizontal" ng-submit="submitForm()" ng-validate="validationOptions">
                                <div class="form-group">
                                    <label for="title" class="control-label col-xs-2">title</label>
                                    <div class="col-xs-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="title" ng-model="data.title">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label col-xs-2">description</label>
                                    <div class="col-xs-10">
                                        <textarea name="description" class="form-control" id="description" placeholder="description" ng-model="data.description"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-2 col-xs-10">
                                        <button ng-disabled="myForm.example.$dirty && myForm.example.$invalid ||
myForm.name.$dirty && myForm.name.$invalid" type="submit" class="btn btn-primary">simpan</button>
                                        <a href="javascript:void(0);" class="btn btn-danger" ng-click="showme=false">batal</a>
                                        <a href="javascript:void(0);" class="btn btn-warning" ng-click="resetForm()">reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <a href="" class="btn btn-primary" ng-click="delete_check(post)">hapus yang dipilih</a>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th class="text-nowrap">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-if="post.length == 0">
                                    <td colspan="4" class="text-center">tidak ada data</td>
                                </tr>
                                <tr id="post-array" ng-repeat="x in post | pagination: curPage * pageSize | limitTo: pageSize">
                                    <td>
                                        <div style="width:20px !important;" class="demo-checkbox">
                                            <input id="basic_checkbox_{{ x.id }}" type="checkbox" ng-true-value="{{ x.id }}" ng-false-value="''" ng-model="x.selected" />
                                            <label for="basic_checkbox_{{ x.id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ x.title }}</td>
                                    <td>{{ x.description }}</td>
                                    <td class="text-nowrap">
                                        <a href="#" data-toggle="modal" ng-click="edit(x.id)" data-target="#edit-data"> edit</a>
                                        <a href="#" ng-click="delete(x.id)" data-toggle="tooltip" data-original-title="close"> hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="m-t-30">
                                <nav ng-show="post.length" aria-label="page navigation example">
                                    <ul class="pagination">
                                        <li>
                                            <button type="button" class="page-link" ng-disabled="curPage == 0" ng-click="curPage=curPage-1"> &lt; PREV</button>
                                        </li>
                                        <li>
                                            <button class="page-link"> page {{curPage + 1}} of {{ numberOfPages() }} </button>
                                        </li>
                                        <li>
                                            <button type="button" class="page-link" ng-disabled="curPage >= post.length/pageSize - 1" ng-click="curPage = curPage+1">NEXT &gt;</button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- edit modal -->
                    <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" name="editItem" role="form" ng-submit="saveEdit()" ng-validate="validationOptions">
                                    <input ng-model="form.id" type="hidden" name="id" />
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">ubah data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class="form-group">
                                                <label for="title" class="control-label col-xs-2">title</label>
                                                <div class="col-xs-10">
                                                    <input type="text" name="title" class="form-control" id="title" placeholder="title" ng-model="form.title">
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="control-label col-xs-2">description</label>
                                                <div class="col-xs-10">
                                                    <textarea name="description" class="form-control" id="description" placeholder="description" ng-model="form.description"></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                            <button type="submit" ng-disabled="editItem.$invalid" class="btn btn-primary create-crud">simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- edit modal -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var app = angular.module("app", ['ngValidate']).config(function($validatorProvider) {
        $validatorProvider.setDefaults({
            errorElement: 'span',
            errorClass: 'help-block text-danger'
        });
    });
    app.controller("dataController", function($scope, $http) {

        $scope.validationOptions = {
            rules: {
                title: {
                    required: true
                },
                description: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "title required"
                },
                description: {
                    required: "description required"
                }
            }
        };

        $scope.showdata = function() {

            $http.get(base_url + 'get_data', {}).then(function post(response) {

                $scope.curPage = 0;
                $scope.pageSize = 6;

                $scope.post = response.data;

                $scope.numberOfPages = function() {
                    return Math.ceil($scope.post.length / $scope.pageSize);
                };

            });

        }

        $scope.findValue = function(enteredValue) {
            $http.get(base_url + 'get_search/' + enteredValue, {}).then(function post(response) {

                $scope.curPage = 0;
                $scope.pageSize = 6;

                $scope.post = response.data;
                $scope.numberOfPages = function() {
                    return Math.ceil($scope.post.length / $scope.pageSize);
                };

            });
        };

        $scope.delete = function($id) {
            $http.get(base_url + 'delete/' + $id).
            then(function(data) {
                //either this
                console.log(data);
                $scope.showdata();
                //or this
                swal({
                    type: 'success',
                    title: 'proses berhasil',
                    text: 'menghapus data',
                    confirmButtonText: 'tutup'
                })
            });
        }

        $scope.edit = function($id) {
            $http.get(base_url + 'get_id/' + $id, {}).then(function form(response) {
                //either this
                console.log(response.data);
                $scope.form = response.data;
                //or this
            });
        }

        $scope.saveEdit = function() {
            if ($scope.editItem.validate()) {
                $http({
                    method: 'post',
                    url: base_url + 'edit/' + $scope.form.id,
                    data: $scope.form, //forms testi object
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function(data) {
                    //either this
                    $(".modal").modal("hide");
                    $scope.showdata();
                    //or this
                    swal({
                        type: 'success',
                        title: 'proses berhasil',
                        text: 'ubah data',
                        confirmButtonText: 'tutup'
                    })
                });
            }
        }

        $scope.delete_check = function(list) {
            var itemList = [];
            angular.forEach(list, function(value, key) {
                if (list[key].selected) {
                    itemList.push(list[key].selected);
                }
            });
            //console.log(itemList.length);
            $http.post(base_url + 'delete_check_data/', itemList).
            then(function(data) {
                //either this
                $scope.showdata();
                //or this
                swal({
                    type: 'success',
                    title: 'proses berhasil',
                    text: 'menghapus data',
                    confirmButtonText: 'tutup'
                })
            });
        }

        $scope.data = {
            title: '',
            description: ''
        };

        $scope.resetForm = function() {
            $scope.data = {};
        };

        $scope.data = {};

        $scope.submitForm = function() {

            if ($scope.myForm.validate()) {
                $http({
                    method: 'post',
                    url: base_url + 'add',
                    data: $scope.data, //forms testi object
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function(data) {
                    //either this
                    $scope.showdata();
                    $scope.data = {};
                    $scope.showme = false;
                    //or this
                    swal({
                        type: 'success',
                        title: 'proses berhasil',
                        text: 'buat data baru',
                        confirmButtonText: 'tutup'
                    })
                });
            }
        }
    });

    app.filter('pagination', function() {
        return function(input, start) {
            if (!input || !input.length) {
                return;
            }
            start = +start; //parse to int
            return input.slice(start);
        }
    });
</script>
</html>
