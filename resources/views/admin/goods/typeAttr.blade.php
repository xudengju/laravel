@extends('admin/index/index')
@section('content_header')
    <form action="{{url('typeAttrAdd')}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="type_id" value="{{$typeOne['type_id']}}">
        为 <b>{{$typeOne['type_name']}}</b>分配属性<br /><br />
        @foreach($attrData as $ki=>$v)
            <label><input name="attr_id[]" type="checkbox" value="{{$v['attr_id']}}" />{{$v['attr_name']}}</label>
        @endforeach
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">分配</button>
        </div>
    </form>
@stop