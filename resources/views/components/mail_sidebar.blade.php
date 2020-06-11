<div class="col-md-3">
    <a href="{{ route('messages.create') }}" class="btn btn-primary btn-block mb-3">メールを作成する</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Folders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                    <a href="{{ route('messages.index') }}" class="nav-link">
                        <i class="fas fa-inbox"></i> 受信箱
                        <span class="badge bg-primary float-right">{{ $messages['unreadMessages'] }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('messages.sentMessage') }}" class="nav-link">
                        <i class="far fa-envelope"></i> 送信箱
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-file-alt"></i> 重要
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-filter"></i> 迷惑メール
                        <span class="badge bg-warning float-right">65</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('messages.trashed') }}" class="nav-link">
                        <i class="far fa-trash-alt"></i> ゴミ箱
                        <span class="badge bg-warning float-right">{{ $messages['trashed']->count() }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Labels</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle text-danger"></i>
                        Important
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle text-warning"></i> Promotions
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle text-primary"></i>
                        Social
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
