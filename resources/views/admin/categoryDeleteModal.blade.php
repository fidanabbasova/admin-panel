<div class="modal fade" id="deleteCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>"{{ $category->description }}" kateqoriyasını silmək istədiyinizə əminsiniz? </h3>
            </div>
            <div class="modal-footer">
                <form method="post" action="{!! action('AdminController@deleteCategory', $category->id) !!}">
                    <input type="hidden" class="form-control" name="_token" value="{!! csrf_token() !!}">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Sil</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İmtina et</button>
                </form>        
            </div>     
        </div>
    </div>
</div>
<script>
$('#deleteCategory').on('hidden.bs.modal', function () {
    @if( !$errors->isEmpty() || session('status'))
        location.reload();
    @endif
});
</script>