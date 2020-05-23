@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="min-height: 1157.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Compose</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Compose</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                @include('components.mail_sidebar')
                <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Compose New Message</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('messages.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="to" id="" class="form-control">
                                            @foreach($contacts as $contact)
                                                <option value="{{ $contact->id }}">
                                                    {{ $contact->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="title" class="form-control" placeholder="件名:">
                                    </div>
                                    <div class="form-group">
                                    <textarea name="body" class="form-control"
                                              style="height: 300px;">
                                    </textarea>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="button" class="btn btn-default"><i
                                                    class="fas fa-pencil-alt"></i>
                                                Draft
                                            </button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="far fa-envelope"></i>
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </form>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
