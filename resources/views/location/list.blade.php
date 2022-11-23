@extends('adminPanel.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Location List</h1>
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
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>City Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $location->city_name }}</td>
                            <td>
                                <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                    @CSRF
                                    @method('DELETE')

                                    <a href="{{ route('locations.edit',$location->id) }}"
                                       class="btn btn-sm btn-success"><i
                                            class="fas fa-edit"></i></a>

                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete?')"><i
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
    @include('.js.datatable')
@endsection
