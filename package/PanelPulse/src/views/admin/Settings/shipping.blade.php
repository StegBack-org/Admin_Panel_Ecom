@extends('PanelPulse::admin.layout.header')
@section('title', 'Shipping | ' . env('APP_NAME'))
@section('style')
    <style>
        .admin-menu.settings {
            background-color: #eaeaea;
            border-left: 5px solid black;
            color: black;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-1">
                    <button class="btn btn-secondary" onclick="window.location.href='/admin/settings'"><i
                            class="fas fa-long-arrow-alt-left"></i></button>
                </div>
                <div class="col-md-5 p-0">
                    <table style="width:100%;height:100%">
                        <tr>
                            <td class="align-middle" style="width:100%;height:100%">
                                <h2 class="heading2">Shipping and delivery</h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 pt-3">
                    <h3 class="info-cont-heading mb-3">Shipping</h3>
                    <p class="subtext1">Choose where you ship and how much you charge for shipping at checkout.</p>
                </div>
                <div class="col-8">
                    @foreach ($payments->unique('country') as $payment)
                        <div class="container info-cont">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="info-cont-heading" style="margin-bottom:5px;">General Shipping rates</h3>
                                    <p>All products</p>
                                    <p class="info-cont-subheading" style="margin-bottom:5px;">Rates for</p>
                                    <p class="mb-0"><i class="fas fa-globe"
                                            style="margin-right:5px;"></i>{{ $payment->country }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="/admin/settings/shipping/{{ $payment->country_id }}">Manage rates</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptContent')
    <script>
        function deleteshipping(id) {
            $.ajax({
                url: '/admin/settings/shipping/delete',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        function updateshipping(id, state, name, cost, orderMinValue, orderMaxValue) {
            document.getElementById("validationCustom101").value = id;
            document.getElementById("validationCustom102").value = state;
            document.getElementById("validationCustom103").value = name;
            document.getElementById("validationCustom104").value = cost;
            document.getElementById("validationCustom105").value = orderMinValue;
            document.getElementById("validationCustom106").value = orderMaxValue;

            $('#shippingUpdateModal').modal('show');
        }

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
