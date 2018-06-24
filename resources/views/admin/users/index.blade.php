@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理 <a class="btn btn-primary" href="{{ route('admin.users.create') }}">新建用户</a>
            </h1>
            <ol class="breadcrumb">
                <li>后台管理</li>
                <li class="active">用户管理</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">全部用户</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th># ID</th>
                                        <th>姓 名</th>
                                        <th>身 份</th>
                                        <th width="15%">操 作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td># {{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ '管理员' }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', [$user]) }}" class="btn btn-info btn-xs" title="查看"><i class="fa fa-user"></i></a>
                                            <a href="{{ route('admin.users.edit', [$user]) }}" class="btn btn-warning btn-xs" title="编辑"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="删除"
                                               onclick="document.getElementById('user_{{ $user->id }}_delete').submit()"><i class="fa fa-trash"></i></a>
                                            <form class="hidden" method="post" action="{{ route('admin.users.destroy', [$user]) }}" id="user_{{ $user->id }}_delete">
                                                {{ csrf_field() }}{{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
