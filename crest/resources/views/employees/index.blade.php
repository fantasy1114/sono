@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('employees.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('employees.employee.create') }}" class="btn btn-success" title="{{ trans('employees.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($employees) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('employees.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('employees.Employee_Name') }}</th>
                            <th>{{ trans('employees.Employee_Phone') }}</th>
                            <th>{{ trans('employees.Is_Active') }}</th>
                            <th>{{ trans('employees.Organisation_ID') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->Employee_Name }}</td>
                            <td>{{ $employee->Employee_Phone }}</td>
                            <td>{{ ($employee->Is_Active) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($employee->Organisation)->Organisation_Name }}</td>

                            <td>

                                <form method="POST" action="{!! route('employees.employee.destroy', $employee->Employee_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('employees.employee.show', $employee->Employee_ID ) }}" class="btn btn-info" title="{{ trans('employees.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('employees.employee.edit', $employee->Employee_ID ) }}" class="btn btn-primary" title="{{ trans('employees.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('employees.delete') }}" onclick="return confirm(&quot;{{ trans('employees.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $employees->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection