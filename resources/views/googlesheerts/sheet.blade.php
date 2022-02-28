@foreach($values as $value)
  {{ data_get($value, 'name') }}
@endforeach