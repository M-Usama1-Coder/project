@extends('layout.master')
@section('applications')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Applications</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('applications') }}">Applications</a></li>
                <li class="breadcrumb-item">{{ $application->name }}</li>   
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
                        <h6 class="m-0 font-weight-bold text-primary">Applications</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mt-4 p-4">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <td>: {{ $application->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sp_sso_url</th>
                                        <td>: {{ $application->sp_sso_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sp_entity_id</th>
                                        <td>: {{ $application->sp_entity_id }}</td>
                                    </tr>              
                                    <tr>
                                        <th>certificate_key : </th>
                                        <td><hr><textarea class="form-control" readonly> {{ $application->certificate_key}}</textarea></td>
                                    </tr>                                    
                                    <tr>
                                        <th>certificate : </th>
                                        <td><hr><textarea class="form-control" readonly> {{ $application->certificate }}</textarea></td>
                                    </tr>                                    
                                </table>
                            <br/>
                                <table class="table">
                                    <tr>
                                        <th>User</th>
                                        <th>Remove Permission</th>
                                    </tr>
                                    @foreach ($userApps as $app)
                                    @if (!$app->user)
                                        @continue
                                    @endif
                                    <tr>
                                        <td>{{ $app->user->first_name }}</td>
                                        <td>
                                            <form action="{{ url('users/application/delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name='user_id' value="{{ $app->user->id }}">

                                                <input type="hidden" name='application_id'
                                                    value="{{ $app->application->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </table>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
