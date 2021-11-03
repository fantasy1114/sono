@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Manager' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('managers.manager.destroy', $manager->Manager_ID) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('managers.manager.index') }}" class="btn btn-primary" title="{{ trans('managers.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('managers.manager.create') }}" class="btn btn-success" title="{{ trans('managers.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('managers.manager.edit', $manager->Manager_ID ) }}" class="btn btn-primary" title="{{ trans('managers.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('managers.delete') }}" onclick="return confirm(&quot;{{ trans('managers.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('managers.Manager_Name') }}</dt>
            <dd>{{ $manager->Manager_Name }}</dd>
            <dt>{{ trans('managers.Manager_Email') }}</dt>
            <dd>{{ $manager->Manager_Email }}</dd>
            <dt>{{ trans('managers.Manager_Phone') }}</dt>
            <dd>{{ $manager->Manager_Phone }}</dd>
            <dt>{{ trans('managers.Is_Active') }}</dt>
            <dd>{{ ($manager->Is_Active) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('managers.Organisation_ID') }}</dt>
            <dd>{{ optional($manager->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('managers.Created_At') }}</dt>
            <dd>{{ $manager->Created_At }}</dd>
            <dt>{{ trans('managers.Updated_At') }}</dt>
            <dd>{{ $manager->Updated_At }}</dd>

        </dl>

    </div>
</div>

@endsection