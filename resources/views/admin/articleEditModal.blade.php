<div class="modal fade" id="editArticle" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if( session('status'))
                    <script>$('#editArticle').modal('show')</script>
                    <h2 class="modal-title"> {{ session('status') }} </h2>
                @else
                    <h2 class="modal-title">Məqaləni yenilə</h2>
                    @if( !$errors->isEmpty() )
                        <script>$('#editArticle').modal('show')</script>
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-danger"> {{ $error }} </div>
                        @endforeach
                    @endif          
                    <form method="post" action="{!! action('AdminController@editArticle', $article->id) !!}">
                        <input type="hidden" class="form-control" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="articleTitle">Məqalə başlığı</label>
                            <input type="text" class="form-control" id="articleTitle" name="articleTitle" value="{{{ $article->title }}}">
                        </div>
                        <div class="form-group">
                            <label for="articleContent">Məqalə məzmunu</label>
                            <textarea class="form-control" rows="10" id="articleContent" name="articleContent">{{ $article->content }}</textarea>
                             <script>
                                CKEDITOR.replace( 'articleContent' );
                            </script>
                        </div>
                        <div class="form-group">
                        <label for="category">Kateqoriya</label>
                        <select class="form-control" id="category" name="category" value="{{{ $article->category_id }}}">
                            @foreach($categories as $category)
                                <option value="{{{ $category->id }}}" {{ $category->id == $article->category_id ? 'selected' : '' }} >{{ $category->description }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Yenilə</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
$('#editArticle').on('hidden.bs.modal', function () {
    @if( !$errors->isEmpty() || session('status'))
        location.reload();
    @endif
});
</script>