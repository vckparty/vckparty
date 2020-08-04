<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <style type="text/css">


        .form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    background-clip: padding-box;
    border: 1px solid;
    color: #768192;
    background-color: #fff;
    border-color: #02408c;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    #social_medias, #block_div, #panchayat_div, #townpanchayat_div, #townvattam_div, #municipality_div, #municipalityvattam_div, #metropolitan_div, #area_div, #metrovattam_div { display: none; }
    </style>
    @yield('styles')
</head>

<body>

<div class="container">
        <header class="c-header d-flex justify-content-center">
      <!-- Header content here -->
      <img class="img-fluid" src="images/banner.png">
    </header>
    
<div class="card">
    <div class="card-header">
        சமூக ஊடகம் - விண்ணப்பம்
    </div>

    <div class="card-body">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
        <form method="POST" action="{{ route("postApplication") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.application.fields.name') }}</label>
                <input class="col-md-6 col-lg-6 col-sm-12 form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.name_helper') }}</span>
            </div>

            <input type="hidden" name="category_id" value="2">

            <input type="hidden" name="subcategory_id" value="2">
           
            <div class="form-group col-md-6 col-lg-6 col-sm-12" style="padding-left: 0px;">
                <label class="required" for="post_id">{{ trans('cruds.application.fields.applying_post') }}</label>
                <select class="form-control select2 {{ $errors->has('applying_post') ? 'is-invalid' : '' }}" name="post_id" id="post_id" required>
                    @foreach($applying_posts as $id => $applying_post)
                        <option value="{{ $id }}" {{ old('applying_post') == $id ? 'selected' : '' }}>{{ $applying_post }}</option>
                    @endforeach
                </select>
                @if($errors->has('applying_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applying_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.applying_post_helper') }}</span>
            </div>
           
            <div class="form-group" id="social_medias">
                <label>{{ trans('cruds.application.fields.social_medias') }}</label>
                @foreach(App\Models\Application::SOCIAL_MEDIAS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('social_medias') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="social_medias_{{ $key }}" name="social_medias" value="{{ $key }}" {{ old('social_medias', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="social_medias_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('social_medias'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_medias') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.social_medias_helper') }}</span>
            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-12" style="padding-left: 0px;">
                <label class="required" for="district">{{ trans('cruds.application.fields.district') }}</label>
                <select class="form-control col-md-6 col-lg-6 col-sm-12 select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ old('district') == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.district_helper') }}</span>
            </div>

            <div class="form-group" style="padding-left: 0px;" id="block_div">
                <label class="required" for="applying_post_id">ஒன்றியம்</label>
                <select name="block_id" id="block" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('block'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.applying_post_helper') }}</span>
            </div>

            <div class="form-group" style="padding-left: 0px;" id="panchayat_div">
                <label class="required" for="post_id">ஊராட்சி ஒன்றியம்</label>
                <select name="panchayat_id" id="panchayat" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('applying_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applying_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.applying_post_helper') }}</span>
            </div>

            <div class="form-group" style="padding-left: 0px;" id="townpanchayat_div">
                <label for="townpanchayat_id">{{ trans('cruds.application.fields.townpanchayat') }}</label>
                <select name="townpanchayat_id" id="townpanchayat" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('townpanchayat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('townpanchayat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.townpanchayat_helper') }}</span>
            </div>
            <div class="form-group" style="padding-left: 0px;" id="townvattam_div">
                <label for="townvattam_id">{{ trans('cruds.application.fields.townvattam') }}</label>
                <select name="townvattam_id" id="townvattam" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('townvattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('townvattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.townvattam_helper') }}</span>
            </div>
            <div class="form-group" style="padding-left: 0px;" id="municipality_div">
                <label for="municipality_id">{{ trans('cruds.application.fields.municipality') }}</label>
                <select name="municipality_id" id="municipality" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('municipality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.municipality_helper') }}</span>
            </div>
            <div class="form-group" style="padding-left: 0px;" id="municipalityvattam_div">
                <label for="municipalityvattam_id">{{ trans('cruds.application.fields.municipalityvattam') }}</label>
                <select name="municipalityvattam_id" id="municipalityvattam" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('municipalityvattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipalityvattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.municipalityvattam_helper') }}</span>
            </div>
            <div class="form-group" style="padding-left: 0px;" id="metropolitan_div">
                <label for="metropolitan_id">{{ trans('cruds.application.fields.metropolitan') }}</label>
                <select name="metropolitan_id" id="metropolitan" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('metropolitan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metropolitan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.metropolitan_helper') }}</span>
            </div>
            <div class="form-group" id="area_div">
                <label for="area_id">{{ trans('cruds.application.fields.area') }}</label>
                <select name="area_id" id="area" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.area_helper') }}</span>
            </div>
            <div class="form-group" style="padding-left: 0px;" id="metrovattam_div">
                <label for="metrovattam_id">{{ trans('cruds.application.fields.metrovattam') }}</label>
                <select name="metrovattam_id" id="metrovattam" class="form-control col-md-6 col-lg-6 col-sm-12">
                    
                </select>
                @if($errors->has('metrovattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metrovattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.metrovattam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.application.fields.facebook') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.application.fields.twitter') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">{{ trans('cruds.application.fields.whatsapp_number') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', '') }}">
                @if($errors->has('whatsapp_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.whatsapp_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.application.fields.email') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube_channel">{{ trans('cruds.application.fields.youtube_channel') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('youtube_channel') ? 'is-invalid' : '' }}" type="text" name="youtube_channel" id="youtube_channel" value="{{ old('youtube_channel', '') }}">
                @if($errors->has('youtube_channel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube_channel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.youtube_channel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.application.fields.instagram') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_post">{{ trans('cruds.application.fields.current_post') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('current_post') ? 'is-invalid' : '' }}" type="text" name="current_post" id="current_post" value="{{ old('current_post', '') }}">
                @if($errors->has('current_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.current_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.gender') }}</label>
                @foreach(App\Models\Application::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.application.fields.dob') }}</label>
                <input class="form-control date col-md-6 col-lg-6 col-sm-12 {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother">{{ trans('cruds.application.fields.mother') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('mother') ? 'is-invalid' : '' }}" type="text" name="mother" id="mother" value="{{ old('mother', '') }}" required>
                @if($errors->has('mother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father">{{ trans('cruds.application.fields.father') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('father') ? 'is-invalid' : '' }}" type="text" name="father" id="father" value="{{ old('father', '') }}" required>
                @if($errors->has('father'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.father_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.marrital_status') }}</label>
                @foreach(App\Models\Application::MARRITAL_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('marrital_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="marrital_status_{{ $key }}" name="marrital_status" value="{{ $key }}" {{ old('marrital_status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="marrital_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('marrital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marrital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.marrital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="husband_wife_name">{{ trans('cruds.application.fields.husband_wife_name') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('husband_wife_name') ? 'is-invalid' : '' }}" type="text" name="husband_wife_name" id="husband_wife_name" value="{{ old('husband_wife_name', '') }}">
                @if($errors->has('husband_wife_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('husband_wife_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.husband_wife_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="education">{{ trans('cruds.application.fields.education') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', '') }}" required>
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="profession">{{ trans('cruds.application.fields.profession') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', '') }}" required>
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="join_date">{{ trans('cruds.application.fields.join_date') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('join_date') ? 'is-invalid' : '' }}" type="text" name="join_date" id="join_date" value="{{ old('join_date', '') }}">
                @if($errors->has('join_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('join_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.join_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.application.fields.permanent_address') }}</label>
                <textarea class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" name="permanent_address" id="permanent_address" required>{{ old('permanent_address') }}</textarea>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="communication_address">{{ trans('cruds.application.fields.communication_address') }}</label>
                <textarea class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('communication_address') ? 'is-invalid' : '' }}" name="communication_address" id="communication_address" required>{{ old('communication_address') }}</textarea>
                @if($errors->has('communication_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.communication_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.social_category') }}</label>
                @foreach(App\Models\Application::SOCIAL_CATEGORY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('social_category') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="social_category_{{ $key }}" name="social_category" value="{{ $key }}" {{ old('social_category', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="social_category_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('social_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.social_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.application.fields.notes') }}</label>
                <textarea class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.application.fields.photo') }}</label>
                <div class="needsclick dropzone col-md-6 col-lg-6 col-sm-12 {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_status">{{ trans('cruds.application.fields.payment_status') }}</label>
                <input class="form-control col-md-6 col-lg-6 col-sm-12 {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', '') }}" required>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_receipt">{{ trans('cruds.application.fields.payment_receipt') }}</label>
                <div class="needsclick dropzone col-md-6 col-lg-6 col-sm-12 {{ $errors->has('payment_receipt') ? 'is-invalid' : '' }}" id="payment_receipt-dropzone">
                </div>
                @if($errors->has('payment_receipt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_receipt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.payment_receipt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.application.fields.documents') }}</label>
                <div class="needsclick dropzone col-md-6 col-lg-6 col-sm-12 {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('documents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.documents_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
    $('#post_id').on('change', function() {
      //  alert( this.value ); // or $(this).val()
        if(this.value == 36) {
        $('#social_medias').show();
      } else {
        $('#social_medias').hide();
      }
      if(this.value == 39) {
        $('#block_div').show();
        $('#panchayat_div').show();
      }else if(this.value == 40) {
        $('#block_div').show();
        $('#panchayat_div').show();
      } else {
        $('#block_div').hide();
        $('#panchayat_div').hide();
      }

        if(this.value == 41) {
        $('#municipality_div').show();
        $('#municipalityvattam_div').show();
      } else if(this.value == 42) {
        $('#municipality_div').show();
        $('#municipalityvattam_div').show();
      } else {
        $('#municipality_div').hide();
        $('#municipalityvattam_div').hide();
      }

        if(this.value == 43) {
        $('#townpanchayat_div').show();
        $('#townvattam_div').show();
      } else if(this.value == 44) {
        $('#townpanchayat_div').show();
        $('#townvattam_div').show();
      } else {
        $('#townpanchayat_div').hide();
        $('#townvattam_div').hide();
      }

        if(this.value == 45) {
        $('#metropolitan_div').show();
        $('#area_div').show();
        $('#metrovattam_div').show();
      } else if(this.value == 46) {
        $('#metropolitan_div').show();
        $('#area_div').show();
        $('#metrovattam_div').show();
      } else {
        $('#metropolitan_div').hide();
        $('#area_div').hide();
        $('#metrovattam_div').hide();
      }
    });


$('#category').change(function(){
    var categoryID = $(this).val(); 
    if(categoryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-subcategory-list')}}?category_id="+categoryID,
           success:function(res){               
            if(res){
                $("#subcategory").empty();
                $.each(res,function(key,value){
                    $("#subcategory").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#subcategory").empty();
            }
           }
        });
    }else{
        $("#subcategory").empty();
        $("#post").empty();
    }      
   });

$('#subcategory').on('change',function(){
    var subcategoryID = $(this).val();
    var scv = '';    
    if(subcategoryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-post-list')}}?subcategory_id="+subcategoryID,
           success:function(res){               
            if(res){
                $("#post").empty();
                $("#post").append('<option value="'+scv+'">Select</option>');
                $.each(res,function(key,value){
                    $("#post").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#post").empty();
            }
           }
        });
    }else{
        $("#post").empty();
    }
        
   });

    $('#district').change(function(){
    var districtID = $(this).val(); 
    var bvb = '';
    if(districtID){
        $.ajax({
           type:"GET",
           url:"{{url('get-block-list')}}?district_id="+districtID,
           success:function(res){               
            if(res){
                $("#block").empty();
                $("#block").append('<option value="'+bvb+'">Select</option>');
                $.each(res,function(key,value){
                    $("#block").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#block").empty();
            }
           }
        });
    }else{
        $("#block").empty();
        $("#panchayat").empty();
    }      
   });

$('#block').on('change',function(){
    var blockID = $(this).val();
    if(blockID){
        $.ajax({
           type:"GET",
           url:"{{url('get-panchayat-list')}}?block_id="+blockID,
           success:function(res){               
            if(res){
                $("#panchayat").empty();
                $.each(res,function(key,value){
                    $("#panchayat").append('<option value="'+key+'">'+value+'</option>');
                });
            }else{
               $("#panchayat").empty();
            }
           }
        });
    }else{
        $("#panchayat").empty();
    }  
});

$('#district').change(function(){
    var districtID = $(this).val();
    var bvc = ''; 
    if(districtID){
        $.ajax({
           type:"GET",
           url:"{{url('get-townpanchayat-list')}}?district_id="+districtID,
           success:function(res){               
            if(res){
                $("#townpanchayat").empty();
                $("#townpanchayat").append('<option value="'+bvc+'">Select</option>');
                $.each(res,function(key,value){
                    $("#townpanchayat").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#townpanchayat").empty();
            }
           }
        });
    }else{
        $("#townpanchayat").empty();
        $("#townvattam").empty();
    }      
   });

$('#townpanchayat').on('change',function(){
    var townpanchayatID = $(this).val();    
    if(townpanchayatID){
        $.ajax({
           type:"GET",
           url:"{{url('get-townvattam-list')}}?townpanchayat_id="+townpanchayatID,
           success:function(res){               
            if(res){
                $("#townvattam").empty();
                $.each(res,function(key,value){
                    $("#townvattam").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#townvattam").empty();
            }
           }
        });
    }else{
        $("#townvattam").empty();
    }
        
   });

$('#district').change(function(){
    var districtID = $(this).val();
    var dvo = ''; 
    if(districtID){
        $.ajax({
           type:"GET",
           url:"{{url('get-municipality-list')}}?district_id="+districtID,
           success:function(res){               
            if(res){
                $("#municipality").empty();
                $("#municipality").append('<option value="'+dvo+'">Select</option>');
                $.each(res,function(key,value){
                    $("#municipality").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#municipality").empty();
            }
           }
        });
    }else{
        $("#municipality").empty();
        $("#municipalityvattam").empty();
    }      
   });

$('#municipality').on('change',function(){
    var municipalityID = $(this).val();    
    if(municipalityID){
        $.ajax({
           type:"GET",
           url:"{{url('get-municipalityvattam-list')}}?municipality_id="+municipalityID,
           success:function(res){               
            if(res){
                $("#municipalityvattam").empty();
                $.each(res,function(key,value){
                    $("#municipalityvattam").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#municipalityvattam").empty();
            }
           }
        });
    }else{
        $("#municipalityvattam").empty();
    }
        
   });



$('#district').change(function(){
    var districtID = $(this).val();
    var ghj = ''; 
    if(districtID){
        $.ajax({
           type:"GET",
           url:"{{url('get-metropolitan-list')}}?district_id="+districtID,
           success:function(res){               
            if(res){
                $("#metropolitan").empty();
                $("#metropolitan").append('<option value="'+ghj+'">Select</option>');
                $.each(res,function(key,value){
                    $("#metropolitan").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#metropolitan").empty();
            }
           }
        });
    }else{
        $("#metropolitan").empty();
        $("#area").empty();
        $("#metrovattam").empty();
    }      
   });


$('#metropolitan').change(function(){
    var metropolitanID = $(this).val();
    var mpv = ''; 
    if(metropolitanID){
        $.ajax({
           type:"GET",
           url:"{{url('get-area-list')}}?metropolitan_id="+metropolitanID,
           success:function(res){               
            if(res){
                $("#area").empty();
                $("#area").append('<option value="'+mpv+'">Select</option>');
                $.each(res,function(key,value){
                    $("#area").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#area").empty();
            }
           }
        });
    }else{
        $("#area").empty();
        $("#metrovattam").empty();
    }      
   });

$('#area').on('change',function(){
    var areaID = $(this).val();    
    if(areaID){
        $.ajax({
           type:"GET",
           url:"{{url('get-metrovattam-list')}}?area_id="+areaID,
           success:function(res){               
            if(res){
                $("#metrovattam").empty();
                $.each(res,function(key,value){
                    $("#metrovattam").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#metrovattam").empty();
            }
           }
        });
    }else{
        $("#metrovattam").empty();
    }
        
   });





        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
  let selectAllButtonTrans = '{{ trans('global.select_all') }}'
  let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'selectAll',
        className: 'btn-primary',
        text: selectAllButtonTrans,
        exportOptions: {
          columns: ':visible'
        },
        action: function(e, dt) {
          e.preventDefault()
          dt.rows().deselect();
          dt.rows({ search: 'applied' }).select();
        }
      },
      {
        extend: 'selectNone',
        className: 'btn-primary',
        text: selectNoneButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>


<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 132,
      height: 170
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->photo)
      var file = {!! json_encode($application->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    var uploadedPaymentReceiptMap = {}
Dropzone.options.paymentReceiptDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="payment_receipt[]" value="' + response.name + '">')
      uploadedPaymentReceiptMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPaymentReceiptMap[file.name]
      }
      $('form').find('input[name="payment_receipt[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($application) && $application->payment_receipt)
          var files =
            {!! json_encode($application->payment_receipt) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="payment_receipt[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($application) && $application->documents)
          var files =
            {!! json_encode($application->documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
</body>

</html>