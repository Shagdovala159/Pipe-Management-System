@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">View Reports</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('report/add/page') }}">Report</a></li>
                            <li class="breadcrumb-item active">View Reports</li>
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
                        <form action="{{ route('report/updateview') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $reportView->id }}" readonly>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">View Report
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Category <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('category') is-invalid @enderror" name="category" disabled>
                                            <option selected disabled>Category</option>
                                            <option value="Pasokan" {{ $reportView->category == 'Pasokan' ? "selected" :"Pasokan"}}>Pasokan</option>
                                            <option value="Pipa 20 mm" {{ $reportView->category == 'Pipa 20 mm' ? "selected" :"Pipa 20 mm"}}>Pipa 20 mm</option>
                                            <option value="Pipa 63 mm" {{ $reportView->category == 'Pipa 63 mm' ? "selected" :"Pipa 63 mm"}}>Pipa 63 mm</option>
                                            <option value="Tiang MGRT" {{ $reportView->category == 'Tiang MGRT' ? "selected" :"Tiang MGRT"}}>Tiang MGRT</option>
                                            <option value="Fasilitas" {{ $reportView->category == 'Fasilitas' ? "selected" :"Fasilitas"}}>Fasilitas</option>
                                            <option value="Proses Safety" {{ $reportView->category == 'Proses Safety' ? "selected" :"Proses Safety"}}>Proses Safety</option>
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
                                        <input class="form-control datetimepicker @error('when') is-invalid @enderror" name="when" type="text" placeholder="DD-MM-YYYY" value="{{ $reportView->when }}" disabled>
                                        @error('when')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Area<span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('where') is-invalid @enderror" name="where" disabled>
                                            <option selected disabled>Area</option>
                                            <option value="Batam" {{ $reportView->where == 'Batam' ? "selected" :"Batam"}}>Batam</option>
                                            <option value="Medan" {{ $reportView->where == 'Medan' ? "selected" :"Medan"}}>Medan</option>
                                            <option value="Lampung" {{ $reportView->where == 'Lampung' ? "selected" :"Lampung"}}>Lampung</option>
                                            <option value="Pekanbaru" {{ $reportView->where == 'Pekanbaru' ? "selected" :"Pekanbaru"}}>Pekanbaru</option>
                                            <option value="Palembang" {{ $reportView->where == 'Palembang' ? "selected" :"Palembang"}}>Palembang</option>
                                            <option value="Dumai" {{ $reportView->where == 'Dumai' ? "selected" :"Dumai"}}>Dumai</option>
                                        </select>
                                        @error('where')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Where<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('specific_where') is-invalid @enderror" name="specific_where" placeholder="Where..." value="{{ $reportView->specific_where }}" disabled>
                                        @error('specific_where')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Who<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('who') is-invalid @enderror" name="who" placeholder="Who..." value="{{ $reportView->who }}" disabled>
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
                                        <input type="text" class="form-control @error('what') is-invalid @enderror" name="what" placeholder="What..." value="{{ $reportView->what }}" disabled>
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
                                        <textarea class="form-control @error('why') is-invalid @enderror" name="why" placeholder="Why..." disabled>{{ $reportView->why }}</textarea>
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
                                        <textarea class="form-control @error('how') is-invalid @enderror" name="how" placeholder="How..." disabled>{{ $reportView->how }}</textarea>
                                        @error('how')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Display previously uploaded images -->
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Previously Uploaded Images</label>
                                        @foreach ($images as $image)
                                        <img src="{{ asset('uploads/' . $image->path) }}" alt="Image" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Status <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('status') is-invalid @enderror" name="status" @if (Session::get('role_name')==='Tim Onsite' )disabled @endif>
                                            <option selected disabled>Status</option>
                                            <option value="Open" {{ $reportView->status == 'Open' ? "selected" :"Open"}}>Open</option>
                                            <option value="Approved" {{ $reportView->status == 'Approved' ? "selected" :"Approved"}}>Approved</option>
                                            <option value="Revisied" {{ $reportView->status == 'Revisied' ? "selected" :"Revisied"}}>Revisied</option>
                                            <option value="Declined" {{ $reportView->status == 'Declined' ? "selected" :"Declined"}}>Declined</option>
                                        </select>
                                        @error('status')
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