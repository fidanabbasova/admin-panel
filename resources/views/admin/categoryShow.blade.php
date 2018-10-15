@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="table-section">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-xs-12 buttons-section">
            <div class="pull-right">
                <button type="button" class="btn btn-circle btn-warning" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#deleteCategory"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <h1>{{ $category->description }}</h1>
        @if( !$articles->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th class="hidden-xs">Id</th>
                        <th class="title">Başlıq</th>
                        <th class="hidden-sm">Məzmun</th>
                        <th class="hidden-xs">Kateqoriya</th>
                        <th class="hidden-xs">Tarix</th>
                        <th class="hidden-xs">Baxış</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $articles as $article)
                    <tr>
                        <td  class="hidden-xs">{{ $article->id }}</td>
                        <td class="title">{{ $article->title }}</td>
                        <td class="hidden-sm">{{ $article->content }}</td>
                        <td class="hidden-xs">{{ $article->category->description }}</td>
                        <td class="hidden-xs">{{ $article->created_at->format('d M Y - H:i:s') }}</td>
                        <td class="hidden-xs">{{ $article->views->count() }}</td>
                        <td class="buttons">
                            <a href='{{ url("admin/article/{$article->id}")}}' class="btn btn-circle btn-info"><i class="fas fa-eye"></i></a>
                            <a href='{{ url("admin/article/{$article->id}/delete")}}' class="btn btn-circle btn-danger hidden-xs"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">{{ $articles->links() }}</div>
        @else 
            <h3 class="text-center">Bu kateqoriyaya uygun heç bir məqalə tapılmadı.</h3>
        @endif
    </div>
</div>
@endsection

@section('modal')
@include('admin.categoryDeleteModal')
@include('admin.categoryEditModal')

@endsection
