@extends('admin/index/index')
@section('content_header')
    <form action="{{url('attrValueNodeAdd')}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="attr_id" value="{{$attrOne['attr_id']}}">
        为 <b>{{$attrOne['attr_name']}}</b>分配属性值<br /><br />
        @foreach($attrValue as $k=>$v)
            <label><input name="attr_value_id[]" type="checkbox" value="{{$v['attr_value_id']}}" />{{$v['attr_value']}}</label>
        @endforeach
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">分配</button>
        </div>
    </form>
@stop