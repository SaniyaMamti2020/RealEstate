<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('title', trans('slider.slider_title')) !!}<span class="text-danger">*</span>
            {!! Form::text('title', null, ['class' => 'form-control required ', 'id' => 'title', 'maxlength' => '75']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('sub_title', trans('slider.sub_title')) !!}
            {!! Form::text('sub_title', null, ['class' => 'form-control ', 'id' => 'sub_title', 'maxlength' => '75']) !!}
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            {!! Form::label('slider_img', trans('slider.slider_img')) !!}<span class="text-danger">*</span>
            @if (isset($slider) && $slider->slider_img != '' && !empty($slider->slider_img))
                {!! Form::file('slider_img', ['class' => 'form-control ', 'id' => 'slider_img']) !!}
            @else
                {!! Form::file('slider_img', ['class' => 'form-control required ', 'id' => 'slider_img']) !!}
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        @if (isset($slider) && $slider->slider_img != '' && !empty($slider->slider_img))
            <div class="image_delete" data-id="{{ $slider->id }}"><img alt="Image"
                    src="{{ isset($slider['slider_img']) && !empty($slider['slider_img']) ? asset('/upload/slider/' . $slider['slider_img']) : asset('/media/no-image.png') }}"
                    class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">
            </div>
        @else
            <img alt="" src="" class="pt-10 align-self-end" id="img_preview" name="img_preview"
                style="width: 50%;">
        @endif
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('btn_name', trans('slider.btn_name')) !!}
            {!! Form::text('btn_name', null, ['class' => 'form-control', 'id' => 'btn_name', 'maxlength' => '75']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('btn_link', trans('slider.btn_link')) !!}
            {!! Form::text('btn_link', null, ['class' => 'form-control', 'id' => 'btn_link', 'maxlength' => '75']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary">{{ !isset($slider) ? __('common.save') : __('common.update') }}</button>
        <button class="btn btn-secondary" type="reset">{{ __('common.reset') }}</button>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }

    .cke_inner {
        border: 1px solid;
        border-color: #e6edef;
    }
</style>
