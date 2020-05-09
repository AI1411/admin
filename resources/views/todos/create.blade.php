@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="background: white">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Todo List</h3>
                        <a href="{{ route('home') }}">
                            <span style="float: right">戻る</span>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{ route('todos.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter ...">
                                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Body</label>
                                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="3"
                                                  placeholder="Enter ..."></textarea>
                                        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control @error('status_id') is-invalid @enderror" name="status_id">
                                        @foreach($statuses as $key => $status)
                                            <option value="{{ $key }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('status_id') }}</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-block">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
