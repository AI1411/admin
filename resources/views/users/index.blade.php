@extends('layouts.main')

@section('content')
    @include('vendor.sweetalert.alert')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-2">
                        <form action="{{ route('csvDownload', ['search_name' => $keyword]) }}" method="get">
                            <button class="btn btn-outline-info">CSVダウンロード</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 15%">名前</th>
                                    <th style="width: 5%">@sortablelink('age', '年齢')</th>
                                    <th style="width: 15%">職種</th>
                                    <th style="width: 35%">スキル</th>
                                    <th style="width: 5%"></th>
                                    <th style="width: 5%"></th>
                                    <th style="width: 5%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->work->name }}</td>
                                        <td>
                                            @foreach($user->skills as $key => $skill)
                                                {{ $skill->name }},
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}">
                                                <button class="btn btn-primary btn-block btn-sm">詳細</button>
                                            </a>
                                        </td>
                                        <td>
                                            @if($user->id == auth()->id())
                                                <a href="{{ route('users.edit', $user->id) }}">
                                                    <button class="btn btn-default btn-block btn-sm">編集</button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->id == auth()->id())
                                                <button class="btn btn-danger btn-block btn-sm">削除</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <td>検索結果がありません</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
