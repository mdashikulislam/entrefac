@extends('layouts.app')
@section('title')
    Donate
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    @if($user->account_status == 'Approved')
                    <h4>Donate for factory challenge</h4>
                    @elseif($user->account_status == 'Pending')
                        <h4 style="color: red">You account is not approve. please wait ... </h4>
                    @endif
                </div>
                @if($user->account_status == 'Approved')
                <div class="card-body">
                    <form id="paymentForm" action="" method="POST">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}" id="user_id">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <div class="input-group mb-3">
                                <input readonly value="{{$user->first_name}}" id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <div class="input-group mb-3">
                                <input readonly value="{{$user->last_name}}" id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <input readonly value="{{$user->email}}" id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-briefcase"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <div class="input-group mb-3">
                                <input required min="1" id="amount" name="amount" type="number" class="form-control @error('amount') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-check-alt"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 32px;">
                            <div class="input-group d-block">
                                <div class="text-center">
                                    <button class="btn btn-block btn-success btn-color">
                                        <i class="fa fa-money-bill-alt mr-2"></i>
                                        Pay
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_a51e799aec807a51a5f226fa888f13b98c32d442', // Replace with your public key
                email: $('#email').val(),
                currency: 'GHS',
                amount: ($('#amount').val()) * 100,
                ref: 'EF'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function(){
                    window.location ='{{route('donate')}}';
                },
                callback: function(response){
                    var userId = $('#user_id').val();
                    var amount = $('#amount').val();
                    var data = {
                        'user_id':  userId,
                        'amount':amount,
                        'reference':response.reference,
                        'first_name':$('#first_name').val(),
                        'last_name':$('#last_name').val(),
                        'email':$('#email').val(),
                        'status':response.status,
                        '_token':'{{csrf_token()}}'
                    };
                    if (response.status == 'success'){
                        $.ajax({
                            url:'{{route('payment')}}',
                            method:'POST',
                            data:data,
                            success:function (res){
                                if (res.status == true){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Great...',
                                        text: res.message
                                    })
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: res.message
                                    })
                                }
                            }
                        });
                    }
                }
            });
            handler.openIframe();
        }
    </script>
@endpush
