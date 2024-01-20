@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Reports</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('report/add/page') }}">Report</a></li>
                            <li class="breadcrumb-item active">Edit Reports</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('report/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $reportEdit->id }}" readonly>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Edit Report
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Category <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('category') is-invalid @enderror" name="category">
                                            <option selected disabled>Category</option>
                                            <option value="Pasokan" {{ $reportEdit->category == 'Pasokan' ? "selected" :"Pasokan"}}>Pasokan</option>
                                            <option value="Pipa 20 mm" {{ $reportEdit->category == 'Pipa 20 mm' ? "selected" :"Pipa 20 mm"}}>Pipa 20 mm</option>
                                            <option value="Pipa 63 mm" {{ $reportEdit->category == 'Pipa 63 mm' ? "selected" :"Pipa 63 mm"}}>Pipa 63 mm</option>
                                            <option value="Tiang MGRT" {{ $reportEdit->category == 'Tiang MGRT' ? "selected" :"Tiang MGRT"}}>Tiang MGRT</option>
                                            <option value="Fasilitas" {{ $reportEdit->category == 'Fasilitas' ? "selected" :"Fasilitas"}}>Fasilitas</option>
                                            <option value="Proses Safety" {{ $reportEdit->category == 'Proses Safety' ? "selected" :"Proses Safety"}}>Proses Safety</option>
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>When<span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker @error('when') is-invalid @enderror" name="when" type="text" placeholder="DD-MM-YYYY" value="{{ $reportEdit->when }} ">
                                        @error('when')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Where<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('where') is-invalid @enderror" name="where" placeholder="Where..." value="{{ $reportEdit->where }} ">
                                        @error('where')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Who<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('who') is-invalid @enderror" name="who" placeholder="Who..." value="{{ $reportEdit->who }}">
                                        @error('who')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>What<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('what') is-invalid @enderror" name="what" placeholder="What..." value="{{ $reportEdit->what }}">
                                        @error('what')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Why<span class="login-danger">*</span></label>
                                        <textarea class="form-control @error('why') is-invalid @enderror" name="why" placeholder="Why...">{{ $reportEdit->why }}</textarea>
                                        @error('why')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>How<span class="login-danger">*</span></label>
                                        <textarea class="form-control @error('how') is-invalid @enderror" name="how" placeholder="How...">{{ $reportEdit->how }}</textarea>
                                        @error('how')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="/report/list" class="btn btn-secondary min-width: 160px">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection