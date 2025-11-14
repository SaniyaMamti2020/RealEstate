<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('title', trans('testimonial.title')) !!}<span class="text-danger">*</span>
            {!! Form::text('title', null, ['class' => 'form-control required', 'id' => 'title', 'maxlength' => '75']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('designation', trans('testimonial.designation')) !!}<span class="text-danger">*</span>
            {!! Form::text('designation', null, [
                'class' => 'form-control required',
                'id' => 'designation',
                'maxlength' => '75',
            ]) !!}
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            {!! Form::label('image', trans('testimonial.image')) !!}<span class="text-danger">*</span>
            @if (isset($testimonial) && $testimonial->image != '' && !empty($testimonial->image))
                {!! Form::file('image', ['class' => 'form-control ', 'id' => 'image']) !!}
            @else
                {!! Form::file('image', ['class' => 'form-control required ', 'id' => 'image']) !!}
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        @if (isset($testimonial) && $testimonial->image != '' && !empty($testimonial->image))
            <div class="image_delete" data-id="{{ $testimonial->id }}">
                <img alt="Image"
                    src="{{ isset($testimonial['image']) && !empty($testimonial['image']) ? asset('/upload/testimonial/' . $testimonial['image']) : asset('/media/no-image.png') }}"
                    class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">
            </div>
        @else
            <img src="" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">
        @endif
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('description', trans('testimonial.description')) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => '1']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary">{{ !isset($testimonial) ? __('common.save') : __('common.update') }}</button>
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
