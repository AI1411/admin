@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="background: white">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-{{ $todo->statusBadge }}">
                    <div class="card-header">
                        <h3 class="card-title">Todo List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{ route('todos.update', $todo->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter ..."
                                               value="{{ $todo->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Body</label>
                                        <textarea class="form-control" name="body" rows="3"
                                                  placeholder="Enter ...">{{ $todo->body }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status_id">
                                        @foreach($statuses as $key => $status)
                                            <option value="{{ $key }}" {{ $key == $todo->status_id ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-block">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
