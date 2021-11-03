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
                <h4 class="mt-5 mb-5">{{ trans('organisations.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('organisations.organisation.create') }}" class="btn btn-success" title="{{ trans('organisations.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($organisations) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('organisations.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('organisations.Organisation_Name') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($organisations as $organisation)
                        <tr>
                            <td>{{ $organisation->Organisation_Name }}</td>

                            <td>

                                <form method="POST" action="{!! route('organisations.organisation.destroy', $organisation->Organisation_ID) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('organisations.organisation.show', $organisation->Organisation_ID ) }}" class="btn btn-info" title="{{ trans('organisations.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('organisations.organisation.edit', $organisation->Organisation_ID ) }}" class="btn btn-primary" title="{{ trans('organisations.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('organisations.delete') }}" onclick="return confirm(&quot;{{ trans('organisations.confirm_delete') }}&quot;)">
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
            {!! $organisations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection