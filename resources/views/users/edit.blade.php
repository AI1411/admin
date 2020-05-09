@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">名前</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                           value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">職種</label>
                                    <select name="work_id" id="" class="form-control">
                                        @foreach($works as $key => $work)
                                            <option value="{{ $key }}" {{ $key == $user->work_id ? 'selected' : '' }}>{{ $work }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">自己紹介</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="description">
                                    {{ $user->description }}
                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">ステータス</label>
                                    <input type="text" id="inputStatus" class="form-control" name="role_id" readonly
                                           value="{{ $user->role->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">所属企業</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="company_id" readonly
                                           value="{{ $user->company->name }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Budget</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Estimated budget</label>
                                    <input type="number" id="inputEstimatedBudget" class="form-control" value="2300"
                                           step="1">
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Total amount spent</label>
                                    <input type="number" id="inputSpentBudget" class="form-control" value="2000"
                                           step="1">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedDuration">Estimated project duration</label>
                                    <input type="number" id="inputEstimatedDuration" class="form-control" value="20"
                                           step="0.1">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">スキル</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>スキル</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($user->skills as $key => $skill)
                                        <tr>
                                            <td>{{ $skill->name }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">一覧に戻る</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
