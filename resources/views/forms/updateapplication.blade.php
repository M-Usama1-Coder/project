@extends('layout.master')Application
@section('applications')
    active
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'//') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'/applications') }}">Application</a></li>
                <li class="breadcrumb-item">Update User</li>
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
                        <h6 class="m-0 font-weight-bold text-primary">Update Application</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form enctype="multipart/form-data" id="updateapplication"
                            action="{{ url(Request::segment(1).'/applications/update/' . $application->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row" style="margin-top: 20px">

                                <div class="col-md-9" style="padding-top: 30px">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input value="{{ $application->name }}" type="text" name="name"
                                                id="name" class="form-control" placeholder="name" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input value="{{ $application->sp_sso_url }}" type="text" name="sp_sso_url"
                                                id="sp_sso_url" class="form-control" placeholder="Sp_sso_url" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input value="{{ $application->sp_entity_id }}" type="text"
                                                name="sp_entity_id" id="sp_entity_id" class="form-control"
                                                placeholder="sp_entity_id" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 text-left">
                                            <label>Application Icon</label>
                                            <input type="file" name="icon" id="icon" class="form-control"
                                                placeholder="Icon" accept="image/png, image/gif, image/jpeg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" style="float:right" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Update Application
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
        $("#updateapplication").validate({
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
