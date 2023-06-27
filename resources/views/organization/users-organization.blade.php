@extends('layout.master')
@section('users')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users"></i> Users</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Users</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="row mt-3 mr-2">

                    </div>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
                    </div>
                    <div class="table-responsive p-3">
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div id="del_user" style="display: none" class="alert alert-danger"><b>Deleted!</b> Successfully!
                        </div>
                        <table class="table align-items-center table-flush table-hover" id="users">
                            <thead class="bg-primary text-dark">
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Membership</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($users))
                                    @foreach ($users as $key => $currentUser)
                                        @php
                                            $user = $currentUser->user;
                                        @endphp
                                        <tr id="row_{{ $user->id }}">
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->membership }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#users').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endsection
