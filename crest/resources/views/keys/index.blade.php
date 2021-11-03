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
                <h4 class="mt-5 mb-5">{{ trans('keys.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('keys.key.create') }}" class="btn btn-success" title="{{ trans('keys.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($keys) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('keys.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('keys.Key_Name') }}</th>
                            <th>{{ trans('keys.Employee_ID') }}</th>
                            <th>{{ trans('keys.Is_Active') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($keys as $key)
                        <tr>
                            <td>{{ $key->Key_Name }}</td>
                            <td>{{ optional($key->Employee)->Employee_Name }}</td>
                            <td>{{ ($key->Is_Active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('keys.key.destroy', $key->Key_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('keys.key.show', $key->Key_ID ) }}" class="btn btn-info" title="{{ trans('keys.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('keys.key.edit', $key->Key_ID ) }}" class="btn btn-primary" title="{{ trans('keys.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('keys.delete') }}" onclick="return confirm(&quot;{{ trans('keys.confirm_delete') }}&quot;)">
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
            {!! $keys->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection