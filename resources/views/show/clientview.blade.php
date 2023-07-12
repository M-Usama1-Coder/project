@extends('layout.master')
@section('clients')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wruserer">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'//') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'/clients') }}">Clients</a></li>
                <li class="breadcrumb-item">{{ $client->name }}</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">Client: {{ $client->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mt-4 p-4">
                                <table>
                                    <tr>
                                        <th>Name:</th>
                                        <td> {{ $client->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Sub_domain: </th>
                                        <td class="p-3"> {{ $client->domain }}</td>
                                    </tr>

                                </table>
                                <Hr>
                                <h4>Users</h4>
                                <div class="form-group col-md-8 d-flex">
                                    <form action="{{ url(Request::segment(1).'/client/user') }}" class="d-flex" method="POST">
                                        @csrf
                                        <input type="hidden" name='client_id' value="{{ $client->id }}">
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            @if (!empty($users))
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }}
                                                    </option>
                                                @endforeach
                                            @endif

                                        </select>
                                        <button type="submit" class="btn btn-primary" style="margin-left: 20px">Add</button>
                                    </form>
                                </div>


                                <table class="table">
                                    <tr>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    @foreach ($clientUsers as $user)
                                        <tr>
                                            <td>{{ $user->user->first_name }}</td>
                                            <td>
                                                @if ($user->user->client_id)
                                                    <span class="badge bg-primary">Operator</span>
                                                @else
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-cogs"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style="padding: 10px;position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            <form action="{{ url(Request::segment(1).'/client/operator') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name='client_id'
                                                                    value="{{ $client->id }}">

                                                                <input type="hidden" name='user_id'
                                                                    value="{{ $user->user->id }}">
                                                                <button class="dropdown-item" type="submit"
                                                                    class="btn btn-danger btn-sm">Make Operator</button>
                                                            </form>

                                                            <form action="{{ url(Request::segment(1).'/client/userApp/delete') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name='client_id'
                                                                    value="{{ $client->id }}">

                                                                <input type="hidden" name='user_id'
                                                                    value="{{ $user->user->id }}">
                                                                <button class="dropdown-item" type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="col-md-6 mt-4 p-4">
                                <br /><br />
                                <Hr />
                                <h4>Applications</h4>
                                <div class="form-group col-md-8 d-flex">
                                    <form action="{{ url(Request::segment(1).'/client/application') }}" class="d-flex" method="POST">
                                        @csrf
                                        <input type="hidden" name='client_id' value="{{ $client->id }}">
                                        <select name="application_id" id="application_id" class="form-control p-2 "
                                            required>
                                            @if (!empty($applications))
                                                @foreach ($applications as $application)
                                                    <option value="{{ $application->id }}">{{ $application->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-primary" style="margin-left: 20px">Add</button>
                                    </form>
                                </div>


                                <table class="table">
                                    <tr>
                                        <th class="text-center">Application</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    @if (!empty($clientApps))
                                        @foreach ($clientApps as $clientApp)
                                            <tr>
                                                <td>{{ $clientApp->application->name }}</td>
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-cogs"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style="padding: 10px;position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">

                                                            <form action="{{ url(Request::segment(1).'/client/userApp/delete') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name='client_id'
                                                                    value="{{ $client->id }}">

                                                                <input type="hidden" name='application_id'
                                                                    value="{{ $clientApp->application->id }}">
                                                                <button class="dropdown-item" type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

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

@endsection
@section('css')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
