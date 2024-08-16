<form action="{{$raw_route ?? route($route, $item_id)}}" method="POST"  class="d-inline-block">
    @csrf
    @method('POST')
    <button type="submit" class="{{$button_class ?? 'btn btn-danger btn-sm'}}" href="#">
        <i class="fas fa-trash">{{ $label ?? __('delete') }}</i>
    </button>
</form>
