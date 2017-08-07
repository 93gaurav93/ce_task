<th class="exportable">#</th>
<th class="no_orderable">View Profile</th>

@foreach($columns as $column)
    @if($column['showInIndex'])
        <th class="{{$column['indexClasses']}}">{{$column['title']}}</th>
    @endif
@endforeach

<th class="w_100 exportable">Created At</th>
<th class="w_100">Updated At</th>