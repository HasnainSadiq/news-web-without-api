{{-- @extends('layouts.app')
@section('title', 'view')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h2>News</h2> --}}
                    {{-- <div class="col-6 text-right">
                        <a href="/news/create" class="btn btn-dark">Create</a>
                    </div> --}}
            {{-- <table class="table table-dark">
                <thead class=" navbar-dark bg-primary">
                    <tr>
                        <th>No</th>
                        <th>author_name</th>
                        <th>title</th>
                        <th>Status</th>
                        <th>news</th>
                        <th>image</th>
                        <th>category</th>
                        <th>created_by</th>
                        <th colspan="2"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($data as $dt)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $dt['author_name'] }}</td>
                            <td>{{ $dt['title'] }}</td>
                            <td>{{ $dt['status'] }}</td>
                            <td>{{substr($dt['news'],0,40) }}</td>
                            <td><img src="{{ asset('upload/newsimage/' . $dt->image) }}" width="75" alt=""></td>


                            <td>{{ $dt['category_title'] }}</td>
                            <td>{{ $dt['name'] }}</td>
                            <td><a href="{{ route('admin.news.edit', $dt->id) }}" class="btn btn-outline-warning">Edit</a></td>
                            <td><a href="{{ route('admin.news.delete', $dt->id) }}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}
