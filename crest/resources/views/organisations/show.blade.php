@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Organisation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('organisations.organisation.destroy', $organisation->Organisation_ID) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('organisations.organisation.index') }}" class="btn btn-primary" title="{{ trans('organisations.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('organisations.organisation.create') }}" class="btn btn-success" title="{{ trans('organisations.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('organisations.organisation.edit', $organisation->Organisation_ID ) }}" class="btn btn-primary" title="{{ trans('organisations.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('organisations.delete') }}" onclick="return confirm(&quot;{{ trans('organisations.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('organisations.Created_At') }}</dt>
            <dd>{{ $organisation->Created_At }}</dd>
            <dt>{{ trans('organisations.Organisation_Name') }}</dt>
            <dd>{{ $organisation->Organisation_Name }}</dd>
            <dt>{{ trans('organisations.Updated_At') }}</dt>
            <dd>{{ $organisation->Updated_At }}</dd>

        </dl>

    </div>
</div>

@endsection