@extends('layouts.app')


@section('content')

    <div class="container">
        <h2>Striped Rows</h2>
        <p>The .table-striped class adds zebra-stripes to a table:</p>  
        
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#postModal">Create</button>

        <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $key => $data)
                <tr>
                    <td>{{ $data->title }}</td>
                    <td><img src="{{ $data->image }}" width="100"></td>
                    <td>{{ substr($data->body, 0, 100) }} ...</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <div id="postModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="body" id="" cols="30" rows="8" class="form-control"></textarea>
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

@endsection