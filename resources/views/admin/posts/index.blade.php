@extends('admin.layouts.master')

@section('title', '文章管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            文章管理 <small>所有文章列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 文章管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">建立新文章</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">#</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">精選？</th>
                        <th width="120" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td style="text-align: center">{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td style="text-align: center">
                            @if($post->is_feature)
                                V
                            @else
                                X
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">編輯</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
