@extends('layout')
@section('content')
    <!-- content area-->
    <div class="bbc-content-area mcw">
        <div class="container">
            <div class="row">
                <form action="{{ url('/allow-price-show') }}" method="post">
                    {{csrf_field()}}
                <div class="col-sm-11 col-sm-offset-1">
                    <h3 class="text-uppercase color-bbc">Price View Approval</h3>
                    @if(session()->has('success-message'))
                        <p class="alert alert-success">
                            {{ session()->get('success-message') }}
                        </p>
                    @endif
                    <div class="col-sm-10 padding-left-0">
                        <div class="table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>PR ID</th>
                                    <th>Manager</th>
                                    <th>Executive</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supqr as $prid)
                                    @foreach($prid->item as $pr)
                                <tr>
                                    <td>{{$pr->pr_id}}<input type="hidden" name="pr_id" value=""></td>
                                    <td><label><input name="approval" type="checkbox" value="yes"></label></td>
                                    <td><label><input name="approval" type="checkbox" value="yes"></label></td>
                                </tr>
                                        @endforeach
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="btn-button-group clearfix">
                            <button type="submit" class="btn btn-info btn-price">Approve</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection