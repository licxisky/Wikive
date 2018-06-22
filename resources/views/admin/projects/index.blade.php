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
                <li class="active">项目管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">我的项目</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th># ID</th>
                                        <th>名 称</th>
                                        <th>拥有者</th>
                                        <th>类 别</th>
                                        <th width="15%">操 作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td># {{ $project->id }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->user->name }}</td>
                                        <td>{{ $project->type }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.show', [$project]) }}" class="btn btn-success btn-xs" title="查看"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.projects.documents.index', [$project]) }}" class="btn btn-info btn-xs" title="文档"><i class="fa fa-list"></i></a>
                                            <a href="{{ route('admin.projects.edit', [$project]) }}" class="btn btn-warning btn-xs" title="编辑"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="删除"
                                               onclick="document.getElementById('project_{{ $project->id }}_delete').click()"><i class="fa fa-trash"></i></a>
                                            <form class="hidden" method="post" action="{{ route('admin.projects.destroy', [$project]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" id="project_{{ $project->id }}_delete">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
