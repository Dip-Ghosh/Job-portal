@extends('adminPanel.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Applicant</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card">
            <div class="card-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                @endif
                <table id="application-list" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Job Title</th>
                        <th>Applicant Name</th>
                        <th>Applicant Email</th>
                        <th>Applicant Mobile</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp

                    @foreach($users as $user)

                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$user->title}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobile}}</td>
                            <td><a href="{{route('applicant-details',$user->id)}}" class="btn btn-sm btn-success"><i
                                        class="fas fa-eye"></i></a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#application-list').DataTable();
        });
    </script>

@endsection

