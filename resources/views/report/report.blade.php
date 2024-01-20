
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Reports</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('report/list') }}">Report</a></li>
                                <li class="breadcrumb-item active">All Reports</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- <div class="report-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Phone ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-report-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Reports</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <!-- <a href="{{ route('report/list') }}" class="btn btn-outline-gray me-2 active">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('report/grid') }}" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> -->
                                        <a href="{{ route('report/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"> New Reports</i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-report table-hover table-center mb-0 datatable table-striped">
                                    <thead class="report-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Reporter</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportList as $key=>$list )
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->reporter }}</td>
                                            <td>{{ date('l, d-m-Y', strtotime($list->when)) }}</td>
                                            <td>{{ $list->reporter }}</td>
                                            <td>{{ $list->category}}</td>
                                            @if ($list->status === 'Open')
                                            <td><span class="badge badge-soft-secondary">{{ $list->status }}</span></td>
                                            @endif
                                            @if ($list->status === 'Approved')
                                            <td><span class="badge badge-soft-success">{{ $list->status }}</span></td>
                                            @endif
                                            @if ($list->status === 'Revisied')
                                            <td><span class="badge badge-soft-warning">{{ $list->status }}</span></td>
                                            @endif
                                            @if ($list->status === 'Declined')
                                            <td><span class="badge badge-soft-danger">{{ $list->status }}</span></td>
                                            @endif
                                            <td>
                                                <div class="actions">
                                                    <a href="{{ url('report/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light report_delete" data-bs-toggle="modal" data-bs-target="#reportUser">
                                                        <i class="fas fa-trash-alt me-1"></i>
                                                    </a>
                                                    <a href="{{ url('report/view/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-regular fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- model report delete --}}
    <div class="modal fade contentmodal" id="reportUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                    class="fas fa-times me-1"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report/delete') }}" method="POST">
                        @csrf
                        <div class="delete-wrap text-center">
                            <div class="del-icon">
                                <i class="fas fa-trash-alt me-1"></i>
                            </div>
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="avatar" class="e_avatar" value="">
                            <h2>Sure you want to delete</h2>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success me-2">Yes</button>
                                <a class="btn btn-danger" data-bs-dismiss="modal">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')

    {{-- delete js --}}
    <script>
        $(document).on('click','.report_delete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
    @endsection

@endsection
