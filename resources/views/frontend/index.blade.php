@extends('frontend.master_dashboard')

@section('main')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Departments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 48.825px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111.65px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 105.588px;">Department Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($members) && !empty($members))
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
        </div>
    </div>
</div>
@endsection