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
                <h4 class="mt-5 mb-5">{{ trans('registries.model_plural') }}</h4>
            </div>

        </div>
        
        @if(count($registries) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('registries.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('registries.Key_Name') }}</th>
                            <th>{{ trans('registries.Action') }}</th>
                            <th>{{ trans('registries.Action_Time') }}</th>
                            <th>{{ trans('registries.Battery_State') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($registries as $registry)
                        <tr>
                            <td>{{ $registry->Key_Name }}</td>
                            <td>{{ $registry->Action }}</td>
                            <td>{{ $registry->Action_Time }}</td>
                            <td>{{ $registry->Battery_State }}</td>

                            <td>

                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('registries.registry.show', $registry->Registry_ID ) }}" class="btn btn-info" title="{{ trans('registries.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $registries->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection