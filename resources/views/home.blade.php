{{-- @extends('layouts.app')

@section('content') --}}
@extends('frontend.main_master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>News</h2>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('news.create') }}" class="btn btn-dark">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="">

                        <table class="table table-dark">
                            <thead class=" navbar-dark bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>author_name</th>
                                    <th>title</th>
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
                                        <td>{{ $dt['news'] }}</td>
                                        <td><img src="{{ asset('upload/newsimage/' . $dt->image) }}" width="75" alt="">
                                        </td>
                                        @php
                                            $cat = App\Models\Category::find($dt->category_id);
                                        @endphp
                                        <td>{{ $cat->title }}</td>
                                        <td>{{ $dt['user_id'] }}</td>
                                        <td><a href="{{ route('news.edit', $dt->id) }}"
                                                class="btn btn-outline-warning">Edit</a></td>
                                        <td><a href="{{ route('news.delete', $dt->id) }}"
                                                class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
