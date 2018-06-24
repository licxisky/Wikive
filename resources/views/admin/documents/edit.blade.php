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
                <li><a href="{{ route('admin.projects.index') }}">项目管理</a></li>
                <li><a href="{{ route('admin.projects.documents.index', [$project]) }}">文档管理</a></li>
                <li class="active">编辑文档</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">文档编辑</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('admin.projects.documents.update', [$project, $document]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                    <label class="control-label">标题</label>
                                    <input class="form-control input-lg" type="text" name="title" autocomplete="off" required value="{{ $document->title }}">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                    <label class="control-label">内容</label>
                                    <div id="test-editormd">
                                        <textarea class="editormd-markdown-textarea hidden" name="md_content">{{ $document->md_content }}</textarea>
                                    </div>
                                    <textarea class="hidden" id="html_content" name="html_content">{{ $document->html_content }}</textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                    <input class="btn btn-primary pull-right" type="submit" value="　保存　">
                                </div>

                            </form>
                        </div>
                    </div>

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

    <script type="text/javascript">
        $(function() {
            var testEditor = editormd("test-editormd", {
                width : "100%",
                path   : "{{ asset("editor/lib") }}/",
                height : "500px",
                syncScrolling : true,
                toolbarAutoFixed: true,
                placeholder: "在这里输入文章正文哦...",
                toolbarIcons : function() {
                    return editormd.toolbarModes["full"]; // full, simple, mini
                },
                onchange : function () {
                    $('#html_content').text(this.getPreviewedHTML());
                }
            });
        });
    </script>
@endsection