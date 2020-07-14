<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ url('createBuild') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 control-label">Название</label>
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="url_video" class="col-sm-3 control-label">Ссылка на видео</label>
                    <input type="text" name="url_video" id="task-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="description" class="col-sm-3 control-label">Краткое описание</label>
                    <input type="text" name="description" id="task-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="full_text" class="col-sm-3 control-label">Полное описание</label>
                    <textarea name="full_text"></textarea>
                    <script>
                        CKEDITOR.replace( 'full_text');
                    </script>
                </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Текущие задачи -->
@endsection
