@extends('layout.master')
@section('clients')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wruserer">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clients') }}">Clients</a></li>
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
                            <div class="col-md-9 mt-4 p-4">
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
                                    <label for="client_id" class="text-center p-1x">Add Users: </label>
                                    <div class="form-group col-md-8 d-flex">
                                        <form action="{{ url('client/user') }}" class="d-flex" method="POST">
                                            @csrf
                                            <input type="hidden" name='client_id'
                                                value="{{ $client->id }}">
                                            <select name="user_id" id="client_id" class="form-control" required>
                                                @if (!empty($users))
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->first_name }}
                                                        </option>
                                                    @endforeach
                                                @endif
    
                                            </select>
                                            <button type="submit" class="btn btn-primary ml-3">Add</button>
                                        </form>
                                    </div>
                                    <div class="d-flex">
                                        <div>

                                            <table class="table">
                                                <tr>
                                                <th>User</th>
                                                <th>Remove User</th>
                                            </tr>
                                            @foreach ($clientUsers as $user)
                                            <tr>
                                                <td>{{ $user->user->first_name }}</td>
                                                <td>
                                                    <form action="{{ url('client/delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name='client_id' value="{{ $client->id }}">
                                                        
                                                        <input type="hidden" name='user_id'
                                                        value="{{ $user->user->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div>

                                        <table class="table">
                                            <tr>
                                                <th>User</th>
                                                <th>Remove User</th>
                                            </tr>
                                            @foreach ($clientUsers as $user)
                                            <tr>
                                                <td>{{ $user->user->first_name }}</td>
                                                <td>
                                                    <form action="{{ url('client/delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name='client_id' value="{{ $client->id }}">
                                                        
                                                        <input type="hidden" name='user_id'
                                                                value="{{ $user->user->id }}">
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
    </div>

@endsection
@section('css')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
