@extends('layout')
@section('content')
<div class="bbc-content-area mcw">
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-1">
                <h3 class="text-uppercase color-bbc">QR Order</h3>
                <form action="{{ url('/supplier-controller/submit-qr/') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="col-sm-11 padding-left-0">
                    <div class="table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>PR ID</th>
                                <th>Item Code</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Comments</th>
                                <th>Upload Files</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qr_inv as $qinv)
                            <tr>
                                <td>{{ $qinv->qr_id }}</td>
                                <td>@foreach($qinv->qr_tab as $qrt) {{ $qrt->item_no}}@endforeach</td>
                                <td>@foreach($qinv->qr_tab as $qrt) {{ $qrt->quantity}}@endforeach</td>
                                <td> <input type="text" name="unit_price" class="form-control from-btn-supplier from-qr"> </td>
                                <td><input type="text" name="comment" class="form-control from-qr from-supplier"> </td>
                                <td>
                                    <div class="file btn btn-sm btn-primary btn-supplier">
                                        <div class="upload-icon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div><span>Upload</span>
                                        <input type="file" class="input-upload" name="file">
                                    </div>
                                </td>
                                <td><button type="submit" class="btn btn-primary btn-supplier input-upload">Submit</button></td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection