@extends('layouts.main')

@section('content')
    @include('vendor.sweetalert.alert')
    <div class="content-wrapper" style="min-height: 1157.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>受信箱</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            @include('components.mail_sidebar')
            <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i
                                            class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    1-50/{{ $messages['allMessages']->count() }}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    @foreach($messages['allMessages'] as $message)
                                        <tr>
                                            <td class="mailbox-name">{{ $message->user->name }}</td>
                                            <td class="mailbox-subject">
                                                <a href="{{ route('messages.show', $message->id) }}">
                                                    {{ $message->title }}
                                                </a>
                                                {{ $message->read_at == null ? '未読' : '既読' }}
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{ $message->created_at->diffForHumans() }}</td>
                                            <td class="d-flex">
                                                <form action="{{ route('messages.destroy', $message->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-default btn-sm"><i
                                                            class="far fa-trash-alt" onclick="return confirm('メッセージを削除しますか？')"></i>
                                                    </button>
                                                </form>
                                                <form action="" class="ml-1">
                                                    <button {{ $message->is_favorite == true ? 'disabled' : '' }} name="favorite" type="submit" class="btn btn-{{ $message->is_favorite == true ? 'primary' : 'default' }} btn-sm" value="{{ $message->id }}"><i class="far fa-star"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i
                                            class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    1-50/200
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
