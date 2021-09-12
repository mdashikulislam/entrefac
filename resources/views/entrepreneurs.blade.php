@extends('layouts.app')
@section('title')
    Entrepreneurs
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Trading Name</th>
                    <th>StaffP Size</th>
                    <th>Industry</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entrepreneurs as $entrepreneur)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{@$entrepreneur->trading_name}}</td>
                        <td>{{@$entrepreneur->stuff_size}}</td>
                        <td>{{@$entrepreneur->industry}}</td>
                        <td>{{@$entrepreneur->created_at ? \Carbon\Carbon::parse(@$entrepreneur->created_at)->isoFormat('h:s A') :''}}</td>
                        <td>{{@$entrepreneur->created_at ? \Carbon\Carbon::parse(@$entrepreneur->created_at)->isoFormat('Do, MMM YYYY') :''}}</td>
                        <td><a href="" class="btn btn btn-color text-white">Profile</a></td>
                        <td>
                            @if(@$entrepreneur->users->account_status == 'Pending')
                                <a href="{{route('account.status.change',['id'=>@$entrepreneur->user_id ? :0,'status'=>1])}}" class="btn btn-success custom-btn-green">Verify</a>
                            @elseif(@$entrepreneur->users->account_status == 'Approved')
                                <a href="{{route('account.status.change',['id'=>@$entrepreneur->user_id ? :0,'status'=>0])}}" class="btn btn-danger custom-btn-danger">Un Verify</a>
                            @endif
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endpush
