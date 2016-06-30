@extends('admin.layouts.master')

@section('content')

    <p>{!! link_to_route('surveys.create', trans('admin::admin.survey-index-add_new'), [], ['class' => 'btn btn-success']) !!}</p>

    @if($surveys->count() > 0)
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">{{ trans('admin::admin.survey-index-survey_list') }}</div>
            </div>
            <div class="portlet-body">
                <table id="datatable" class="table table-striped table-hover table-responsive datatable">
                    <thead>
                    <tr>
                        <th>{{ trans('admin::admin.survey-index-title') }}</th>
                        <th>{{ trans('admin::admin.survey-index-desc') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($surveys as $survey)
                        <tr>
                            <td>{{ $survey->title }}</td>
                            <td>{{ $survey->description }}</td>
                            <td>
                                {!! link_to_route('surveys.edit', trans('admin::admin.survey-index-edit'), [$survey->id], ['class' => 'btn btn-xs btn-info']) !!}
                                {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . trans('admin::admin.survey-index-are_you_sure') . '\');',  'route' => array('surveys.destroy', $survey->id)]) !!}
                                {!! Form::submit(trans('admin::admin.survey-index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @else
        {{ trans('admin::admin.survey-index-no_entries_found') }}
    @endif

@endsection