@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Employee' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('employees.employee.destroy', $employee->Employee_ID) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('employees.employee.index') }}" class="btn btn-primary" title="{{ trans('employees.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('employees.employee.create') }}" class="btn btn-success" title="{{ trans('employees.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('employees.employee.edit', $employee->Employee_ID ) }}" class="btn btn-primary" title="{{ trans('employees.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('employees.delete') }}" onclick="return confirm(&quot;{{ trans('employees.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('employees.Employee_Name') }}</dt>
            <dd>{{ $employee->Employee_Name }}</dd>
            <dt>{{ trans('employees.Employee_Phone') }}</dt>
            <dd>{{ $employee->Employee_Phone }}</dd>
            <dt>{{ trans('employees.Is_Active') }}</dt>
            <dd>{{ ($employee->Is_Active) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('employees.Organisation_ID') }}</dt>
            <dd>{{ optional($employee->Organisation)->Organisation_Name }}</dd>
            <dt>{{ trans('employees.Created_At') }}</dt>
            <dd>{{ $employee->Created_At }}</dd>
            <dt>{{ trans('employees.Updated_At') }}</dt>
            <dd>{{ $employee->Updated_At }}</dd>

        </dl>

    </div>
</div>

@endsection