@extends('layout.master')
@section('users')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users"></i> Users</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'//') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Users</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="row mt-3 mr-2">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary" href="{{ url(Request::segment(1).'/users/create') }}"><i class="fas fa-plus"></i> Add
                                User</a>
                        </div>
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
                                    <th>Role</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($users))
                                    @foreach ($users as $key => $user)
                                        @php
                                            $currentGroup = !empty($user->group) ? $user->group->group->name : null;
                                        @endphp
                                        <tr id="row_{{ $user->id }}">
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->membership }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $currentGroup }}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i>
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="padding: 10px;position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                        <a class="dropdown-item"
                                                            href="{{ url(Request::segment(1).'/users/show/' . $user->id) }}"><i
                                                                data-feather="eye" width="20"></i> View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ url(Request::segment(1).'/users/edit/' . $user->id) }}"><i
                                                                data-feather="edit" width="20"></i> Edit</a>
                                                        @if ($user->id != Auth::user()->id && $currentGroup != 'Administrator')
                                                            <button class="dropdown-item"
                                                                onclick="delete_user('{{ $user->id }}')"><i
                                                                    data-feather="trash" width="20"></i> Delete</button>
                                                        @endif

                                                    </div>
                                                </div>

                                            </td>
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
    <script>
        function delete_user(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure ?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url(Request::segment(1).'/users/delete') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function(data) {
                        console.log(data);
                        $("#row_" + id).slideUp(200);
                        $('#del_user').hide(0);
                        $('#del_user').slideDown(200);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

        }
    </script>
@endsection
