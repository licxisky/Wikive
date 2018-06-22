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
                <li class="active">编辑项目</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑项目</h3>
                        </div>
                        <form method="post" action="{{ route('admin.projects.update', [$project]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>项目名称</label>
                                    <input type="text" name="name" class="form-control" value="{{ $project->name }}">
                                </div>
                                <div class="form-group">
                                    <label>项目类型</label>
                                    <select name="type" class="form-control">
                                        <option value="公开" @if($project->type == '公开') selected @endif>公开</option>
                                        <option value="私密" @if($project->type == '私密') selected @endif>私密</option>
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">提 交</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
