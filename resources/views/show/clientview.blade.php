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
