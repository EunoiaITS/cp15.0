@extends('layout')
@section('content')
<!-- content area-->
<div class="bbc-content-area mcw">
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-1">
                <div class="col-sm-8 col-sm-offset-1 padding-left-0">
                    <div class="create-qr profile-btn clearfix">
                        <h3 class="text-uppercase color-bbc">Supplier Profile</h3>
                        <form action="{{ url('profile/edit') }}">
                            <div class="form-group clearfix">
                                <label for="supplier-name" class="label-d">Supplier Name <span class="fright">:</span></label>
                                <input name="name" type="text" class="form-control from-qr" id="supplier-name" required="required">
                            </div>
                            <div class="form-group clearfix">
                                <label for="email-address" class="label-d">Email Address <span class="fright">:</span></label>
                                <input name="email" type="email" class="form-control from-qr" id="email-address" required="required">
                            </div>
                            <div class="form-group clearfix">
                                <label for="contact" class="label-d">Contact Number <span class="fright">:</span></label>
                                <input name="contact" type="text" class="form-control from-qr" id="contact" required="required">
                            </div>
                            <div class="col-sm-12">
                                <div class="btn-button-group btn-group-profile clearfix">
                                    <button class="btn btn-info btn-price open-popup-comp">Save</button>
                                    <button class="btn btn-info btn-price approve open-popup">Change Password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=============
    Change Password
    ==================-->
<div class="popup-wrapper-view">
    <div class="popup-base">
        <div class="search-popup">
            <i class="close fa fa-remove"></i>
            <div class="row">
                <div class="search-destination">
                    <h2 class="search-title">Change Password</h2>
                </div>
                <!-- header got seach area -->
                <div class="popup-got-search">
                    <form action="#">
                        <div class="form-group clearfix">
                            <label for="old-pass" class="label-d">Old Password<span class="fright">:</span></label>
                            <input type="password" class="form-control from-qr" id="old-pass" required="required">
                        </div>
                        <div class="form-group clearfix">
                            <label for="new-pass" class="label-d">New Password<span class="fright">:</span></label>
                            <input type="password" class="form-control from-qr" id="new-pass" required="required">
                        </div>
                        <div class="form-group clearfix">
                            <label for="retype-pass" class="label-d">Re-type Password <span class="fright">:</span></label>
                            <input type="password" class="form-control from-qr" id="retype-pass" required="required">
                        </div>
                        <div class="col-sm-12">
                            <div class="btn-button-group clearfix">
                                <button class="btn btn-info btn-price open-popup-comp">Save</button>
                                <button class="btn btn-info btn-popup close">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div><!--// end header got search area -->
            </div>
        </div>
    </div>
</div><!-- Popup -->

    @endsection