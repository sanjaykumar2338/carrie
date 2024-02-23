<div class="modal-header d-block elements-header">
	<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title mb-2">{{ $element['name'] }}</h4>
	@if (!empty($elementTabs))
	<div class="default-tab">
		<ul class="nav nav-tabs" role="tablist">
	    	@foreach($elementTabs as $key => $elementTabsVal)
	        	<li class="nav-item">
	        		<a href="#{{ str_replace(' ', '', ucwords($elementTabsVal)) }}" class="ME-Tabs nav-link {{ ($key == 0) ? 'active' : '' }}" data-bs-toggle="tab" >{{ $elementTabsVal }}</a>
	        	</li>
	        @endforeach
	    </ul>
	</div>
	@endif
</div>
<form action="{{ route('update.element.me') }}" class="horizontal-form ElementSettingForm" novalidate="novalidate" id="BlogAdminAddSectionForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	@csrf
	<input type="hidden" name="element_id" id="element_id"  value="{{ $element['base'] }}">
	<input type="hidden" name="element_index" value="{{ $element_index }}" class="element_index">
	<div class="modal-body">
		<div class="tab-content">

			@foreach($elementTabs as $key => $elementTabsVal)
			<div class="tab-pane fade {{ ($key == 0) ? 'show active' : '' }}" id="{{ str_replace(' ', '', ucwords($elementTabsVal)) }}"  role="tabpanel" >  
				<div class="row">
					@foreach ($element['params'] as $value)
						@if(!empty($value['group']) && $elementTabsVal == $value['group'])
						@php

							$depend_on = '';
							$datafield = '';
							$ajaxId = '';
							$ajaxdatafield = '';

							if (isset($value['depend_on'])) 
							{
								if (is_array($value['depend_on']) && !empty($value['depend_on']))
								{
									foreach($value['depend_on'] as $field_name => $field_array)
									{
										$depend_on .= $field_name.'-depend d-none';
										$datafield .= "data-".$field_name."-value =".$field_array['value']." ";
										$datafield .= "data-".$field_name."-operator = ".$field_array['operator']." ";
									}
								}
								else {
									$depend_on = $value['depend_on'].'-depend d-none';
								}
							}

							if (isset($value['ajax_container']) && isset($value['ajax_url'])) {
								$ajaxdatafield .= "data-ajax_container=".$value['ajax_container']." ";
								$ajaxdatafield .= "data-ajax_url=".$value['ajax_url']." ";
							}
							
							if (isset($value['ajax_field']) && $value['ajax_field'] == true ) {
								$ajaxId = $value['param_name'].'Container';
							}

						@endphp
						
						<div class="col-md-12 mb-2 mb-md-3 {{ $depend_on }}" {{ $datafield }} id="{{ $ajaxId }}">
							@php
								$fieldOptions 	= isset($value['options']) 		? $value['options'] 	: array();
								$fieldValue 	= isset($value['value']) 		? $value['value'] 		: '';
								$fieldHeading 	= isset($value['heading']) 		? $value['heading'] 	: '';
								$placeholder 	= isset($value['placeholder']) 	? $value['placeholder'] : '';
								$classes 		= isset($value['class']) 		? $value['class'] 		: '';
								$extra_tag 		= isset($value['extra_tag']) 	? $value['extra_tag'] 	: '';
								$description 	= isset($value['description']) 	? $value['description'] : '';
								$help 			= isset($value['help']) 		? $value['help'] 		: '';
								$imgSizes 		= isset($value['sizes']) 		? $value['sizes'] 		: '';
							@endphp


							@if($value['type'] == 'number')
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								@if ($help != '')
								<div class="bootstrap-popover d-inline-block">
									<a href="javascript: void(0);" class="text-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $help }}" title="{{ $fieldHeading }}"><i class="fas fa-question-circle"></i></a>
								</div>
								@endif
								<input name="{{ $value['param_name'] }}" class="form-control element-depend {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $placeholder }}" type="number" id="{{ $value['param_name'] }}" {{ $extra_tag }}>	

							@elseif($value['type'] == 'textfield')
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								@if ($help != '')
								<div class="bootstrap-popover d-inline-block">
									<a href="javascript: void(0);" class="text-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $help }}" title="{{ $fieldHeading }}"><i class="fas fa-question-circle"></i></a>
								</div>
								@endif
								<input name="{{ $value['param_name'] }}" class="form-control element-depend {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $placeholder }}" type="text" id="{{ $value['param_name'] }}" {{ $extra_tag }}>								

							@elseif($value['type'] == 'textarea')
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;	
								@endphp
						
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								@if ($help != '')
								<div class="bootstrap-popover d-inline-block">
									<a href="javascript: void(0);" class="text-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $help }}" title="{{ $fieldHeading }}"><i class="fas fa-question-circle"></i></a>
								</div>
								@endif
								<textarea name="{{ $value['param_name'] }}" class="form-control {{ $classes }}" placeholder="{{ $placeholder }}" cols="30" rows="6" id="{{ $value['param_name'] }}" {{ $extra_tag }}>{{ $fieldValue }}</textarea>

							@elseif($value['type'] == 'link')
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								@if ($help != '')
								<div class="bootstrap-popover d-inline-block">
									<a href="javascript: void(0);" class="text-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $help }}" title="{{ $fieldHeading }}"><i class="fas fa-question-circle"></i></a>
								</div>
								@endif
								<input name="{{ $value['param_name'] }}" class="form-control  {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $placeholder }}" type="url" id="{{ $value['param_name'] }}" {{ $extra_tag }}>

							@elseif($value['type'] == 'attach_image')
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;

									$thumbHeight = isset($imgSizes['thumbnail']['height']) && !empty($imgSizes['thumbnail']['height']) ? $imgSizes['thumbnail']['height'] : '100';
									$thumbWidth = isset($imgSizes['thumbnail']['width']) && !empty($imgSizes['thumbnail']['width']) ? $imgSizes['thumbnail']['width'] : 'auto';
								@endphp
								
								@if(!empty($fieldValue) && file_exists(storage_path('app/public/page-images/magic-editor/'.$fieldValue)))
									<div class="RemoveElementImage custom-image-delete">
										<img src="{{ asset('storage/page-images/magic-editor/'.$fieldValue) }}" class="rounded object-fit-cover" width="{{ $thumbWidth }}" height="{{ $thumbHeight }}">
										<a href="{{ \URL::to('/') }}/admin/magic_editors/remove_image" class="RemoveElementImage delete-btn text-danger" rel="{{ $value['param_name'].'-hidden' }}" val="{{ $fieldValue }}"><i class="fa fa-times"></i></a>
									</div>
								@else
									<img class="mb-2" height="80" src="{{ asset('images/noimage.jpg') }}"  alt="">
								@endif
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								@if ($help != '')
								<div class="bootstrap-popover d-inline-block">
									<a href="javascript: void(0);" class="text-primary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $help }}" title="{{ $fieldHeading }}"><i class="fas fa-question-circle"></i></a>
								</div>
								@endif
								<div >
									<input type="file" name="{{ $value['param_name'] }}" class="ps-2 form-control {{ $classes }}" placeholder="{{ $placeholder }}" id="{{ $value['param_name'] }}" {{ $extra_tag }}>
								</div>
								<input type="hidden" name="{{ $value['param_name'] }}" id="{{ $value['param_name'] }}-hidden" value="{{ $fieldValue }}">
							
							@elseif($value['type'] == 'attach_multiple_images')
							
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								
								@if(!empty($fieldValue))
									@php
										$images = explode(',', $fieldValue);
									@endphp
									<div class="row m-0">
									@foreach ($images as $imgValue)
										@if(file_exists(storage_path('app/public/page-images/magic-editor/'.$imgValue)))
											<div class="px-1 mb-2 col-md-4 col-sm-6 RemoveAttachmentSection custom-image-delete ">
												<img src="{{ asset('storage/page-images/magic-editor/'.$imgValue) }}" class="w-100 rounded object-fit-cover">
												<a href="{{ \URL::to('/') }}/admin/magic_editors/remove_image" class="RemoveElementImage  delete-btn text-danger" rel="{{ $value['param_name'] }}-hidden" val="{{ $imgValue }}"><i class="fa fa-times"></i></a>
											</div>
										@endif
									@endforeach
									</div>
								
								@else
									<img class="mb-2" src="{{ asset('images/noimage.jpg') }}"  height="80">
								@endif

								<label for="{{ $value['param_name'] }}" class="control-label d-block">{{ $fieldHeading }}</label>
								<div >
									<input type="file" name="{{ $value['param_name'] }}[]" class="ps-2 form-control {{ $classes }}" placeholder="{{ $placeholder }}" id="{{ $value['param_name'] }}" multiple="multiple" {{ $extra_tag }}>
								</div>
								<input type="hidden" name="{{ $value['param_name'] }}" id="{{ $value['param_name'] }}-hidden" value="{{ $fieldValue }}">
							
							@elseif($value['type'] == 'dropdown')
								@php
									$newfieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : '';
								@endphp
									
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								<select name="{{ $value['param_name'] }}" id="{{ $value['param_name'] }}" class=" form-control element-depend {{ $classes }}" {{ $ajaxdatafield }} {{ $extra_tag }}>
									<option value="">{{ $fieldHeading }}</option>
									@if(!empty($fieldOptions))
										@foreach($fieldOptions as $dropdownKey => $dropdownVal)
											<option value="{{ $dropdownKey }}" {{ ($newfieldValue == $dropdownKey) ? 'selected="selected"' : '' }}>{{ $dropdownVal }}</option>
										@endforeach
									@endif
								</select>
														
							@elseif($value['type'] == 'dropdown_multi')
								@php
									$newfieldValue = array();
									if(!empty($elementData) && isset($elementData[$value['param_name']]) && !is_array($elementData[$value['param_name']])) 
									{
										$newfieldValue =  explode(',', $elementData[$value['param_name']]);
									}
									else if(!empty($elementData) && isset($elementData[$value['param_name']]) && is_array($elementData[$value['param_name']])) {
										$newfieldValue = $elementData[$value['param_name']];
									}
								@endphp
									<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
									<select name="{{ $value['param_name'] }}[]" id="{{ $value['param_name'] }}" class="form-control element-depend {{ $classes }}" multiple="multiple" {{ $extra_tag }} {{ $ajaxdatafield }} style="height: 110px;" >
										<option value="">{{ $fieldHeading }}</option>
										@if(!empty($fieldOptions))
											@foreach($fieldOptions as $dropdownKey => $dropdownVal)
												<option value="{{ $dropdownKey }}" {{ (in_array($dropdownKey, $newfieldValue)) ? 'selected="selected"' : '' }}>{{ $dropdownVal }}</option>
											@endforeach
										@endif
									</select>
							
							@elseif($value['type'] == 'checkbox')
								@php
									$checked = (isset($elementData[$value['param_name']]) && $elementData[$value['param_name']] == $fieldValue) ? 'checked="checked"' : '';	
								@endphp
								<div class="form-check checkbox">
									<input name="{{ $value['param_name'] }}" class="form-check-input element-depend {{ $classes }}" value="{{ $fieldValue }}" type="checkbox" id="{{ $value['param_name'] }}" {{ $checked }} {{ $extra_tag }}>
									<label for="{{ $value['param_name'] }}" class="control-label form-check-label">{{ $fieldHeading }}</label>
								</div>
							
							@elseif($value['type'] == 'checkbox_multi')
							
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$checkboxFields = is_array($fieldOptions) ? $fieldOptions : array();
									$checkboxFieldsVal = (isset($elementData[$value['param_name']]) && !empty($elementData[$value['param_name']])) ? explode(',', $elementData[$value['param_name']]) : array();
								@endphp
								@foreach ($checkboxFields as $checkboxKey => $checkboxValue) 
									@php
										$checked = (in_array($checkboxKey, $checkboxFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="form-check checkbox">
										<input name="{{ $value['param_name'] }}[]" class="form-check-input element-depend {{ $classes }}" value="{{ $checkboxKey }}" type="checkbox" id="{{ $checkboxKey }}" {{ $checked }} {{ $extra_tag }}>
										<label class="control-label form-check-label" for="{{ $checkboxKey }}">{{ $checkboxValue }}</label>
									</div>
								@endforeach
							
							@elseif($value['type'] == 'radio')
							
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$radioFields = is_array($fieldOptions) ? $fieldOptions : array();
									$radioFieldsVal = (isset($elementData[$value['param_name']]) && !empty($elementData[$value['param_name']])) ? explode(',', $elementData[$value['param_name']]) : array();
								@endphp
								@foreach ($radioFields as $radioKey => $radioValue) 
									@php
										$checked = (in_array($radioKey, $radioFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="radio ">
										<input name="{{ $value['param_name'] }}" class="form-check-input element-depend {{ $classes }}" value="{{ $radioKey }}" type="radio" id="{{ $value['param_name'].'_'.$radioKey }}" {{ $checked }} {{ $extra_tag }}>
										<label class="control-label form-check-label" for="{{ $value['param_name'].'_'.$radioKey }}">{{ $radioValue }}</label>
									</div>
								@endforeach
							
							@elseif($value['type'] == 'radio_with_img')
							
								<label class="control-label">{{ $fieldHeading }}</label>
								@php
									$radioFields = is_array($fieldOptions) ? $fieldOptions : array();
									$radioFieldsVal = (isset($elementData[$value['param_name']]) && !empty($elementData[$value['param_name']])) ? explode(',', $elementData[$value['param_name']]) : array();
								@endphp
								@foreach ($radioFields as $radioKey => $radioValue)
									@php
										$checked = (in_array($radioKey, $radioFieldsVal)) ? 'checked="checked"' : '';
									@endphp
									<div class="radio mb-2 {{ $classes }}">
										<input name="{{ $value['param_name'] }}" value="{{ $radioKey }}" type="radio" id="{{ $value['param_name'].'_'.$radioKey }}" {{ $checked }} {{ $extra_tag }}>
										<label class="control-label" for="{{ $value['param_name'].'_'.$radioKey }}">
											<img src="{{ $radioValue }}" class="object-fit-cover" width="auto" height="80">
										</label>
									</div>
								@endforeach
							
							@elseif($value['type'] == 'autocomplete')
							
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $value['param_name'] }}" class="form-control {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $placeholder }}" type="text" id="{{ $value['param_name'] }}" {{ $extra_tag }}>
							
							@elseif($value['type'] == 'textarea_safe')
							
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<label for="{{ $value['param_name'] }}" class="control-label">{{ $fieldHeading }}</label>
								<input name="{{ $value['param_name'] }}" class="form-control {{ $classes }}" value="{{ $fieldValue }}" placeholder="{{ $placeholder }}" type="text" id="{{ $value['param_name'] }}" {{ $extra_tag }}>
							
							@elseif($value['type'] == 'button')
							
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<button type="button" class="form-control {{ $classes }}" id="{{ $value['param_name'] }}">{{ $fieldHeading }}</button>
							
							@elseif($value['type'] == 'param_group')
							
								@php
									$fieldValue = (!empty($elementData) && isset($elementData[$value['param_name']])) ? $elementData[$value['param_name']] : $fieldValue;
								@endphp
								<button type="button" class="form-control addMoreElementSection mb-2" id="{{ $value['param_name'] }}">{{ $fieldHeading }}</button>
								
								@include('admin.magic_editor.Elements.admin_param_group_section' , ['params' => $value['params']])
							@endif

							@if($description)
								<small>{{ $description }}</small>
							@endif
						</div>
						@endif
					@endforeach
				</div>
			</div>
			@endforeach
		</div>  
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
		<button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
	</div>
</form>
<script>
jQuery(document).ready(function(){
	'use strict';
	saveElementSettings();	
	elementDependencyAjax();
	meTabs();
	depend_element();
	addMoreSectionClick();
	removeImageSection();
});
$(document).ajaxComplete(function(){
	'use strict';
	depend_element();
});

</script>