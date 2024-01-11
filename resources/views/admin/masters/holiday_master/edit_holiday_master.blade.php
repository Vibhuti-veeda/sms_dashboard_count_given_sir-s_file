@extends('layouts.admin')
@section('title','Edit Holiday Master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Holiday Master</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.holidayMasterList') }}">Holiday Master List</a></li>
                            <li class="breadcrumb-item active">Add Holiday Master</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>     

        <form class="custom-validation" action="{{ route('admin.updateHolidayMaster') }}" method="post" id="addHolidayMaster" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                            </div>
                            <input type="hidden" name="id" id="id" value="{{$holiday->id}}">

                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label>Holiday year<span class="mandatory">*</span></label>
                                    <select id="holiday_year" class="form-select" name="holiday_year"  >
                                        {{ $last= date('Y')+10}}
                                        {{ $now = date('Y') }}
                                        <option value="{{$holiday->holiday_year}}">{{$holiday->holiday_year }}</option>
                                        @for($i = $now; $i <= $last; $i++)
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Holiday Name<span class="mandatory">*</span></label>
                                <input type="text" class="form-control"  value="{{ $holiday->holiday_name }}" name="holiday_name" placeholder="Holiday Name" autocomplete="off" required/>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Holiday Type<span class="mandatory">*</span></label>
                                <select id="holiday_type" required="" name="holiday_type" class="form-select" >
                                    <option @if($holiday->holiday_type == 'HOLIDAY') selected @endif value="HOLIDAY">
                                        Holiday
                                    </option>
                                    <option @if($holiday->holiday_type == 'WEEKOFF') selected @endif value="WEEKOFF">
                                        Week Off
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Holiday date<span class="mandatory">*</span></label>
                                <input type="text" class="form-control selectHolidayDate"  value="{{ date('d/m/Y', strtotime($holiday->holiday_date)) }}"  name="holiday_date" placeholder="dd/mm/yyyy" data-date-autoclose="true" data-date-format="dd/mm/yyyy" autocomplete="off" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Remark</label>
                                <input type="text"  value="{{$holiday->remarks}}" class="form-control" name="remarks" placeholder="Remark" autocomplete="off"/>
                            </div>

                            <div class="button-items">
                                <center>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="btn_submit" value="save">
                                        Update
                                    </button>
                                   
                                    <a href="{{ route('admin.holidayMasterList') }}" class="btn btn-danger waves-effect">
                                        Cancel
                                    </a>
                                </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
