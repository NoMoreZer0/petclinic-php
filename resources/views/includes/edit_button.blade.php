<a href="{{$raw_route ?? route($route, $item_id)}}"  type="button" class="{{$button_class ?? 'btn btn-info btn-sm'}}" data-bs-toggle="modal" data-bs-target="#ItemEdit{{$item_id}}">
    <i class="{{$button_icon_class ?? 'fas fa-pencil-alt'}}">{{$label ?? __('edit')}}</i>
</a>
