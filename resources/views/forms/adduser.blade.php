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
                <li class="breadcrumb-item">Add User</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form id="adduser" action="{{ url('users/store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row" style="margin-top: 20px">

                                <div class="col-md-12" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="Name" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Email" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                </div>
                                @php
                                    $user = Auth::user();
                                    $currentGroup = !empty($user->group) ? $user->group->group->name : null;
                                @endphp
                                @if ($currentGroup == 'Administrator')
                                    <div class="form-group col-md-6">
                                        <select name="group" id="group" class="form-control" required>
                                            @if (!empty($groups))
                                                @foreach ($groups as $index => $group)
                                                    <option {{ !$index ? 'selected' : null }} value="{{ $group->id }}">
                                                        {{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                @endif


                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" style="float:right" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add User
                                    </button>
                                </div>
                            </div>
                        </form>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photoShow').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $("#adduser").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    rangelength: [6, 9999]
                },
            },
            messages: {
                name: '<span class="text-danger ">Name is Required</span>',
                email: {
                    required: '<span class="text-danger ">Email is Required</span>',
                    email: '<span class="text-danger ">Email should be like someone@doamin.com</span>',
                },
                password: {
                    required: '<span class="text-danger ">Password is Required</span>',
                    rangelength: '<span class="text-danger ">Min 6 character Passaword</span>'
                },
            }
        });
    </script>
@endsection
