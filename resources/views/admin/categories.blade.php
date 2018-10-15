@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="table-section">
    <h1>Kateqoriyalar</h1>
    <div class="add-section text-center">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i> Kateqoriya əlavə et</button>
    </div>
    @if(!$categories->isEmpty())
        <table class="table linear">
            <thead>
                <tr>
                    <th class="hidden-xs">Id</th>
                    <th class="title">Başlıq</th>
                    <th>Məqalə sayı</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td  class="hidden-xs">{{ $category->id }}</td>
                        <td class="title">{{ $category->description }}</td>
                        <td>{{ $category->articles->count() }}</td>
                        <td class="buttons">
                            <a href='{{ url("admin/category/{$category->id}") }}' class="btn btn-circle btn-info"><i class="fas fa-eye"></i></a>
                            <a href='{{ url("admin/category/{$category->id}/edit") }}' class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                            <a href='{{ url("admin/category/{$category->id}/delete") }}' class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></a>
                         </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{ $categories->links() }}</div>
    @else
        <h1 class="text-center">Heç bir kateqoriya yoxdur.</h1>
    @endif
</div>
@endsection

@section('modal')
<div class="modal fade" id="addCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if( session('status'))
                    <script>$('#addCategory').modal('show')</script>
                    <h2 class="modal-title"> {{ session('status') }} </h2>
                @else
                    <h2 class="modal-title">Kateqoriya əlavə et</h2>
                    @if( !$errors->isEmpty() )
                        <script>$('#addCategory').modal('show')</script>
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-danger"> {{ $error }} </div>
                        @endforeach
                    @endif       
                    <form method="post">
                        <input type="hidden" class="form-control" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="categoryDescripsion">Kateqoriya başlığı</label>
                            <input type="text" class="form-control" id="categoryDescripsion" name="description">
                        </div>
                        <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> Əlavə et</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
$('#addCategory').on('hidden.bs.modal', function () {
    @if( !$errors->isEmpty() || session('status'))
        location.reload();
    @endif
})
</script>
@endsection
