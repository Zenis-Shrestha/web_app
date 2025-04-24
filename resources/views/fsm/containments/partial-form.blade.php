<!-- Containment ID -->

<div id="containment-info" style="display: none; margin:12px">
    <h2 class=""> Containment Information </h2>

    <div class="form-group row required" id='containment-type' style="display: none">
        {!! Form::label('type_id', 'Containment Type', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('type_id', $containment_type, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Containment Type',
            ]) !!}
        </div>
    </div>

    <div class="form-group row required" id='containment-type-pit' style="display: none">
        {!! Form::label('type_id', 'Containment Type', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('type_id', $containment_type_pit, null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Containment Type',
            ]) !!}
        </div>
    </div>

    <div class="form-group row"  style='display: none' id="septic-tank-chamber">
        {!! Form::label('septic_tank_chamber', 'Does Septic tank have at least 2 chambers, outlet at top, sealed/lined base, and walls', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('septic_tank_chamber', [true => 'Yes', false => 'No', null => "Don't know"], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Does Septic tank have at least 2 chambers, outlet at top, sealed/lined base, and walls',
            ]) !!}
        </div>
    </div>
    
     <div class="form-group row ">
        {!! Form::label('construction_date', ' Containment Construction Date', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::date('construction_date', null, [
                'class' => 'form-control col-sm-10',
                'autocomplete' => 'off',
                'placeholder' => 'Containment Construction Date',
                'max' => now()->format('Y-m-d'),
                'onclick' => 'this.showPicker();',
            ]) !!}
        </div>
    </div> 

    <div class="form-group row" id ='containment-drain-code' style="display:none">
        {!! Form::label('containment_drain_code', 'Drain Code', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('containment_drain_type', $drain_code, null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Drain Code',
                ]) !!}
            </div>
    </div>

    <div class="form-group row" id = 'containment-sewer-code' style="display:none">
        {!! Form::label('containment_sewer_code', 'Sewer Code', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('containment_sewer_code', $sewer_code, null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Sewer Code',
                ]) !!}
        </div>
    </div>
    

    <div class="form-group row" id="pit-shape" style="display:none">
        {!! Form::label('pit_shape', 'Pit Shape', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select(
                'pit_shape',
                [
                    'Cylindrical' => 'Cylindrical',
                    'Rectangular' => 'Rectangular'
                ],
                'Rectangular',
                ['class' => 'form-control col-sm-10', 'placeholder' => 'Pit Shape'],
            ) !!}
        </div>
    </div>
        <div class="form-group row pit_size" id="pit-size" style="display: none">
            {!! Form::label('pit_diameter', 'Pit Diameter (m)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('pit_diameter', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Pit Diameter (m)',
                   'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values

                ]) !!}
            </div>
        </div>
        <div class="form-group row pit_size" id="pit-depth" style="display: none">
            {!! Form::label('pit_depth', 'Pit Depth (m)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('pit_depth', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Pit Depth (m)',
                   'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values
                ]) !!}
            </div>
        </div>
    <div id="tank-size">
        <div class="form-group row tank_size" id ="tank-length" style="display: none">
            {!! Form::label('tank_length', 'Tank Length (m)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('tank_length', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Tank Length (m)',
                   'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values

                ]) !!}
            </div>
        </div>
        <div class="form-group row tank_size" id ="tank-width" style="display: none">
            {!! Form::label('tank_width', 'Tank Width (m)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('tank_width', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Tank Width (m)',
                   'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values
                ]) !!}
            </div>
        </div>
        <div class="form-group row tank_size" id ="tank-depth" style="display: none">
            {!! Form::label('depth', 'Tank Depth (m)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('depth', null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Tank Depth (m)',
                   'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values

                ]) !!}
            </div>
        </div>

        <div class="form-group row required" id="size">
        {!! Form::label('size', 'Containment Volume (m³)', ['class' => 'col-sm-3 control-label ']) !!}
        <div class="col-sm-5">
            {!! Form::text('size', null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Containment Volume (m³)(Enter Dimensions to auto calculate)',
               'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')", // Allow decimal values
              
            ]) !!}
        </div>
    </div>
    </div>
    
    <div class="form-group row">
        {!! Form::label('location', 'Containment Location', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select(
                'location',
                [
                    'Inside the house' => 'Inside the house',
                    'Outside the house' => 'Outside the house',
                ],
                null,
                ['class' => 'form-control col-sm-10', 'placeholder' => 'Containment Location'],
            ) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('containment_vehicle', 'Containment Accessible to Desludging Vehicle?', ['class' => 'col-sm-3 control-label'])  !!}
        <div class="col-sm-5">
            {!! Form::select('containment_vehicle', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Containment Accessible to Desludging Vehicle?',
            ]) !!}
        </div>
    </div>

    <div class="form-group row" id="septic-tank-pit">
        {!! Form::label('emptied_septic_pit_tank', 'Have you ever emptied your Septic Tank or Pit/Holding Tank', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('emptied_septic_pit_tank', [true => 'Yes', false => 'No'], null, [
                'class' => 'form-control col-sm-10',
                'placeholder' => 'Septic Tank/Pit Emptied?',
            ]) !!}
        </div>
    </div>

    <div class="form-group row" style="display: none" id="last-emptied-date">
        {!! Form::label('last_emptied_date', 'Last emptied Date', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::date('last_emptied_date', null, [
                'class' => 'form-control date col-sm-10',
                'autocomplete' => 'off',
                'max' => now()->format('Y-m-d'),
                'onclick' => 'this.showPicker();',
            ]) !!}
        </div>
    </div>

    <div id="septic-tank">
        <div class="form-group row">
            {!! Form::label('septic_criteria', 'Septic Tank Standard Compliance', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::select('septic_criteria', [true => 'Yes', false => 'No'], null, [
                    'class' => 'form-control col-sm-10',
                    'placeholder' => 'Septic Tank Standard Compliance',
                ]) !!}
            </div>
        </div>
    </div>
   




</div> <!-- containmend id -->