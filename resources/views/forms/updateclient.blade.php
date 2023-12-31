@extends('layout.master')
@section('clients')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clients') }}">Clients</a></li>
                <li class="breadcrumb-item">Update Client</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">Update Client</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form id="updateclient" action="{{ url('clients/update/' . $client->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row" style="margin-top: 20px">

                                <div class="col-md-12" style="padding-top: 30px">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input value="{{ $client->name }}" type="text" name="name"
                                                id="name" class="form-control" placeholder="Name" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input value="{{ $client->domain }}" type="text" name="domain"
                                                id="domain" class="form-control" placeholder="Domain" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input name="subscription" id="subscription" type="checkbox" {{$client->subscription?'checked':''}}/>
                                            <label for="subscription">Subscription</label>
                                            
                                            {{-- <select name="subscription" id="subscription" class="form-control" required>
                                                        <option value="">{{ $client->subscription }}</option>
                                                        <option value="False">0</option>
                                            </select> --}}
                                        </div>
    
                                    </div>
                                    {{-- <div class="row" style="margin-top:10px">
                                        <div class="form-group col-md-6">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option {{ $client->gender == 'Male' ? 'selected' : '' }} value="Male">
                                                    Male
                                                </option>
                                                <option {{ $client->gender == 'Female' ? 'selected' : '' }}
                                                    value="Female">
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="birth">Date of Birth</label>
                                            <input value="{{ date('Y-m-d', strtotime($client->birth)) }}" type="date"
                                                name="birth" id="birth" class="form-control" placeholder="Date of Birth" required />
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" style="float:right" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Update Client
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
        $("#updateclient").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
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
                birth: '<span class="text-danger ">Date of Birth Required</span>',
            }
        });
    </script>
@endsection
