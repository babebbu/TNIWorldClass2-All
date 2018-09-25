@extends('layouts.minimal')

@section('title')
	TNI World Class #2 :: Staff Registration
@endsection

@section('content')
	<div class="container" style="display: table-cell; vertical-align: middle;">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading text-center">Join TNIWorldClass!</div>
	                <div class="panel-body text-center">
						<a href="{{ url('/fb-redirect/staff') }}">
							<img src="{{ url('') }}/images/fb-login-button.png" width="240">
						</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection