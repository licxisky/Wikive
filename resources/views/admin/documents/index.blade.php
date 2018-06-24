@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                项目管理 <a href="{{ route('admin.projects.documents.create', [$project]) }}" class="btn btn-primary">新建文档</a>
            </h1>
            <ol class="breadcrumb">
                <li>后台管理</li>
                <li>项目管理</li>
                <li class="active">文档管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($project->documents()->count() > 0)
                        @foreach($project->documents as $docu)
                                <li class="list-group-item">
                                <span class="document-action pull-right">
                                    <a href="{{ route('admin.projects.documents.edit', [$project, $docu]) }}" class="btn btn-warning btn-xs" title="编辑"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.projects.documents.destroy', [$project, $docu]) }}" class="btn btn-danger btn-xs" title="删除"><i class="fa fa-trash"></i></a>
                                    @if(!$loop->first)
                                        <a href="{{ route('admin.projects.documents.up', [$project, $docu]) }}" class="btn btn-primary btn-xs" title="上移"><i class="glyphicon glyphicon-arrow-up"></i></a>
                                    @endif
                                    @if(!$loop->last)
                                        <a href="{{ route('admin.projects.documents.down', [$project, $docu]) }}" class="btn btn-primary btn-xs" title="下移"><i class="glyphicon glyphicon-arrow-down"></i></a>
                                    @endif
                                </span>
                                    <span class="document-title">
                                    <a href="{{ route('admin.projects.documents.show', [$project, $docu]) }}">{{ $docu->title }}</a>
                                </span>
                                </li>
                        @endforeach
                        @else
                            <li class="list-group-item">
                                <span class="document-title"><a>好像什么都没有啊！</a></span>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">文档查看</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h3>点击右侧文档进行查看</h3>
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
@section('styles')

    <style>
        .list-group .active .document-title a {
            color: white;
            cursor: pointer;
        }
        .list-group .document-title a {
            color: black;
            cursor: pointer;
        }
        .list-group-item {
            cursor: pointer;
        }
        .list-group-item {
            cursor: pointer;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .list-group-item .document-title a{
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .list-group-item .document-action a {
            margin-top: 10px;
            /*margin-bottom: 10px;*/
        }
    </style>
@endsection
