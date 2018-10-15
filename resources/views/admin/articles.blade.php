@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="table-section">
    <h1>Məqalələr</h1>
    <div class="add-section text-center">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addArticle"><i class="fas fa-plus"></i> Məqalə əlavə et</button>
    </div>
    @if(!$articles->isEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th class="hidden-xs">Id</th>
                    <th class="title">Başlıq</th>
                    <th class="hidden-sm">Məzmun</th>
                    <th class="hidden-xs">Kateqoriya</th>
                    <th class="hidden-xs">Tarix</th>
                    <th class="hidden-xs">Baxış</th>
                    <th class="hidden-xs">Şərh</th>
                    <th>  </th>
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
                    <td class="hidden-xs">{{ $article->comments->count() }}</td>
                    <td class="buttons">
                        <a href='{{ url("admin/article/{$article->id}")}}' class="btn btn-circle btn-info"><i class="fas fa-eye"></i></a>
                        <a href='{{ url("admin/article/{$article->id}/edit")}}' class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                        <a href='{{ url("admin/article/{$article->id}/delete")}}' class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{$articles->links()}}</div>
    @else
        <h1 class="text-center">Heç bir məqalə yoxdur.</h1>
    @endif
</div>
@endsection

@section('modal')
<div class="modal fade" id="addArticle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if( session('status'))
                    <script>$('#addArticle').modal('show')</script>
                    <h2 class="modal-title"> {{ session('status') }} </h2>
                @else
                    <h2 class="modal-title">Məqalə əlavə et</h2>
                    @if( !$errors->isEmpty() )
                        <script>$('#addArticle').modal('show')</script>
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-danger"> {{ $error }} </div>
                        @endforeach
                    @endif                    
                    <form method="post">
                        <input type="hidden" class="form-control" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="articleTitle">Məqalə başlığı</label>
                            <input type="text" class="form-control" id="articleTitle" name="articleTitle">
                        </div>
                        <div class="form-group">
                            <label for="articleContent">Məqalə məzmunu</label>
                            <textarea class="form-control" rows="10" id="articleContent" name="articleContent"></textarea>
                            <script>
                                CKEDITOR.replace( 'articleContent' );
                            </script>
                        </div>
                        <div class="form-group">
                        <label for="category">Kateqoriya</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($categories as $category)
                                <option value="{{{ $category->id }}}"  >{{ $category->description }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-info" id="addArticle"><i class="fas fa-plus"></i> Əlavə et</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
$('#addArticle').on('hidden.bs.modal', function () {
    @if( !$errors->isEmpty() || session('status'))
        location.reload();
    @endif
});
</script>
@endsection
