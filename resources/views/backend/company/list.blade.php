@extends('adminPanel.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Company List</h1>
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
                <table id="company-list" class="table table-striped table-bordered dataTable no-footer">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Industry</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Web Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->organization->organization_type }}</td>
                            <td>{{ $company->industry->industry_type }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->mobile }}</td>
                            <td>{{ $company->web_url }}</td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                    @CSRF
                                    @method('DELETE')

                                    <a href="{{ route('companies.edit', $company->id) }}"
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
            $('#company-list').DataTable();
        });
    </script>
@endsection
