@if($field['show_rules']['showInCreate'])
@php
if(isset($field['valueWhenCreate'])){
$value = $field['valueWhenCreate'];
}elseif(isset($field['value'])){
$value = $field['value'];
}else{
$value = '';
}
$col = isset($field['columnWhenCreate'])?$field['columnWhenCreate']:$field['column'];

@endphp
@if(isset($field['translatable']) && count($field['translatable']) > 0)
 @include('dash::resource.renderElements.textarea.create_translatable')
@else
<div class="col-lg-{{ $col }} col-md-{{ $col }} col-sm-12 col-xs-12 box_{{ $field['attribute'] }}">
	<div class="form-group my-3 ">
		<label for="{{ $field['attribute'] }}"
		class="text-dark text-capitalize">{{ $field['name'] }}
		@if(isset($field['rule']) && in_array('required',$field['rule']) || isset($field['ruleWhenCreate']) && in_array('required',$field['ruleWhenCreate']))
		<span class="text-danger text-sm">*</span>
		@endif
		</label>
		<textarea name="{{ $field['attribute'] }}"
		rows="{{ isset($field['rows'])?$field['rows']:'6' }}"
		cols="{{ isset($field['cols'])?$field['cols']:'' }}"
		placeholder="{{ isset($field['placeholder'])?$field['placeholder']:$field['name'] }}"
		{{ isset($field['textAlign'])?'style="text-align:'.$field['textAlign'].'"':'' }}
		{{ isset($field['readonly'])?'readonly':'' }}
		{{ isset($field['disabled'])?'disabled':'' }}
		class="form-control  {{ $field['attribute'] }} {{ $errors->has($field['attribute'])?'is-invalid':'' }}"
		id="{{ $field['attribute'] }}">{{ old($field['attribute'],$value) }}</textarea>
		{!! isset($field['help'])?$field['help']:'' !!}
		@error($field['attribute'])
		<p class="invalid-feedback">{{ $message }}</p>
		@enderror
	</div>
</div>
@endif
@endif



