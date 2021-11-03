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
                <h4 class="mt-5 mb-5">{{ trans('managers.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('managers.manager.create') }}" class="btn btn-success" title="{{ trans('managers.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($managers) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('managers.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('managers.Manager_Name') }}</th>
                            <th>{{ trans('managers.Manager_Email') }}</th>
                            <th>{{ trans('managers.Manager_Phone') }}</th>
                            <th>{{ trans('managers.Is_Active') }}</th>
                            <th>{{ trans('managers.Organisation_ID') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($managers as $manager)
                        <tr>
                            <td>{{ $manager->Manager_Name }}</td>
                            <td>{{ $manager->Manager_Email }}</td>
                            <td>{{ $manager->Manager_Phone }}</td>
                            <td>{{ ($manager->Is_Active) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($manager->Organisation)->Organisation_Name }}</td>

                            <td>

                                <form method="POST" action="{!! route('managers.manager.destroy', $manager->Manager_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('managers.manager.show', $manager->Manager_ID ) }}" class="btn btn-info" title="{{ trans('managers.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('managers.manager.edit', $manager->Manager_ID ) }}" class="btn btn-primary" title="{{ trans('managers.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('managers.delete') }}" onclick="return confirm(&quot;{{ trans('managers.confirm_delete') }}&quot;)">
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
            {!! $managers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection