@extends('admin.layout')

@section('right-section')
<div class="col-xs-10 col-sm-9 col-xs-offset-2 col-sm-offset-3" id="table-section">
    <h1>İstifadəçilər</h1>
    @if(!$users->isEmpty())

    <table class="table linear">
        <thead>
            <tr>
                <th class="hidden-xs">Id</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th class="hidden-xs">Şərh sayı</th>
                <th class="hidden-xs">Baxış sayı</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user)
                <tr>
                    <td class="hidden-xs">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="hidden-xs">{{ $user->comments->count() }}</td>
                    <td class="hidden-xs">{{ $user->views->count() }}</td>
                    <td class="buttons">
                        <a href='{{ url("admin/user/{$user->id}")}}' class="btn btn-circle btn-info"><i class="fas fa-eye"></i></a>
                        <a href='{{ url("admin/user/{$user->id}/delete")}}' class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">{{$users->links()}}</div>
    @else
        <h1 class="text-center">Heç bir istifadəçi yoxdur.</h1>
    @endif
</div>
@endsection

