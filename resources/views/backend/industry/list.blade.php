@extends('adminPanel.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Industry List</h1>
                </div>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible">{{ $message }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    @endif

    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="industry-list" class="table table-striped table-bordered dataTable no-footer"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Organization</th>
                        <th>Industry</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach ($industries as $industry)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $industry->organization->organization_type }}</td>
                            <td>{{ $industry->industry_type }}</td>
                            <td>
                                <form action="{{ route('industries.destroy',$industry->id) }}" method="POST">
                                    @CSRF
                                    @method('DELETE')

                                    <a href="{{ route('industries.edit',$industry->id) }}"
                                       class="btn btn-sm btn-success"><em
                                            class="fas fa-edit"></em></a>

                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete?')"><em
                                            class="fas fa-trash"></em>
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
    <script>
        $(document).ready(function () {
            $('#industry-list').DataTable();
        });
    </script>
@endsection
