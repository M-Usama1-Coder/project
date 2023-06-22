@extends('layout.master')
@section('users')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
                <li class="breadcrumb-item">{{ $user->first_name }}</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">User: {{ $user->first_name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mt-4 p-4">
                                <table>
                                    <tr>
                                        <th>First_Name</th>
                                        <td>: {{ $user->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_name</th>
                                        <td>: {{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>: {{ $user->email }}</td>
                                    </tr>
                                    
                                </table>
                                <div class="form-group col-md-6">
                                    <label for="group">Group</label>

                                    <select name="group" id="group" class="form-control" required>
                                        @if (!empty($applications))
                                            @foreach ($applications as $application)
                                       
                                            
                                                <option value="{{$application->id}}">{{$application->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
