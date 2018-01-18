@extends('layout')
@section('content')
<!-- content area-->
<div class="bbc-content-area mcw">
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-1">
                <h3 class="text-uppercase color-bbc">View Supplier List</h3>
                @if(session()->has('success-message'))
                    <p class="alert alert-success">
                        {{ session()->get('success-message') }}
                    </p>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif
                <div class="col-sm-10 padding-left-0">
                    <div class="table table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Category</th>
                                <th>Email Address</th>
                                <th>Contact</th>
                                <th>Edit/Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $res)
                            <tr>
                                <td id="name{{$res->id}}">{{$res->name}}</td>
                                @foreach($res->info as $in)<td id="category{{$in->user_id}}">{{ $in->category }}@endforeach</td>
                                <td id="email{{$res->id}}">{{$res->email}}</td>
                                @foreach($res->info as $in)<td id="contact{{$in->user_id}}">{{ $in->contact }}@endforeach</td>
                                <td><button rel="{{ $res->id }}" id="edit{{ $res->id }}" class="btn btn-info btn-view-table open-popup popup-left">Edit</button>
                                    <button rel="{{ $res->id }}" id="delete{{ $res->id }}" class="btn btn-info btn-view-table open-popup-delete">Delete</button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--=============
edit qr popup
==================-->
<div class="popup-wrapper-view">
    <div class="popup-base">
        <div class="search-popup">
            <i class="close fa fa-remove"></i>
            <div class="row">
                <div class="search-destination">
                    <h2 class="search-title">Edit Supplier</h2>
                </div>
                <!-- header got seach area -->
                <div class="popup-got-search">
                    <form action="{{ url('suppliers/editSuppliers') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group clearfix">
                            <label for="supplier-name" class="label-d">Supplier Name <span class="fright">:</span></label>
                            <input type="text" name="name" class="form-control from-qr" id="supplier-name" value="">
                        </div>
                        <div class="form-group clearfix">
                            <label for="sup-catagory" class="label-d">Category <span class="fright">:</span></label>
                            <input type="text" name="category" class="form-control from-qr" id="sup-catagory">
                        </div>
                        <div class="form-group clearfix">
                            <label for="sup-email" class="label-d">Email Address <span class="fright">:</span></label>
                            <input type="text" name="email" class="form-control from-qr" id="sup-email">
                        </div>
                        <div class="form-group clearfix">
                            <label for="sup-contact" class="label-d">Contact <span class="fright">:</span></label>
                            <input type="text" name="contact" class="form-control from-qr" id="sup-contact">
                        </div>
                        <div class="col-sm-12">
                            <div class="btn-button-group clearfix">
                                <button class="btn btn-info btn-price">Save</button>
                                <button class="btn btn-info">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div><!--// end header got search area -->
            </div>
        </div>
    </div>
</div><!-- Popup -->

<!--
delete popup
========================-->
<div class="popup-wrapper-delete">
    <div class="popup-base">
        <div class="search-popup">
            <i class="close fa fa-remove"></i>
            <div class="row">
                <div class="search-destination">
                    <h2 class="search-title">Delete Supplier</h2>
                </div>
                <form action="{{url('/suppliers/deleteSupplier/')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" id="delete_user_id">
                <!-- header got seach area -->
                <div class="popup-got-search">
                    <p>Confirm to delete the Supplier from the view Supplier list ?</p>
                </div><!--// end header got search area -->
                <div class="col-sm-12">
                    <div class="btn-button-group clearfix">
                        <button class="btn btn-info btn-price">Delete</button>
                        <button class="btn btn-info">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- Popup -->
@endsection