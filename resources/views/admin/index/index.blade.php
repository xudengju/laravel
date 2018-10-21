{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <?php
     $user = session()->get('user');
     $username = $user['user_name'];
    if($username){ ?>
    <h1>欢迎<?php echo $username?>登录</h1>
    <?php }?>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop