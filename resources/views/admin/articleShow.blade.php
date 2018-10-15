@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="article-section">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-xs-12 buttons-section">
            <div class="pull-right">
                <button type="button" class="btn btn-circle btn-warning" data-toggle="modal" data-target="#editArticle"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#deleteArticle"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <h2 class="title-article text-right">{{ $article->title }}</h2>
        <p class="text-right"><i class="far fa-clock"></i> {{ $article->created_at->format('d M Y - H:i:s') }}</p>
        <h4 class="content-article">{!! $article->content !!}</h4>
        <div class="col-xs-12 view-category-section">
            <span id="view" class="pull-left"><i class="far fa-eye"></i> {{ $article->views->count() }}</span>
            <div class="pull-right">
                <a href='{{ url("admin/category/{$article->category_id}") }}' class="btn btn-info ">{{ $article->category->description }}</a>
            </div>
        </div>
        <div class="col-xs-12 comments-section">
            @foreach($comments as $comment)
                <div class="col-xs-12 comment">
                    <h4>
                        <strong>{{ $comment->user->name }} {{ $comment->user->surname }}: </strong>
                        {{ $comment->content }}
                    </h4>
                   
                    <div class="col-xs-12">
                        @if($comment->created_at)<span><i class="far fa-clock"></i> {{ $comment->created_at->format('d M Y - H:i:s') }}</span>@endif
                        <a href='{{ url("admin/article/{$article->id}/comment/{$comment->id}/delete") }}' class="btn btn-circle btn-danger pull-right"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>
</div>
@endsection


@section('modal')
@include('admin.articleDeleteModal')
@include('admin.articleEditModal')

@endsection

