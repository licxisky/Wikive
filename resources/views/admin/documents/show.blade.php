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
                <li><a href="{{ route('admin.projects.index') }}">项目管理</a></li>
                <li class="active">文档管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @foreach($project->documents as $docu)
                            <li class="list-group-item @if($docu->id == $document->id) active @endif">
                                <span class="document-action pull-right">
                                    <a href="{{ route('admin.projects.documents.edit', [$project, $docu]) }}" class="btn btn-warning btn-xs" title="编辑"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="删除" onclick="document.getElementById('document_{{ $docu->id }}_delete').click()"><i class="fa fa-trash"></i></a>
                                    <form action="{{ route('admin.projects.documents.destroy', [$project, $docu]) }}" class="hidden" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" id="document_{{ $docu->id }}_delete">
                                    </form>
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
                    </ul>
                </div>
                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $document->title }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="markdown-body editormd-preview-container">
                                {!! $document->html_content !!}
                            </div>
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
    <link href="{{ asset("editor/css/editormd.min.css") }}" rel="stylesheet">

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

@section('scripts')
    <script src="{{ asset("editor/lib/marked.min.js") }}"></script>
    <script src="{{ asset("editor/lib/prettify.min.js") }}"></script>
    <script src="{{ asset("editor/src/editormd.js") }}"></script>
@endsection
