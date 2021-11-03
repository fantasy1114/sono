@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Registry' }}</h4>
        </span>

        <div class="pull-right">

            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('registries.registry.index') }}" class="btn btn-primary" title="{{ trans('registries.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>
                </div>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('registries.Key_Name') }}</dt>
            <dd>{{ $registry->Key_Name }}</dd>
            <dt>{{ trans('registries.Action') }}</dt>
            <dd>{{ $registry->Action }}</dd>
            <dt>{{ trans('registries.Action_Time') }}</dt>
            <dd>{{ $registry->Action_Time }}</dd>
            <dt>{{ trans('registries.Battery_State') }}</dt>
            <dd>{{ $registry->Battery_State }}</dd>

        </dl>

    </div>
</div>

@endsection