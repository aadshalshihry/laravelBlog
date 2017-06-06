{{ Form::open(['route' => ['users.destroy', $user_id], 'class' => 'delete_user'])}}
  {{ method_field('DELETE')}}
  {{ Form::submit("Delete", ['id' => 'DeleteBtnForm'])}}
{{ Form::close() }}