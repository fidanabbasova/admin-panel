<div class="modal fade" id="editCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if( session('status'))
                    <script>$('#editCategory').modal('show')</script>
                    <h2 class="modal-title"> {{ session('status') }} </h2>
                @else
                    <h2 class="modal-title">Məqaləni yenilə</h2>
                    @if( !$errors->isEmpty() )
                        <script>$('#editCategory').modal('show')</script>
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-danger"> {{ $error }} </div>
                        @endforeach
                    @endif          
                    <form method="post" action="{!! action('AdminController@editCategory', $category->id) !!}">
                        <input type="hidden" class="form-control" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="categoryDescripsion">Məqalə başlığı</label>
                            <input type="text" class="form-control" id="categoryDescripsion" name="description" value="{{{ $category->description }}}">
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Yenilə</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
$('#editCategory').on('hidden.bs.modal', function () {
    @if( !$errors->isEmpty() || session('status'))
        location.reload();
    @endif
});
</script>