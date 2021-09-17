@extends('layouts.app')
@section('title')
    Users
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
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Country</th>
                    <th>Business name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payment Status</th>
                    <th>Account Status</th>
                    <th>Referral</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{@getCountryNameByCode($user->country)}}</td>
                            <td>{{$user->business_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->payment_status}}</td>
                            <td>{{$user->account_status}}</td>
                            <td>{{@$user->referral_code}}</td>
                            <td>
                                <a  href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger btn-sm d-inline-block delete-user">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-sm d-inline-block">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($user->status == 'Suspend')
                                    <form class="d-none" id="status-{{$user->id}}" action="{{route('user.status')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="hidden" name="status" value="Active">
                                    </form>
                                    <button data-toggle="tooltip" data-placement="top" title="Active" onclick="statusChange('{{$user->id}}')" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                @else
                                    <form class="d-none" id="status-{{$user->id}}" action="{{route('user.status')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="hidden" name="status" value="Suspend">
                                    </form>
                                    <button data-toggle="tooltip" data-placement="top" title="Suspend"  onclick="statusChange('{{$user->id}}')" type="button"  class="btn btn-warning text-white btn-sm">
                                        <i class="fa fa-eye-slash"></i>
                                    </button>
                                @endif
                                <a data-toggle="tooltip" data-placement="top" title="Password reset" href="{{route('user.reset.password',['id'=>$user->id])}}" class="btn btn-info btn-sm d-inline-block">
                                    <i class="fa fa-key"></i>
                                </a>
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
    <style>
       table th, table td { text-align: center; }
    </style>
@endpush
@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $('#example2').removeAttr('width').DataTable({
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            columnDefs: [
                { width: 130, targets: -1 },
                { width: 75, targets:  1},
                { width: 75, targets:  2},
                { width: 105, targets:  4},
                { width: 120, targets:  7},
                { width: 110, targets:  8},
            ],
            fixedColumns: true
        });
        $(document).ready(function (){
            $(document).on('click','.delete-user',function (){
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $(this).attr('href');
                    }
                })
            })

        })
        function statusChange(id){
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change the status!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#status-'+id).submit();
                }
            })
        }
    </script>
@endpush
