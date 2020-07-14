@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->

    <!-- Текущие задачи -->
    @if (count($builds) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Актуальные билды
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
                    @foreach ($builds as $build)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <a href="{{ url('/build?id=') }}{{ $build->id_build }}">{{ $build->name_build }}</a>
                            </td>

                            <td class="table-text">
                                автор: <a href="{{ url('/viewProfile?id=') }}{{ $build->user_id }}">{{ $build->name_profile }}</a>
                            </td>

                            <td>
                                <!-- TODO: Кнопка Удалить -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
