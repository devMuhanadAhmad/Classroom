@if ($errors->any())
<div class="alert alert-danger">
    <h5>{{ __('Error Occured') }}</h5>
    <ul>
        @foreach ($errors->all() as $err)
            <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<x-flash-message />

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">Class name (required)</label>
    <div class="col-sm-10">
        <x-form.input name="name" :value="$classroom->name" />
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">Section</label>
    <div class="col-sm-10">
        <x-form.input name="section" :value="$classroom->section" />
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">Subject</label>
    <div class="col-sm-10">
        <x-form.input name="subject" :value="$classroom->subject" />
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">Room</label>
    <div class="col-sm-10">
        <x-form.input name="room" :value="$classroom->room" />
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">Cover image</label>
    <div class="col-sm-10">
        <x-form.input name="cover_image_path"  type="file" />
    </div>
</div>
