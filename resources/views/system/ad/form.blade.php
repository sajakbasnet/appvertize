@extends('system.layouts.form')
@section('inputs')
<x-system.form.form-group :input="['name' => 'title','required'=>'true', 'label' => 'Ad Name','default'=> $item->title ?? old('title'), 'error' => $errors->first('title')]" />
<!-- <x-system.form.form-group :input="['name' => 'attributes', 'required'=>'true', 'label' => 'Category Attribute','default'=> $item->attributes ?? old('attributes'), 'error' => $errors->first('attributes')]" /> -->
<x-system.form.form-group :input="['label' => 'Ad Description']">
    <x-slot name="inputs">
    <x-system.form.text-area :input="['name'=>'description', 'label' => 'Description', 'default' => $item->description ?? old('description'), 'editor' => true, 'error' => $errors->first('description')]" />
    </x-slot>
</x-system.form.form-group>
<x-system.form.form-group :input="['name'=>'start_date','type'=>'date','required'=>'true', 'class'=> 'datepicker', 'label' => 'Start Date', 'default'=>old('start_date') ?? $item->start_date ?? '','autoComplete'=>'off', 'error' => $errors->first('start_date')]" />
<x-system.form.form-group :input="['name'=>'end_date','type'=>'date','required'=>'true', 'class'=> 'datepicker', 'label' => 'End Date', 'default'=>old('end_date') ?? $item->end_date ?? '','autoComplete'=>'off', 'error' => $errors->first('end_date')]" />
<x-system.form.form-group :input="['label' => 'File']">
        <x-slot name='inputs'>
            <x-system.form.input-file :input="['name' => 'file_name','type'=> 'file',  'placeholder' => 'Select Video or Photo', 'helpText'=>'File must be in .mp4, .jpg, .png Format.','error' => $errors->first('file_name')]" />
        </x-slot>
    </x-system.form.form-group>
<x-system.form.form-group :input="['label' => 'Status']">
    <x-slot name="inputs">
        <x-system.form.input-radio :input="['name' => 'status', 'options' => $status, 'default' => $item->status ?? 1]" />
    </x-slot>
</x-system.form.form-group>
@endsection