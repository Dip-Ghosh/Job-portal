@extends('adminPanel.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Job</h1>
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
                <table id="job-list" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Job Type</th>
                        <th>Thumbnail</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->description}}</td>
                            <td>{{$job->name}}</td>
                            <td><img
                                    src="{{(isset($job->thumbnail) && !empty($job->thumbnail))?asset('uploads/'. $job->thumbnail) : asset('uploads/images.png')}}"
                                    width="50%" height="50%" alt=""></td>
                            <td>

                                <form action="{{ route('jobs.destroy',$job->id)}}" method="POST">
                                    @CSRF
                                    @method('DELETE')
                                    <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-sm btn-success"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{route('jobs.show',$job->id)}}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to Deactivate the Job Post?')"><i
                                            class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
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
            $('#job-list').DataTable();
        });
    </script>

@endsection

