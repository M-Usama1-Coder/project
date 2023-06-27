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
                                <Hr>
                                <div class="form-group col-md-8 text-start">
                                    <label for="application_id">Applications</label>
                                    @if (!empty($clientApps))
                                        <form action="{{ url('users/application') }}" method="POST" class="d-flex">
                                            <div>

                                                @csrf
                                                <input type="hidden" name='user_id' value="{{ $user->id }}">
                                                <select name="application_id" id="application_id" class="form-control p-2 "
                                                    required>
                                                    @foreach ($clientApps as $app)
                                                        <option value="{{ $app->application->id }}">
                                                            {{ $app->application->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>

                                                <button type="submit" class="btn btn-primary"
                                                    style="margin-left: 20px;">Add</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>Application</th>
                                        <th>Remove Permission</th>
                                    </tr>
                                    @foreach ($userApps as $app)
                                        @if (empty($app->application))
                                            @continue
                                        @endif
                                        <tr>
                                            <td>{{ $app->application->name }}</td>
                                            <td>
                                                <form action="{{ url('users/application/delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name='user_id' value="{{ $user->id }}">

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

@endsection
@section('css')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
