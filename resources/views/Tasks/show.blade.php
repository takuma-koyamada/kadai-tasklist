@extends('layouts.app')

@section('content')

    <h1>id = {{ $Task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $Task->id }}</td>
        </tr>
            <th>ステータス</th>
             <td>{{ $Task->status }}</td>
        <tr>
            <th>タスク</th>
            <td>{{ $Task->content }}</td>
        </tr>
    </table>
    {{-- タスク編集ページへのリンク --}}
    {!! link_to_route('Tasks.edit', 'このタスクを編集', ['Task' => $Task->id], ['class' => 'btn btn-light']) !!}
    
    {{-- タスク削除フォーム --}}
    {!! Form::model($Task, ['route' => ['Tasks.destroy', $Task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection