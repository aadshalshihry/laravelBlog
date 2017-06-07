{{ Form::open(['route' => [$route_name, $user_id], 'class' => 'delete_user'])}}
  {{ method_field('DELETE')}}
  {{ Form::submit("Delete", ['id' => 'DeleteBtnForm'])}}
{{ Form::close() }}