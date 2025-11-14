<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="mb-3">
            {!! Form::label('page_name', trans('pages.page_name')) !!}<span class="text-danger">*</span>
            {!! Form::text('page_name', null, [
                'class' => 'form-control required',
                'id' => 'page_name',
                'maxlength' => '75',
            ]) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-8">
        <div class="mb-3">
            {!! Form::label('page_img', trans('pages.page_img')) !!}
            {!! Form::file('page_img', ['class' => 'form-control', 'id' => 'page_img']) !!}
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
        @if (isset($pages) && $pages->page_img != '' && !empty($pages->page_img))
            <div class="image_delete" data-id="{{ $pages->id }}">
                <span style="cursor: pointer;" class="page text-danger">X</span><img alt="Image"
                    src="{{ asset('/upload/pages/' . $pages['page_img']) }}" class="pt-10 align-self-end"
                    id="img_preview" name="img_preview" style="width: 50%;">
            </div>
        @else
            <img alt="" src="" class="pt-10 align-self-end" id="img_preview" name="img_preview"
                style="width: 50%;">
        @endif
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('page_desc', trans('pages.page_desc')) !!}<span class="text-danger">*</span>
            {!! Form::textarea('page_desc', null, ['class' => 'form-control', 'id' => 'page_desc', 'rows' => '3']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('page_meta_tag', trans('pages.page_meta_tag')) !!}
            {!! Form::text('page_meta_tag', null, [
                'class' => 'form-control',
                'id' => 'page_meta_tag',
                'rows' => '3',
                'maxlength' => config('constants.meta_tag_max_length'),
            ]) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('page_meta_title', trans('pages.page_meta_title')) !!}
            {!! Form::text('page_meta_title', null, [
                'class' => 'form-control',
                'id' => 'page_meta_title',
                'rows' => '3',
                'maxlength' => config('constants.meta_title_max_length'),
            ]) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('page_meta_desc', trans('pages.page_meta_desc')) !!}
            {!! Form::textarea('page_meta_desc', null, [
                'class' => 'form-control',
                'id' => 'page_meta_desc',
                'rows' => '3',
                'maxlength' => config('constants.meta_desc_max_length'),
            ]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary">{{ !isset($pages) ? __('common.save') : __('common.update') }}</button>
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
