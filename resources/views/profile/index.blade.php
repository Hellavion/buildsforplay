
@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="col-md-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Ваш профиль</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('profile') }}"  enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label">Имя пользователя</label>
                                    <input name="name" class="form-control" type="text" required=""  value="{{ (isset($profile->name)) ? $profile->name : '' }}">
                                    <input name="id" class="form-control" hidden type="text" required=""  value="{{ (isset($profile->id)) ? $profile->id : '' }}">
                                </div>
                                {{--<div class="form-group">
                                    <label class="control-label">Content</label>
                                    <textarea name="content" class="form-control" rows="4">{{ $post->content }}</textarea>
                                </div>--}}
                                <div class="form-group">
                                    <img src="{{(isset($profile)) ? $profile->getFirstMediaUrl('images', 'thumb') : ''}}" class="mt-2 mb-3" />
                                    <label class="control-label">Аватар</label>
                                    <input name="image" type="file" class="form-control-file" id="image">
                                </div>
                            </div>

                            @if ($builds))
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Созданные билды
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
                                                        <a href="{{ url('/build?id=') }}{{ $build->id }}">{{ $build->name }}</a>

                                                        {{--<div>{!! $build->url_video !!}</div>
                                                        <div>{{ $build->description }}</div>
                                                        <div>{{ $build->full_text }}</div>--}}
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

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
