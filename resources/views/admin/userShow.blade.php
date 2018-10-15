@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="table-section">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-xs-12 buttons-section">
            <div class="pull-right">
                <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#deleteUser"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <h1 class="text-center">{{ $user->name }}</h1>
        <h3 class="text-center">{{ $user->email }}</h3>
        <h5 class="text-center"><em><strong>Qeydiyyat tarixi:</strong> {{ $user->created_at->format('d M Y - H:i:s') }}</em></h5>
        <h5 class="text-center"><em><strong>Oxuduğu məqalə sayı:</strong> {{ $user->comments->count() }}</em></h5>
        <h5 class="text-center"><em><strong>Yazdığı şərh sayı:</strong> {{ $user->views->count() }}</em></h5>
        @if( !$user->comments->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th class="hidden-xs">Id</th>
                        <th class="title">Məzmun</th>
                        <th class="hidden-sm">Məqalə başlığı</th>
                        <th class="hidden-xs">Kateqoriya</th>
                        <th class="hidden-xs">Tarix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $user->comments as $comment)
                    <tr class="linear">
                        <td class="hidden-xs">{{ $comment->id }}</td>
                        <td class="title">{{ $comment->content }}</td>
                        <td class="hidden-sm">{{ $comment->article->title }}</td>
                        <td class="hidden-xs">{{ $comment->article->category->description }}</td>
                        <td class="hidden-xs">{{ $comment->created_at->format('d M Y - H:i:s') }}</td>
                        <td class="buttons">
                            <a href='{{ url("admin/article/{$comment->article_id}")}}' class="btn btn-circle btn-info"><i class="fas fa-eye"></i></a>
                            <a href='{{ url("admin/article/{$comment->article_id}/comment/{$comment->id}/delete")}}' class="btn btn-circle btn-danger hidden-xs"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else 
            <h3 class="text-center">Bu istifadəçi heç bir şərh yazmamışdır.</h3>
        @endif
    </div>
</div>
@endsection

@section('modal')
@include('admin.userDeleteModal')
@endsection
