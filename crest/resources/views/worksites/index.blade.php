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
                <h4 class="mt-5 mb-5">{{ trans('worksites.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('worksites.worksite.create') }}" class="btn btn-success" title="{{ trans('worksites.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($worksites) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('worksites.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('worksites.Worksite_Name') }}</th>
                            <th>{{ trans('worksites.Worksite_Address') }}</th>
                            <th>{{ trans('worksites.Is_Active') }}</th>
                            <th>{{ trans('worksites.Organisation_ID') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($worksites as $worksite)
                        <tr>
                            <td>{{ $worksite->Worksite_Name }}</td>
                            <td>{{ $worksite->Worksite_Address }}</td>
                            <td>{{ ($worksite->Is_Active) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($worksite->Organisation)->Organisation_Name }}</td>

                            <td>

                                <form method="POST" action="{!! route('worksites.worksite.destroy', $worksite->Worksite_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('worksites.worksite.show', $worksite->Worksite_ID ) }}" class="btn btn-info" title="{{ trans('worksites.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('worksites.worksite.edit', $worksite->Worksite_ID ) }}" class="btn btn-primary" title="{{ trans('worksites.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('worksites.delete') }}" onclick="return confirm(&quot;{{ trans('worksites.confirm_delete') }}&quot;)">
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
            {!! $worksites->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection