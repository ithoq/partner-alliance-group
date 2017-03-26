@php
    $arr = [
        'file_cover_sheet',
        'file_land_contract',
        'file_building_contract',
        'file_extra_contract_docs',
        'file_other',
        'file_colour_scheme',
        'file_house_brochure',
        'file_investor_grade_specs'
    ];
@endphp

<div class="row">
    @foreach($arr as $file)
        <div class="col-md-3">
            <div class="panel panel-default">
            	<div class="panel-heading">
                    <div class="form-group" style="margin-top: 24px;">
                        <label for="{{ $file }}"><strong>{{ ucwords(str_replace('_', ' ', str_replace('file_', '', $file))) }}</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="file" class="form-control" id="{{ $file }}" name="{{ $file }}" />
                    </div>
            	</div>
            </div>
        </div>    
    @endforeach
</div>