@extends('layouts.app')
@section('title')
    Setting
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('add.admin')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <div class="input-group mb-3">
                                <input value="{{old('first_name')}}" id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <div class="input-group mb-3">
                                <input value="{{old('last_name')}}" id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group mb-3">
                                <input id="email" value="{{old('email')}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <div class="input-group mb-3">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div class="input-group mb-3">
                                <input id="password-confirm" name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 32px;">
                            <div class="input-group d-block">
                                <div class="text-center">
                                    <button class="btn btn-block btn-success btn-color">
                                        <i class="fas fa-save mr-2"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Admin List</h4>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$loop->index +1 }}</td>
                                <td>{{$user->first_name.' '.$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if(Auth::id() != $user->id)
                                        <a  href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger btn-sm d-inline-block delete-user">
                                            <i class="fa fa-trash"></i>
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
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
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
    </script>
@endpush
