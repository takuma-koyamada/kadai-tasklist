@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($Tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Tasks as $Task)
                <tr>
                    {{-- タスク詳細ページへのリンク --}}
                    <td>{!! link_to_route('Tasks.show', $Task->id, ['Task' => $Task->id]) !!}</td>
                    <td>{{ $Task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('Tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
    @endsection