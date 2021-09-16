@extends('layouts.app')
@section('title')
    Donor
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Payments List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Reference Id </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Payment Status </th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donors as $donor)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$donor->reference_id}}</td>
                        <td>{{$donor->name}}</td>
                        <td>{{$donor->email}}</td>
                        <td>{{$donor->amount}}</td>
                        <td>{{$donor->status}}</td>
                        <td>{{\Carbon\Carbon::parse($donor->created_at)->isoFormat('hh:ss A')}}</td>
                        <td>{{\Carbon\Carbon::parse($donor->created_at)->isoFormat('Do, MMM YYYY')}}</td>
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
