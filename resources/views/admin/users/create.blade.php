@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
            </h1>
            <ol class="breadcrumb">
                <li>后台管理</li>
                <li class="active">创建用户</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">创建用户</h3>
                        </div>
                        <form method="post" action="{{ route('admin.users.store') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">姓 名</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="email">邮 箱</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="password">密 码</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="identiry">
                                        <input id="identiry" type="checkbox" name="admin" class="forn-control">
                                        管理员
                                    </label>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">提 交</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("bower_components/select2/dist/css/select2.min.css") }}">

@endsection

@section('scripts')

    <!-- Select2 -->
    <script src="{{ asset("bower_components/select2/dist/js/select2.full.min.js") }}"></script>

    <script>
        $('.select2').select2()
    </script>
@endsection
