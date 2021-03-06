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
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="To:"
                                           value="{{ $detailMessage->user->name }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Subject:"
                                           value="{{ $detailMessage->title }}">
                                </div>
                                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px;">
    {{ $detailMessage->body }}
                    </textarea>
                                    <div class="form-group">
                                        <div class="btn btn-default btn-file">
                                            <i class="fas fa-paperclip"></i> Attachment
                                            <input type="file" name="attachment">
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                                            Draft
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Send
                                        </button>
                                    </div>
                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </div>
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
