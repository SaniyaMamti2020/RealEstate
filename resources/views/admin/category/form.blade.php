<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="mb-3">
            {!! Form::label('name', trans('category.name')) !!}<span class="text-danger">*</span>
            {!! Form::text('name', null, ['class' => 'form-control required', 'maxlength' => '100', 'id' => 'name']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="mb-3">
            {!! Form::label('parent_id', trans('category.parent_id')) !!}<span class="text-danger">*</span>
            <select class="form-select" name="parent_id" id="parent_id">
                <option value="" selected>Select Sub Category</option>
                @foreach ($parentMember as $m_id => $m_name)
                    <option value="{{ $m_id }}" {{ $m_id == $selectedParentId ? 'selected' : '' }}>
                        {{ $m_name }}</option>
                    {!! \App\Helpers\Helper::getChildData($m_id, 1, $selectedParentId, $category->id ?? '') !!}
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            {!! Form::label('image', trans('category.image')) !!}<span class="text-danger">*</span>
            @if (isset($category) && $category->image != '' && !empty($category->image))
                {!! Form::file('image', ['class' => 'form-control ', 'id' => 'image']) !!}
            @else
                {!! Form::file('image', ['class' => 'form-control required ', 'id' => 'image']) !!}
            @endif
            (Suggested Images Size 600 pixel width x 600 pixel height for better display)
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        @if (isset($category) && $category->image != '' && !empty($category->image))
            <img alt="Image"
                src="{{ isset($category['image']) && !empty($category['image']) ? asset('/upload/category/' . $category['image']) : asset('/media/no-image.png') }}"
                class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">
        @else
            <img src="" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">
        @endif
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('description', trans('category.description')) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => '3']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary">{{ !isset($category) ? __('common.save') : __('common.update') }}</button>
        <button class="btn btn-secondary" type="reset">{{ __('common.reset') }}</button>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }
</style>
