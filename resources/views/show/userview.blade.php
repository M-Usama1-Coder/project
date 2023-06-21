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
                <li class="breadcrumb-item">{{ $user->name }}</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">User: {{ $user->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img id="photoShow" style="width: 180px;height:180px" class="thumbnail"
                                    src="@if (!empty($user->profile->photo)) {{ asset('profile/' . $user->profile->photo) }}@else{{ asset('static_images/avatar.png') }} @endif" alt="Profile"/>
                            </div>
                            <div class="col-md-9 mt-4 p-4">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <td>: {{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th>
                                        <td>: {{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>: {{ $user->profile->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>: {{ $user->profile->birth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Roles</th>
                                        <td>:
                                            @if (!empty($user->roles))
                                                @foreach ($user->roles as $role)
                                                    {{ $role->name }},
                                                @endforeach
                                            @else
                                                Not Assigned
                                            @endif
                                        </td>
                                    </tr>
                                </table>
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
