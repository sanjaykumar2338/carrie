@php
	$group_value_data['%KEY%'] = array();
	$group_value_data = $group_value_data + $groupedVal;
@endphp
@foreach ($group_value_data as $groupKey => $groupValue) 

	@php
		$style = '';
		if(trim($groupKey) == '%KEY%')
		{
			$style = "style=display:none;";
		}

		if(trim($groupKey) == '%KEY%'){
			$attr_bs = 'bsx';	
		}else{
			$attr_bs = 'bs';	
		}
		
	@endphp
	<div class="row CustomizeSection" {{ $style }}>	
		<div class="accordion accordion-primary-solid ParamGroupSection" id="accordion{{ $groupKey }}">
		  	<div class="accordion-item">
		  		
				<div class="accordion-header rounded-lg"  data-{{$attr_bs}}-toggle="collapse" data-{{$attr_bs}}-target="#collapse{{ $groupKey }}" aria-controls="collapse{{ $groupKey }}" aria-expanded="false" role="button">
					<div class="d-flex align-items-center gap-3">
						<i class="fa fa-close 1 fas fa-times"></i>
						<span class="accordion-header-text">{{ __('Customize Section') }}</span>
					</div>
			  		<span class="accordion-header-indicator"></span>
				</div>
				

				<div id="collapse{{ $groupKey }}" class="accordion__body collapse show" data-{{$attr_bs}}-parent="#accordion{{ $groupKey }}">
				  	<div class="accordion-body">
					@foreach ($params as $value) 
				
						@php
							$hideDependDiv = $divClass = '';
							$inputName 	= 'grouped['.$groupKey.']['.$value['param_name'].']';
							$fileInputName 	= 'grouped['.$groupKey.']['.$value['param_name'].']';
							$inputId 	= 'grouped'.$groupKey.$value['param_name'];
							if(isset($value['depend_on']))
							{
								$divClass = $divClass.' '.$value['depend_on'].'-depend';
								$hideDependDiv = 'd-none';
							}

						@endphp
						<div class="col-md-12 mb-2 {{ $divClass }} {{ $hideDependDiv }}">
							@php
								$fieldOptions 	= isset($value['options']) 	? $value['options'] 	: array();
								$fieldValue 	= isset($value['value']) 	? $value['value'] 		: '';
								$fieldHeading 	= isset($value['heading']) 	? $value['heading'] 	: '';
								$classes 		= isset($value['class']) 	? $value['class'] 		: '';
								$extra_tag 		= isset($value['extra_tag'])? $value['extra_tag'] 	: '';
								$imgSizes 		= isset($value['sizes']) 	? $value['sizes'] 		: '';
							@endphp

							@if($value['type'] == 'textfield')
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $fieldHeading }}" type="text" id="{{ $inputId }}" {{ $extra_tag }}>

							@elseif($value['type'] == 'number')
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $fieldHeading }}" type="number" id="{{ $inputId }}" {{ $extra_tag }}>
							
							@elseif($value['type'] == 'textarea')

								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<textarea name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" placeholder="{{ $fieldHeading }}" cols="30" rows="6" id="{{ $inputId }}" {{ $extra_tag }}>{{ $fieldValue }}</textarea>

								
							@elseif($value['type'] == 'link')
								
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $inputName }}" class="form-control ParamGroupInput  {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $fieldHeading }}" type="url" id="{{ $inputId }}" {{ $extra_tag }}>

								
							@elseif($value['type'] == 'attach_image')
								
								@php
								$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								$thumbHeight = isset($imgSizes['thumbnail']['height']) && !empty($imgSizes['thumbnail']['height']) ? $imgSizes['thumbnail']['height'] : '100';
								$thumbWidth = isset($imgSizes['thumbnail']['width']) && !empty($imgSizes['thumbnail']['width']) ? $imgSizes['thumbnail']['width'] : 'auto';
								@endphp
										
								@if(!empty($fieldValue) && file_exists(storage_path('app/public/page-images/magic-editor/'.$fieldValue)))
									<div class="RemoveElementImage custom-image-delete">
										<img src="{{ asset('storage/page-images/magic-editor/'.$fieldValue) }}" class="rounded object-fit-cover" height="{{ $thumbHeight }}" width="{{ $thumbWidth }}"  alt="Section Image">
										<a href="{{ \URL::to('/') }}/admin/magic_editors/remove_image" class="RemoveElementImage delete-btn text-danger" rel="{{ $inputId }}-hidden" val="{{ $fieldValue }}"><i class="fa fa-times"></i></a>
									</div>
								
								@else
									<img src="{{ asset('images/noimage.jpg') }}" height="80">
								@endif

								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input type="file" name="{{ $fileInputName }}" class="ParamGroupInput {{ $classes }}" placeholder="{{ $fieldHeading }}" id="{{ $inputId }}" {{ $extra_tag }}>
								<input type="hidden" name="{{ $fileInputName }}" id="{{ $inputId }}-hidden" value="{{ $fieldValue }}">
								
							@elseif($value['type'] == 'attach_multiple_images')
								
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp

								@if(!empty($fieldValue))
									@php
										$images = explode(',', $fieldValue);
									@endphp
									<div class="row m-0">
									@foreach ($images as $imgValue)
										@if(file_exists(storage_path('app/public/page-images/magic-editor/'.$imgValue)))
										
											<div class="px-1 mb-2 col-md-4 col-sm-6 RemoveAttachmentSection custom-image-delete">
												<img src="{{ asset('storage/page-images/magic-editor/'.$imgValue) }}" class="rounded object-fit-cover" width="200" alt="Section Image">
												<a href="{{ \URL::to('/') }}/admin/magic_editors/remove_image" class="RemoveElementImage delete-btn text-danger" rel="{{ $inputId }}-hidden" val="{{ $imgValue }}"><i class="fa fa-times"></i></a>
											</div>
										@endif
									@endforeach
									</div>
								
								@else
									<img src="{{ asset('images/noimage.jpg') }}" width="200">
								@endif

								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input type="file" name="{{ $fileInputName }}[]" class="ParamGroupInput {{ $classes }}" placeholder="{{ $fieldHeading }}" id="{{ $inputId }}" multiple="multiple" {{ $extra_tag }}>
								<input type="hidden" name="{{ $fileInputName }}" id="{{ $inputId }}-hidden" value="{{ $fieldValue }}">
								
							@elseif($value['type'] == 'dropdown')
								
								@php
									$newfieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : '';
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<select name="{{ $inputName }}" id="{{ $inputId }}" class=" form-control ParamGroupInput {{ $classes }}" {{ $extra_tag }}>
									@forelse($fieldOptions as $dropdownKey => $dropdownVal)
										<option value="{{ $dropdownKey }}" {{ ($newfieldValue == $dropdownKey) ? 'selected="selected"' : '' }}>{{ $dropdownVal }}</option>
									@empty
									@endforelse
								</select>
								
							@elseif($value['type'] == 'dropdown_multi')
								
								@php
									$newfieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? explode(',', $groupValue[$value['param_name']]) : array();
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<select name="{{ $inputName }}" id="{{ $inputId }}" class=" form-control ParamGroupInput {{ $classes }}" multiple="multiple" {{ $extra_tag }} style="height: 110px;">
									@forelse($fieldOptions as $dropdownKey => $dropdownVal)
										<option value="{{ $dropdownKey }}" {{ (in_array($dropdownKey, $newfieldValue)) ? 'selected="selected"' : '' }}>{{ $dropdownVal }}</option>
									@empty
									@endforelse
								</select>

							@elseif($value['type'] == 'checkbox')
									@php
										$checked = (isset($elementData[$value['param_name']]) && $elementData[$value['param_name']] == $fieldValue) ? 'checked="checked"' : '';	
									@endphp
									<div class="checkbox form-check">
										<input name="{{ $inputName }}" class=" ParamGroupInput form-check-input element-depend {{ $classes }}" value="{{ $fieldValue }}" type="checkbox" id="{{ $inputId }}" {{ $checked }} {{ $extra_tag }}>
										<label for="{{ $inputId }}" class="control-label form-check-label">{{ $fieldHeading }}</label>
									</div>

							@elseif($value['type'] == 'checkbox_multi')
								
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$checkboxFields = is_array($fieldOptions) ? $fieldOptions : array();
									$checkboxFieldsVal = (isset($groupValue[$value['param_name']]) && !empty($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : array();
								@endphp
								@forelse ($checkboxFields as $checkboxKey => $checkboxValue)
									@php
										$checked = (in_array($checkboxKey, $checkboxFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="checkbox">
										<label class="control-label" for="{{ $inputId.$checkboxKey }}">{{ $checkboxValue }}</label>
										<input name="{{ $inputName }}[]" class="ParamGroupInput {{ $classes }}" value="{{ $checkboxKey }}" type="checkbox" id="{{ $inputId.$checkboxKey }}" {{ $checked }} {{ $extra_tag }}>
									</div>
								@empty
								@endforelse
								
							@elseif($value['type'] == 'radio')
								
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$radioFields = is_array($fieldOptions) ? $fieldOptions : array();
									$radioFieldsVal = (isset($groupValue[$value['param_name']]) && !empty($groupValue[$value['param_name']])) ? explode(',', $groupValue[$value['param_name']]) : array();
								@endphp
								@forelse ($radioFields as $radioKey => $radioValue)
									@php
										$checked = (in_array($radioKey, $radioFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="radio {{ $classes }}">
										<input name="{{ $inputName }}" value="{{ $radioKey }}" class="ParamGroupInput {{ $classes }}" type="radio" id="{{ $inputId.$radioKey }}" {{ $checked }} {{ $extra_tag }}>
										<label class="control-label" for="{{ $inputId.$radioKey }}">{!! $radioValue !!}</label>
									</div>
								@empty
								@endforelse
								
							@elseif($value['type'] == 'radio_with_img')
								
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$radioFields = is_array($fieldOptions) ? $fieldOptions : array();
									$radioFieldsVal = (isset($groupValue[$value['param_name']]) && !empty($groupValue[$value['param_name']])) ? explode(',', $groupValue[$value['param_name']]) : array();
								@endphp
								@forelse ($radioFields as $radioKey => $radioValue)
									@php
										$checked = (in_array($radioKey, $radioFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="radio {{ $classes }}">
										<input name="{{ $inputName }}" value="{{ $inputId.$radioKey }}" class="ParamGroupInput {{ $classes }}" type="radio" id="{{ $radioKey }}" {{ $checked }} {{ $extra_tag }}>
										<label class="control-label" for="{{ $inputId.$radioKey }}"><img src="{{ $radioValue }}" width="100px" height="100px"></label>
									</div>
								@empty
								@endforelse
								
							@elseif($value['type'] == 'autocomplete')
								
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $fieldHeading }}" type="text" id="{{ $inputId }}" {{ $extra_tag }}>
								
							@elseif($value['type'] == 'textarea_safe')
								
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $inputId }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $fieldHeading }}" type="text" id="{{ $inputId }}" {{ $extra_tag }}>
								
							@elseif($value['type'] == 'button')
							
								@php
									$fieldValue = (!empty($groupValue) && isset($groupValue[$value['param_name']])) ? $groupValue[$value['param_name']] : $fieldValue;
								@endphp
								<button type="button" name="{{ $inputName }}" class="form-control ParamGroupInput {{ $classes }}" id="{{ $inputId }}">{{ $fieldHeading }}</button>

							@endif
						</div>
					@endforeach
					</div>
				</div>
		  	</div>
		</div>
	</div>
@endforeach

<script>
	jQuery(document).ready(function(){
		'use strict';
		removeParamGroupSection();
	});
</script>