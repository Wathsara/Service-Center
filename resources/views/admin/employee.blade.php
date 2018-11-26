@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                        </div>
                    </div>
                </div>


                <h3>Employee</h3>
                <br>

                @if(Session::has('employeeadd'))
                    <div class="alert alert-success" role="alert">
                        <strong>employee Successfully Added</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('employeeadd') }}
                @endif

                @if(Session::has('employeeupdate'))
                    <div class="alert alert-success" role="alert">
                        <strong>employee Successfully Updated</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('employeeupdate') }}
                @endif

                @if(Session::has('employeedelete'))
                    <div class="alert alert-warning" role="alert">
                        <strong>employee Successfully Deleted</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Session::forget('employeedelete') }}
                @endif


                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button style="float: right" type="button" class="btn btn-success" data-toggle="modal" data-target="#addemployee">
                            Add New Employee
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">New employee</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('addEmployee')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="employeeName"style="font-size: 18px;">Name</label><br>
                                                <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Ex: Jhon Wilson" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeGender"style="font-size: 18px;">Gender</label><br>
                                                <div class="row">

                                                <div class="col-md-4">
                                                    <input type="radio" name="employeeGender" value="male" checked> Male

                                                </div>
                                                <div class="col-md-6">
                                                    <input type="radio" name="employeeGender" value="female"> Female
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="employeeType"style="font-size: 18px;">Type</label><br>
                                                <input type="text" class="form-control" id="employeeName" name="employeeType" placeholder="Ex: Engineer" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeContactNo" style="font-size: 18px;">Mobile</label><br>
                                                <input type="number" class="form-control" id="employeeContactNo" name="employeeContactNo" placeholder="Ex: 0712341234" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeAddress" style="font-size: 18px;">Address</label><br>
                                                <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" placeholder="Ex: Avissawella" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeEmail" style="font-size: 18px;">Email</label><br>
                                                <input type="text" class="form-control" id="employeeEmail" name="employeeEmail" placeholder="Ex: Jhonwilson@gmail.com" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeSalary" style="font-size: 18px;">Salary<b>LKR</b></label><br>
                                                <input type="number" class="form-control" id="employeeSalary" name="employeeSalary" placeholder="25000.00" required>
                                            </div><br>
                                            <div>
                                                <label for="employeeDescription" style="font-size: 18px;">Employee Image</label><br>
                                                <input type="file" accept="image/*" class="form-control"  name="employeeImage" placeholder="Upload an Image" required>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="employeeDescription" style="font-size: 18px;">Description</label><br>
                                                <textarea type="text" class="form-control" id="employeeDescription" name="employeeDescription" placeholder="Short description about the Employee" required></textarea>
                                            </div><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Add New</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Employee Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Type</th>
                                            <th>Mobile</th>
                                            {{--<th>Address</th>--}}
                                            {{--<th>Email</th>--}}
                                            {{--<th>Salary</th>--}}
                                            {{--<th>Discription</th>--}}
                                            <th class="text-right">Created on</th>
                                            <th class="text-right">Actions</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($emp as $employee)
                                            <tr>
                                                <td class="text-center">{{$employee->id}}</td>
                                                <td>{{$employee->employeeName}}</td>
                                                <td>{{$employee->employeeGender}}</td>
                                                <td>{{$employee->employeeType}}</td>
                                                <td>{{$employee->employeeContactNo}}</td>
                                                {{--<td>{{$employee->employeeAddress}}</td>--}}
                                                {{--<td>{{$employee->employeeEmail}}</td>--}}
                                                {{--<td>LKR {{$employee->employeeSalary}}</td>--}}
                                                {{--<td>{{$employee->employeeDescription}}</td>--}}

                                                <td class="text-right">{{$employee->created_at}}</td>
                                                <td class="td-actions text-right">
                                                {{--//////////////////////////////////////////////////--}}
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-link" data-toggle="modal" data-target="#employee{{$employee->id}}">
                                                        <i class="material-icons" style="color:blue " >account_circle</i>
                                                    </button>
                                                    <div class="modal fade" id="employee{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="exampleModalLabel">Employee Details</h2>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                        <div class="form-group">
                                                                            <label for="employeeName"style="font-size: 18px;">Name</label><br>
                                                                            <input type="text" class="form-control"   value="{{$employee->employeeName}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeGender"style="font-size: 18px;float: left">Gender</label><br>
                                                                            <input type="text" class="form-control"   value="{{$employee->employeeGender}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeType"style="font-size: 18px;">Type</label><br>
                                                                            <input type="text" class="form-control"   value="{{$employee->employeeType}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeContactNo"style="font-size: 18px;">Mobile</label><br>
                                                                            <input type="number" class="form-control"   value="{{$employee->employeeContactNo}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeAddress"style="font-size: 18px;">Address</label><br>
                                                                            <input type="text" class="form-control"   value="{{$employee->employeeAddress}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeEmail"style="font-size: 18px;">Email</label><br>
                                                                            <input type="text" class="form-control"   value="{{$employee->employeeEmail}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeSalary" style="font-size: 18px;">Salary <b>LKR</b></label><br>
                                                                            <input type="number" step="0.01" class="form-control"   value="{{$employee->employeeSalary}}" readonly>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeDescription" style="font-size: 18px;">Description</label><br>
                                                                            <textarea type="text" class="form-control"   readonly>{{$employee->employeeDescription}}</textarea>
                                                                        </div><br>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                  
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                {{--//////////////////////////////////////////////////--}}
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-link" data-toggle="modal" data-target="#updateEmployee{{$employee->id}}">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <div class="modal fade" id="updateEmployee{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="exampleModalLabel">Update Employee</h2>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('updateEmployee')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <div class="form-group">
                                                                            <label for="employeeName"style="font-size: 18px;">Name</label><br>
                                                                            <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Ex: Jhon Wilson" value="{{$employee->employeeName}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeGender" style="font-size: 18px;float:  left">Gender</label><br>
                                                                            <div class="row">
                                                                                @if($employee->employeeGender=="male")

                                                                                    <div class="col-md-4">
                                                                                        <input type="radio" name="employeeGender" value="male" checked> Male

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="radio" name="employeeGender" value="female"> Female
                                                                                    </div>
                                                                                @else

                                                                                    <div class="col-md-4">
                                                                                        <input type="radio" name="employeeGender" value="male" > Male

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="radio" name="employeeGender" value="female" checked> Female
                                                                                    </div>
                                                                                @endif
                                                                            </div>


                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeType" style="font-size: 18px;">Type</label><br>
                                                                            <input type="text" class="form-control" id="employeeName" name="employeeType" placeholder="Ex: Engineer" value="{{$employee->employeeType}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeContactNo"style="font-size: 18px;">Mobile</label><br>
                                                                            <input type="number" class="form-control" id="employeeContactNo" name="employeeContactNo" placeholder="Ex: 0712341234" value="{{$employee->employeeContactNo}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeAddress"style="font-size: 18px;">Address</label><br>
                                                                            <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" placeholder="Ex: Avissawella" value="{{$employee->employeeAddress}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeEmail"style="font-size: 18px;">Email</label><br>
                                                                            <input type="text" class="form-control" id="employeeEmail" name="employeeEmail" placeholder="Ex: Jhonwilson@gmail.com" value="{{$employee->employeeEmail}}" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="employeeSalary" style="font-size: 18px;">Salary <b>LKR</b></label><br>
                                                                            <input type="number" step="0.01" class="form-control" id="employeeSalary" name="employeeSalary" placeholder="25000.00" value="{{$employee->employeeSalary}}" required>
                                                                        </div><br>
                                                                        <input type="hidden" value="{{$employee->id}}" name="eid">
                                                                        <div class="form-group">
                                                                            <label for="employeeDescription" style="font-size: 18px;">Description</label><br>
                                                                            <textarea type="text" class="form-control" id="employeeDescription" name="employeeDescription" placeholder="Short description about the Employee" required>{{$employee->employeeDescription}}</textarea>
                                                                        </div><br>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-toggle="modal" data-target="#deleteEmployee">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" id="deleteEmployee" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Are you Sure You want to Delete this Service?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('deleteEmployee')}}" method="post">
                                                                        {{csrf_field()}}

                                                                        <input type="hidden" value="{{$employee->id}}" name="eid">

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" style="margin-right: 5px;" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-warning">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>

    </div>

    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-warning" data-color="orange"></span>
                            <span class="badge filter badge-danger" data-color="danger"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>


                <li class="header-title">Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="ml-auto mr-auto">
                            <span class="badge filter badge-black active" data-background-color="black"></span>
                            <span class="badge filter badge-white" data-background-color="white"></span>
                            <span class="badge filter badge-red" data-background-color="red"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <label class="ml-auto">
                            <div class="togglebutton switch-sidebar-mini">
                                <label>
                                    <input type="checkbox">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Images</p>
                        <label class="switch-mini ml-auto">
                            <div class="togglebutton switch-sidebar-image">
                                <label>
                                    <input type="checkbox" checked="">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="header-title">Images</li>

                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="https://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="https://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-2.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="https://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-3.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="https://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-4.jpg" alt="">
                    </a>
                </li>


                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
                    <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                        Documentation
                    </a>
                    <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
                        Get Free Demo!
                    </a>
                </li>



                <li class="button-container github-star">
                    <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>

                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/perfect-scrollbar.jquery.min.js" ></script>


    <!-- Plugin for the momentJs  -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/moment.min.js"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/sweetalert2.js"></script>

    <!-- Forms Validations Plugin -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.validate.min.js"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.bootstrap-wizard.js"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-selectpicker.js" ></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.dataTables.min.js"></script>

    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-tagsinput.js"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jasny-bootstrap.min.js"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/fullcalendar.min.js"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery-jvectormap.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/nouislider.min.js" ></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Library for adding dinamically elements -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/arrive.min.js"></script>


    <!--  Google Maps Plugin    -->

    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Chartist JS -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/bootstrap-notify.js"></script>





    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/demo/demo.js"></script>
    <script>
        $(document).ready(function(){
            $().ready(function(){
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>






    <!-- Sharrre libray -->
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/demo/jquery.sharrre.js"></script>


    <script>
        $(document).ready(function(){


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: { twitter: {via: 'CreativeTim'}},
                click: function(api, options){
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
            });


            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-46172202-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

            // Facebook Pixel Code Don't Delete
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                document,'script','http://connect.facebook.net/en_US/fbevents.js');

            try{
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            }catch(err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
        />

    </noscript>
















    <script>
        $(document).ready(function(){
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

            md.initVectorMap();

        });
    </script>

@endsection