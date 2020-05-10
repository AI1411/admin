@extends('layouts.main')

@section('css')
    <style>
        .sample1 {
            /*width: 280px;*/
            /*height: 188px;*/
            overflow: hidden;
            /*margin: 10px 8px 10px 16px;*/
            position: relative; /* 相対位置指定 */
        }
        .sample1 .caption {
            font-size: 50%;
            text-align: center;
            /*padding-top: 80px;*/
            color: #fff;
        }
        .sample1 .mask {
            width: 100%;
            height: 100%;
            position: absolute; /* 絶対位置指定 */
            top: 0;
            left: 0;
            opacity: 0; /* マスクを表示しない */
            background-color: rgba(0, 0, 0, 0.4); /* マスクは半透明 */
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        .sample1:hover .mask {
            opacity: 1; /* マスクを表示する */
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Project Name
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th>
                                Project Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $key => $project)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        {{ $project->name }}
                                    </a>
                                    <br/>
                                    <small>
                                        Created {{ $project->created_at->format('Y-m-d') }}
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        @foreach($project->users as $key => $user)
                                            <li class="list-inline-item sample1">
                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <img alt="Avatar" class="table-avatar p-1" src="/img/users/{{ $user->image }}" style="width: 50px;height: 50px">
                                                    <div class="mask">
                                                    <div class="caption">{{ $user->name }}</div>
                                                </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-{{ $project->progressBar }}" role="progressbar" aria-volumenow="57"
                                             aria-volumemin="0" aria-volumemax="100" style="width: {{ $project->progress }}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{ $project->progress }}% Complete
                                    </small>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-{{ $project->statusBadge }}">{{ $project->status->name }}</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
