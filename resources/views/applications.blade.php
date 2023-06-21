@extends('layout.master')
@section('applications')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-applications"></i> Users</h1>
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
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary" href="{{ url('applications/create') }}"><i class="fas fa-plus"></i> Add
                                Application</a>
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
                        <div id="del_application" style="display: none" class="alert alert-danger"><b>Deleted!</b> Successfully!
                        </div>
                        <table class="table align-items-center table-flush table-hover" id="applications">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($applications))
                                    @foreach ($applications as $key => $application)
                                       
                                        <tr id="row_{{ $application->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            
                                            <td>{{ $application->title }}</td>
                                            <td>{{ $application->url }}</td>
                                            
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i>
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                        <a class="dropdown-item"
                                                            href="{{ url('applications/show/' . $application->id) }}"><i
                                                                data-feather="eye" width="20"></i> View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ url('applications/edit/' . $application->id) }}"><i
                                                                data-feather="edit" width="20"></i> Edit</a>
                                                            <button class="dropdown-item"
                                                                onclick="delete_application({{ $application->id }})"><i
                                                                    data-feather="trash" width="20"></i> Delete</button>

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
            $('#applications').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
    <script>
        function delete_application(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure ?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('applications/delete') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function(data) {
                        $("#row_" + id).slideUp(200);
                        $('#del_application').hide(0);
                        $('#del_application').slideDown(200);
                    }
                });
            }

        }
    </script>
@endsection
