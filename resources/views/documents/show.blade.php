@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="">{{ $document->project->name }}</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <ul class="list-group">
                    @foreach($document->project->documents as $docu)
                        <li class="list-group-item @if($docu->id == $document->id) active @endif">
                            <a href="{{ route('documents.show', [$docu]) }}">{{ $docu->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <b>{{ $document->title }}</b>
                            {{--<a href="{{ route('document.edit', [$document]) }}" class="btn btn-link btn-xs pull-right"><i class="glyphicon glyphicon-edit"></i></a>--}}
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div id="editor-html-content">
                            <textarea name="md_content" class="hidden" id="md_content">{!! $document->md_content !!}</textarea>
                            {{--{!! $document->html_content !!}--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset("editor/css/editormd.min.css") }}" rel="stylesheet">

    <style>
        .list-group .active a {
            color: white;
            cursor: pointer;
        }
        .list-group a {
            color: black;
            cursor: pointer;
        }
        .list-group-item {
            cursor: pointer;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .list-group-item a {
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset("editor/lib/marked.min.js") }}"></script>
    <script src="{{ asset("editor/lib/prettify.min.js") }}"></script>
    <script src="{{ asset("editor/src/editormd.js") }}"></script>

    <script type="text/javascript">
        $(function() {
            var testEditor = editormd.markdownToHTML("editor-html-content", {
                width : "100%",
                // markdown        : $("#md_content").text(),
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                markdownSourceCode : false, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                emoji           : true,
            });
        });
    </script>
@endsection