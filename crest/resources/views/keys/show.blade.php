@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Key' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('keys.key.destroy', $key->Key_ID) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('keys.key.index') }}" class="btn btn-primary" title="{{ trans('keys.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('keys.key.create') }}" class="btn btn-success" title="{{ trans('keys.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('keys.key.edit', $key->Key_ID ) }}" class="btn btn-primary" title="{{ trans('keys.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('keys.delete') }}" onclick="return confirm(&quot;{{ trans('keys.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('keys.Key_Name') }}</dt>
            <dd>{{ $key->Key_Name }}</dd>
            <dt>{{ trans('keys.Employee_ID') }}</dt>
            <dd>{{ optional($key->Employee)->Employee_Name }}</dd>
            <dt>{{ trans('keys.Is_Active') }}</dt>
            <dd>{{ ($key->Is_Active) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('keys.Created_At') }}</dt>
            <dd>{{ $key->Created_At }}</dd>
            <dt>{{ trans('keys.Updated_At') }}</dt>
            <dd>{{ $key->Updated_At }}</dd>

        </dl>

    </div>
</div>

@endsection