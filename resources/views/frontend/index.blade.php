@extends('frontend.master_dashboard')

@section('main')


<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">

            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th scope="col"></th>
                            <th scope="col">Email</th>
                            <th scope="col" colspan="2">Department Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($members)
                            @foreach($members as $key=>$member)
                            <tr class="pt-30">
                                <td class="product-des product-name">
                                    <h6>{{$key+1}}</h6>
                                </td>
                                <td class="product-des product-name">
                                    <h6>{{$member->email}}</h6>
                                </td>
                                <td class="product-des product-name">
                                    <h6>{{$member->departmentName}}</h6>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection