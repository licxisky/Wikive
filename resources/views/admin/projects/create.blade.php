@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                项目管理
            </h1>
            <ol class="breadcrumb">
                <li>后台管理</li>
                <li class="active">创建项目</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">创建项目</h3>
                        </div>
                        <form method="post" action="{{ route('admin.projects.store') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>项目名称</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>项目类型</label>
                                    <select name="type" class="form-control">
                                        <option value="公开">公开</option>
                                        <option value="私密">私密</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>项目成员</label>
                                    <select name="users[]" class="form-control select2" multiple style="width: 100%">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($user->id == Auth::id()) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
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
