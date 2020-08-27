@extends('layouts.admin')
@section('content')
@can('districtposting_create')
    <!-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.districtpostings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.districtposting.title_singular') }}
            </a>
        </div>
    </div> -->
@endcan

<div class="card">
    <div class="card-header">
        Filter Postings
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("searchresults") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('name', 'பெயர்', ['class' => 'awesome']); !!}
                        {!! Form::text('name', null, ['class' => 'form-control']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('districted', 'மாவட்டம்', ['class' => 'awesome']); !!}
                        {!! Form::select('districted', $districts, null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('applied_post', 'விரும்பும் பொறுப்பு', ['class' => 'awesome']); !!}
                        {!! Form::select('applied_post', ['மாவட்டச் செயலாளர்' => 'மாவட்டச் செயலாளர்', 'மாவட்டப் பொருளாளர்' => 'மாவட்டப் பொருளாளர்', 'செய்தி தொடர்பாளர்' => 'செய்தி தொடர்பாளர்', 'மாவட்ட துணைச் செயலாளர்' => 'மாவட்ட துணைச் செயலாளர்', 'செயற்குழு உறுப்பினர்' => 'செயற்குழு உறுப்பினர்'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('current_post', 'தற்போதைய பொறுப்பு', ['class' => 'awesome']); !!}
                        {!! Form::select('current_post', $current_posts, null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('assembly_name', 'சட்ட மன்ற தொகுதி', ['class' => 'awesome']); !!}
                        {!! Form::select('assembly_name', $assembly_names, null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('social_division', 'சமூகப் பிரிவு', ['class' => 'awesome']); !!}
                        {!! Form::select('social_division', ['பிற்படுத்தப்பட்டவர் (BC/MBC)' => 'பிற்படுத்தப்பட்டவர் (BC/MBC)', 'முன்னேறிய வகுப்பினர் (FC)' => 'முன்னேறிய வகுப்பினர் (FC)', 'பழங்குடியினர்' => 'பழங்குடியினர்', 'இசுலாமியர்' => 'இசுலாமியர்', 'கிறித்தவர்' => 'கிறித்தவர்'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('selected', 'தேர்ந்தெடுத்தவை', ['class' => 'awesome']); !!}
                        {!! Form::select('selected_option', [false => 'Not Selected', true => 'Selected'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('selected_post', 'அளிக்கப்பட்ட பொறுப்பு', ['class' => 'awesome']); !!}
                        {!! Form::select('selected_post', ['மாவட்டச் செயலாளர்' => 'மாவட்டச் செயலாளர்', 'மாவட்டப் பொருளாளர்' => 'மாவட்டப் பொருளாளர்', 'செய்தி தொடர்பாளர்' => 'செய்தி தொடர்பாளர்', 'மாவட்ட துணைச் செயலாளர்' => 'மாவட்ட துணைச் செயலாளர்', 'செயற்குழு உறுப்பினர்' => 'செயற்குழு உறுப்பினர்'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary col-md-12" type="submit">
                        Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection