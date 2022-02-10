<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Edit Details " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Edit Details</h2>
                        <p><a href="{{url('')}}">Home</a> | Edit Details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="collapse_area coll2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="check mb-2">
                        <h2>Edit details </h2>
                    </div>
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <br>
                    <div class="faq-accordion">
                        <div class="panel-group pas7" id="accordion2" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title my-1">
                                        <a class="collapsed method" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Edit your account information <i class="fa fa-caret-down"></i></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" data-parent="#accordion2" aria-labelledby="headingOne" aria-expanded="false" >
                                    <div class="easy2">
                                        <h2>My Account Information</h2>
                                        <form class="form-horizontal" action="{{route('change.detail')}}" method="POST">
                                            @csrf
                                            <fieldset>
                                                <legend>Your Personal Details</legend>
                                                <br>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Your name</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" placeholder="Name" name="name" required value="{{Auth::user()->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">E-Mail address</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="email" placeholder="E-Mail address" name="email" readonly disabled value="{{Auth::user()->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Phone</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="tel" placeholder="Phone" minlength="10" name="phone" required value="{{Auth::user()->phone}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="buttons clearfix">
                                                <div class="pull-left">
                                                    <input class="btn btn-primary ce5" type="submit" value="Save changes">
                                                </div>
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if (is_null(Auth::user()->google_id))
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title my-1">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change your password   <i class="fa fa-caret-down"></i></a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" data-parent="#accordion2" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                    <div class="easy2">
                                        <h2>Change Password</h2>
                                        <form class="form-horizontal" action="{{route('change.password')}}" method="POST">
                                            @csrf
                                            <fieldset>
                                                <legend class="mb-3">Your Password</legend>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Current password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="password" name="current-password" placeholder="Current password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">New password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="password" id="password" minlength="6" name="password" placeholder="New password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="row">
                                                        <label class="col-md-2 control-label">Confirm password</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="password" minlength="6" id="password-confirm" name="password_confirmation" placeholder="Confirm password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="buttons clearfix">
                                                <div class="pull-left"><input class="btn btn-primary ce5" type="submit" value="Change password">
                                                </div>
                                                <div class="pull-right">
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>