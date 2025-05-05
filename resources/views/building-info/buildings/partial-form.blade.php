<div class="card-body" style="font-family: 'Open Sans', sans-serif;">

    <!-- preview building footprint if building is being approved via Building Survey- Approve -->
    @if (!empty($buildingSurvey))
        <div class="form-group row">
            {!! Form::label('', 'Preview Building Footprint', [
                'class' => 'col-sm-3 control-label',
                'style' => 'font-family: "Open Sans", sans-serif;',
            ]) !!}

            <div class="col-sm-5">
                <a title="Preview Building Location" data-toggle="modal" data-target="#kml-previewer"
                    data-id="{{ $buildingSurvey->kml }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
            </div>
        </div>
        @include('building-info.building-surveys.kmlPreviewModal')
    @endif

   <div class="form-group row required">
        {!! Form::label('building_type', 'Building Type', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('building_type', $building_type, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Building Type',
                'id' => 'building_type',
            ]) !!}
        </div>
    </div>

    <h3 class="mt-4 main_building_field" style="display: none"> Owner Information </h3>
    <!-- Building Owner Information -->
    <div class="form-group row required main_building_field" style="display: none" id="owner-name">
        {!! Form::label('owner_name', 'Owner Name', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('owner_name', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Owner Name',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none" id="owner-gender">
        {!! Form::label('owner_gender', 'Owner Gender', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('owner_gender', ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Owner Gender',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none">
        {!! Form::label('owner_nid', 'Owner NID Number', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('owner_nid', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Owner NID Number',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value.replace(/[^0-9]/g, '');",
            ]) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none" id="owner-contact">
    {!! Form::label('owner_contact', 'Owner Contact Number', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('owner_contact', null, [
            'class' => 'form-control col-sm-10',
            'placeholder' => 'Owner Contact Number',
            'autocomplete' => 'off',
            'oninput' => "validateOwnerContactInput(this)",
        ]) !!}
    </div>
</div>
    <!-- Building Location Information -->

    <h3 class="mt-4 main_building_field" style="display: none">Building Information</h3>

    <div class="form-group row required main_building_field" style="display: none" id="ward-number">
        {!! Form::label('ward', 'Ward Number', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('ward', $ward, null, ['class' => 'form-control col-sm-10', 'placeholder' => 'Ward Number']) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none" id="tole">
        {!! Form::label('tole', 'Tole Name', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('tole', null, ['class' => 'form-control col-sm-10', 'placeholder' => 'Tole Name']) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none" id="road-code">
        {!! Form::label('road_code', 'Road Code', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('road_code', $road_code, null, [
                'class' => 'form-control col-sm-10 road_code',
                'placeholder' => 'Road Code',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required main_building_field" style="display: none" id="house-address">
        {!! Form::label('house_address', 'House Address', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::text('house_address', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'House Address',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_building_field" style="display: none" id="house-number">
        {!! Form::label('house_number', 'House Number', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('house_number', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'House Number',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="bin-main-building">
        {!! Form::label('building_associated_to', 'BIN of Main Building', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('building_associated_to',null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'BIN of Main Building',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="structure-type">
        {!! Form::label('structure_type', 'Structure Type', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('structure_type', $structure_type, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Structure Type',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_associate_building" style="display: none" id="age-of-building">
        {!! Form::label('age_of_building', 'Age of the Building', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('age_of_building', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Age of the Building',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_associate_building" style="display: none">
        {!! Form::label('tax_code', 'Tax Code/Holding ID', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('tax_code', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Tax Code/Holding ID',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

     <div class="form-group row required main_associate_building" style="display: none" id="construction-year">
        {!! Form::label('construction_year', 'Building Construction Date', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::date('construction_year', null, [
                'class' => 'form-control date col-sm-10',
                'autocomplete' => 'off',
                'id' => 'construction_year',
                'max' => now()->format('Y-m-d'),
                'onclick' => 'this.showPicker();',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required main_associate_building" style="display: none" id="floor-count">
    {!! Form::label('floor_count', 'Number of Floors', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('floor_count', null, [
            'class' => 'form-control col-sm-10',
            'placeholder' => 'Number of Floors',
            'autocomplete' => 'off',
            'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '');",
        ]) !!}
       
    </div>
</div>

     <div class="form-group row required"  id="functional-use" style="display: none">
        {!! Form::label('functional_use_id', 'Functional Use of Building', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('functional_use_id', $functional_use, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Functional Use of Building',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="use-category" style="display: none">
        {!! Form::label('use_category_id', 'Use Category of Building', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('use_category_id', $use_category_id, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Use Category of Building',
                'id' => 'use_category_id', // Add an ID for JavaScript targeting
            ]) !!}
        </div>
    </div>

    <div class="form-group row" id="office-business" style="display: none">
        {!! Form::label('office_business_name', 'Office or Business Name', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('office_business_name', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Office or Business Name',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" style="display: none" id="number-households">
        {!! Form::label('household_served', 'Number of Households', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('number_households', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Number of Households',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>

     <div class="form-group row required main_pop_field" style="display: none" id="population-info">
        {!! Form::label('population_served', 'Population of Building', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('population_served', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Population of Building',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
    <!-- Additional Population Fields (Optional) -->
    <div class="form-group row main_pop_field" style="display: none" id="male-population">
        {!! Form::label('male_population', 'Male Population', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('male_population', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Male Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
    <div class="form-group row main_pop_field" style="display: none" id="female-population">
        {!! Form::label('female_population', 'Female Population', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('female_population', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Female Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
    <div class="form-group row main_pop_field" style="display: none" id="other-population">
        {!! Form::label('other_population', 'Other Population', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('other_population', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Other Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
   
    <div class="form-group row main_pop_field" style="display: none" id="diff-abled-population">
        {!! Form::label('diff_abled_pop', 'Differently Abled Population', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
        {!! Form::number('diff_abled_population', null, [
            'class' => 'form-control col-sm-10',
            'placeholder' => 'Differently Abled Population',
            'autocomplete' => 'off',
        ]) !!}
        </div>
    </div> 

    <div class="form-group row main_pop_field" style="display: none" id='male-diff-population'>
        {!! Form::label('diff_abled_male_pop', 'Differently Abled Male Population', [
            'class' => 'col-sm-3 control-label',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::number('diff_abled_male_pop', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Differently Abled Male Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
    <div class="form-group row main_pop_field" style="display: none" id='female-diff-population'>
        {!! Form::label('diff_abled_female_pop', 'Differently Abled Female Population', [
            'class' => 'col-sm-3 control-label',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::number('diff_abled_female_pop', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Differently Abled Female Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_pop_field" style="display: none" id='other-diff-population'>
        {!! Form::label('diff_abled_others_pop', 'Differently Abled Other Population', [
            'class' => 'col-sm-3 control-label',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::number('diff_abled_others_pop', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Differently Abled Other Population',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>

    <h3 class="mt-3 main_building_field" style="display: none"> LIC Information </h3>
    {{-- lic information --}}
    <div class="form-group row main_building_field required" id="low-income-hh" style="display: none">
        {!! Form::label('low_income_hh', 'Is Low Income House', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('low_income_hh', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Is Low Income House',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_building_field" id="lic-status" style="display: none">
        {!! Form::label('lic_status', 'Located In LIC ', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('lic_status', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Located In LIC ?',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="lic_id" >
        {!! Form::label('lic_id', 'LIC Name', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('lic_id', $licNames, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'LIC Name',
            ]) !!}
        </div>
    </div>

    <h3 class="mt-3 main_drinking_water" style="display: none"> Water Source Information </h3>

    <!-- Water Source Information & Water Supply Customer ID -->
    <div id="water-id" style="display: none;" class="form-group row required main_drinking_water">
        {!! Form::label('water_source_id', 'Main Drinking Water Source', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
             {!! Form::select('water_source_id', $water_source, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Main Drinking Water Source',
            ]) !!}
        </div>
    </div>
    <div id="water-customer-id" style="display: none;" class="form-group row water_municipal">
            {!! Form::label('water_customer_id', 'Water Supply Customer ID', ['class' => 'col-sm-3 control-label ']) !!}
            <div class="col-sm-5">
                {!! Form::text('water_customer_id', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Water Supply Customer ID',
                    'autocomplete' => 'off',
                ]) !!}
            </div>
    </div>
    <div class="form-group row required water_municipal" id = "water-pipe-id" style="display: none;">
        {!! Form::label('watersupply_pipe_code', 'Water Supply Pipe Line Code', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('watersupply_pipe_code', $waterSupply, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Water Supply Pipe Line Code',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_drinking_water" id="well-presence" style="display: none;">
        {!! Form::label('well_presence_status', 'Well in Premises', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('well_presence_status', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Well in Premises',
            ]) !!}
        </div>
    </div>
    <div class="form-group row" id="distance-from-well" style="display: none;">
        {!! Form::label('distance_from_well', ' Distance of Well from Closest Containment (m)', [
            'class' => 'col-sm-3 control-label',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::number('distance_from_well', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Distance of Well from Closest Containment (m)',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>
    
    <h3 class="mt-3 main_swm" style="display: none"> Solid Waste Management Information </h3>

    <div class="form-group row main_swm" style="display: none" id="swm-service">
        {!! Form::label('swm_service', 'Do you have a solid waste collection service', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('swm_service', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Do you have a solid waste collection service',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_swm_id" style="display: none">
        {!! Form::label('swm_provider', 'Solid Waste Service Provider', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('swm_provider', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Solid Waste Service Provider',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row main_swm_id" style="display: none">
        {!! Form::label('swm_customer_id', 'SWM Customer ID', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('swm_customer_id', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'SWM Customer ID',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <h3 class="mt-3 toilet_status" style="display: none">Sanitation System Information </h3>

    <div class="form-group row required toilet_status" style="display: none">
        {!! Form::label('toilet_status', 'Presence of Toilet', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('toilet_status', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Presence of Toilet',
                'id' => 'toilet-status', // Ensure the id matches the JavaScript selector
            ]) !!}
        </div>
    </div>

    
      <div class="form-group row required" id="toilet-info" style="display: none">
        {!! Form::label('toilet_count', 'Number of Toilets', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::number('toilet_count', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Number of Toilets',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div>

    <div class="form-group row required private_toilet" style="display: none" id="number-households-private">
        {!! Form::label('number_households_private', 'Number of Households with Private', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('number_households_private', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Number of Households with Private',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required private_toilet" style="display: none" id="number-households-private-toilet">
        {!! Form::label('number_households_private_toilet', 'Number of Households with Private Toilet', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::number('number_households_private_toilet', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Number of Households with Private Toilet',
                'autocomplete' => 'off',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="toilet-connection" style="display: none">
        {!! Form::label('sanitation_system_id', 'Toilet Connection', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('sanitation_system_id', $toiletConnection, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Toilet Connection',
            ]) !!}
        </div>
    </div>  

     <div class="form-group row required" id="containment-id" >
        {!! Form::label('build_contain', 'BIN of Pre-Connected Building', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('build_contain', $bin, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'BIN of Pre-Connected Building',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id="defecation-place" style="display: none">
        {!! Form::label('defecation_place', 'Defecation Place', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::select('defecation_place', $defecationPlace, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Defecation Place',
            ]) !!}
        </div>
    </div>

    <div id="ctpt-toilet" style="display:none;">
        <div class="form-group row required">
            {!! Form::label('ctpt_name', 'Community Toilet Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('ctpt_name', $capitalizedctpt, null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Community Toilet Name',
                ]) !!}
            </div>
        </div>
    </div>

    {{-- only show when sanitation system technology is communal --}}
    
    {{-- show these option when toilet presence is yes  --}}
  


    {{-- <div class="form-group row" id="shared-toilet-popn" style="display:none" style="margin-left:2px">
        {!! Form::label('population_with_private_toilet', 'Population with Private Toilet', [
            'class' => 'col-sm-3 control-label ',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::number('population_with_private_toilet', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Population with Private Toilet',
                'autocomplete' => 'off',
                'oninput' => "this.value = this.value < 0 ? '' : this.value",
            ]) !!}
        </div>
    </div> --}}

    



    <!-- Hide containment ID if containment data is being edited -->
    

    <div class="form-group row" style="display:none;" id="vacutug-accessible">
        {!! Form::label('desludging_vehicle_accessible', 'Building Accessible to Desludging Vehicle', [
            'class' => 'col-sm-3 control-label ',
        ]) !!}
        <div class="col-sm-5">
            {!! Form::select('desludging_vehicle_accessible',  [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Building Accessible to Desludging Vehicle',
            ]) !!}
        </div>
    </div>



    @if (empty($building))
        <!-- Containment information tab -->
        @include('fsm.containments.partial-form')
    @endif
    <!--  show if toilet connection is Sewer Network -->
    <div class="form-group row required" id="sewer-code" style="display:none">
        {!! Form::label('sewer_code', 'Sewer Code', ['class' => 'col-sm-3 control-label  ']) !!}
        <div class="col-sm-5">
            {!! Form::select('sewer_code', $sewer_code, null, [
                'class' => 'form-control col-sm-10 sewer_code',
                'placeholder' => 'Sewer Code',
            ]) !!}
        </div>
    </div>

    <!--  show if toilet connection is Drain Network -->
    <div class="form-group row required" style="display:none" id="drain-code">
        {!! Form::label('drain_code', 'Drain Code', ['class' => 'col-sm-3 control-label  ']) !!}
        <div class="col-sm-5">
            {!! Form::select('drain_code', $drain_code, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Drain Code',
            ]) !!}
        </div>
    </div>


    @if (empty($building))
        <div class="form-group row required" style="display: none">
        @else
            <div class="form-group row ">
    @endif
    {!! Form::label('geom', 'Building Footprint (KML File)', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-5">
        <!-- if building approved, kml file is preloaded -->
        @if ($buildingSurvey)
            {!! Form::text('kml', $buildingSurvey->kml, [
                'class' => 'col-sm-10 control-label',
                'style' => 'overflow:hidden;color:grey !important',
                'readonly' => 'readonly',
            ]) !!}
            {!! Form::text('kml', $buildingSurvey->kml, ['hidden' => 'true']) !!}
            {!! Form::text('survey_id', $buildingSurvey->id, ['hidden' => 'true']) !!}
        @else
            {!! Form::text('kml', null, ['hidden' => 'true']) !!}

            {!! Form::file('geom', null, ['class' => 'form-control col-sm-10', 'placeholder' => 'KML File']) !!}
            <small class="form-text" id="fileSizeHintKML">(KML File size should not be more than 1MB)</small>
                
        @endif

    </div>
</div>
<div class="form-group row" style="display: none" id="house-image">
    {!! Form::label('house_image', 'House Image', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::file('house_image', null, [ 'class' => 'form-control col-sm-10']) !!}
        <small class="form-text" id="fileSizeHintImg">(Image (JPG,JPEG) size should not be more than 5MB)</small>
    </div>
</div>
</div><!-- /.card-body -->

<div class="card-footer">
    <a href="{{ action('BuildingInfo\BuildingController@index') }}" class="btn btn-info">Back to List</a>
    {!! Form::submit('Save', [
        'class' => 'btn btn-info prevent-multiple-submits',
        'id' => 'prevent-multiple-submits',
    ]) !!}
</div><!-- /.card-footer -->
@if (!empty($building))
    <div class="card">
        <h2 class="ml-4 mt-3"> Containment Information </h2>
        <div class="card-header">
            <a href="{{ action('Fsm\ContainmentController@createContainment', [$building->bin]) }}"
                class="btn btn-info">Add Containment to Building</a>
        </div>
        <div class="card-body">
            @include('fsm.containments.list-containments')
        </div>
    </div>
@endif
<!-- Last Modified Date: 011-04-2024
Developed By: Innovative Solution Pvt. Ltd. (ISPL)   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('.road_code').on('change', function() {
            var selectedRoadCode = $(this).find('option:selected').text();
            var codePart = selectedRoadCode.split(" - ")[0];
            if (codePart) {
                $.ajax({
                    url: '{{ route('buildings.check-house') }}',
                    type: 'GET',
                    data: {
                        road_code: codePart
                    },
                    success: function(response) {
                        var houseNumberSuffix = (response.count + 1).toString().padStart(4, '0');
                        var newHouseNumberValue = codePart + ' - ' + houseNumberSuffix;
                        $('input[name="house_number"]').val(newHouseNumberValue);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            }
        });
    });
</script> --}}
