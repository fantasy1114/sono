@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Worksite' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('worksites.worksite.destroy', $worksite->Worksite_ID) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('worksites.worksite.index') }}" class="btn btn-primary" title="{{ trans('worksites.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('worksites.worksite.create') }}" class="btn btn-success" title="{{ trans('worksites.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('worksites.worksite.edit', $worksite->Worksite_ID ) }}" class="btn btn-primary" title="{{ trans('worksites.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('worksites.delete') }}" onclick="return confirm(&quot;{{ trans('worksites.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('worksites.Worksite_Name') }}</dt>
            <dd>{{ $worksite->Worksite_Name }}</dd>
            <dt>{{ trans('worksites.Worksite_Address') }}</dt>
            <dd>{{ $worksite->Worksite_Address }}</dd>
            <dt>{{ trans('worksites.Is_Active') }}</dt>
            <dd>{{ ($worksite->Is_Active) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('worksites.Organisation_ID') }}</dt>
            <dd>{{ optional($worksite->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('worksites.Created_At') }}</dt>
            <dd>{{ $worksite->Created_At }}</dd>
            <dt>{{ trans('worksites.Updated_At') }}</dt>
            <dd>{{ $worksite->Updated_At }}</dd>

        </dl>

    </div>
</div>

@endsection