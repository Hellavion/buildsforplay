@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $build->name }}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th></th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{!! $build->url_video !!}</div>
                                <div>{{ $build->description }}</div>
                                <div>{{!! $build->full_text !!}}</div>
                            </td>

                            <td>
                                <!-- TODO: Кнопка Удалить -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
