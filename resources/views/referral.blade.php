@extends('layouts.app')
@section('title')
    Referral
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mt-3">
                        <label for="referral">My Referral Link</label>
                        <input id="referral" type="text" class="form-control" value="{{route('register',['referral'=>Auth::user()->my_code])}}" disabled>

                    </div>
                    <div class="form-group text-center mt-3">
                        <button onclick="copyToClipboard('#referral')" type="button" class="btn btn-success btn-color" style="padding-left: 25px;padding-right: 25px;"><i class="fas fa-save mr-2"></i>Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Copy Successful'
            })
        }
    </script>
@endpush
