<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Form</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('js/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('js/admin/plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{url('js/admin/plugins/animate-css/animate.css')}}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{url('css/admin/style.css')}}" rel="stylesheet">
</head>

<body>
@if(session('message'))
    <h2 class="m-t-10 m-b-10" style="text-align: center">{{session('message')}}</h2>
@endif
    <div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 m-t-50 center-block">
        <a href="/login" class="m-b-10 btn bg-indigo waves-effect">Login</a>
        <a href="/register" class="m-b-10 m-l-10 btn bg-indigo waves-effect">Register</a>
        <div class="card">
            <div class="header">
                <h2>
                    Candidate Form
                    <small>All fields are mandatory.</small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <form method="POST" action="candidate-submit"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="col-sm-12">
                                <div class="form-group form-float">

                                    <h2 class="card-inside-title">Name</h2>
                                    <div class="form-line">
                                        <input name="name" type="text" class="form-control" name="name"
                                               value="{{old('name')}}">
                                    </div>
                                    @if($errors->first('name'))
                                        <label class="error" for="name">
                                            {{$errors->first('name')}}
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group form-float">

                                    <h2 class="card-inside-title">Email</h2>
                                    <div class="form-line">
                                        <input name="email" type="email" class="form-control"
                                               value="{{old('email')}}">
                                    </div>
                                    @if($errors->first('email'))
                                        <label class="error" for="email">
                                            {{$errors->first('email')}}
                                        </label>
                                    @endif
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h2 class="card-inside-title">Website Link</h2>
                                    <div class="form-line">
                                        <textarea name="url" rows="2"
                                                  class="form-control no-resize">{{old('url')}}</textarea>
                                    </div>
                                    @if($errors->first('url'))
                                        <label class="error" for="url">
                                            {{$errors->first('url')}}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h2 class="card-inside-title">Cover Letter</h2>
                                    <div class="form-line">
                                        <textarea name="cover_letter" rows="7"
                                                  class="form-control resize">{{old('cover_letter')}}</textarea>
                                    </div>
                                    @if($errors->first('cover_letter'))
                                        <label class="error" for="cover_letter">
                                            {{$errors->first('cover_letter')}}
                                        </label>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-12">

                                <div class="form-group form-float">

                                    <h2 class="card-inside-title">Attachment (Resume/CV)</h2>
                                    <div>( PDF | Max. Size : 5 MB )</div>
                                    <div class="form-line">
                                        <input name="attachment" type="file" class="form-control">
                                    </div>
                                    @if($errors->first('attachment'))
                                        <label class="error" for="attachment">
                                            {{$errors->first('attachment')}}
                                        </label>
                                    @endif
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h2 class="card-inside-title">Do you like working?</h2>
                                    <input name="like_working" type="radio" id="radio_1" class="with-gap radio-col-red"
                                    value="1" {{old('like_working')?'checked':''}} />
                                    <label for="radio_1">Yes</label>
                                    <input name="like_working" type="radio" id="radio_2" class="with-gap radio-col-pink"
                                    value="0"  {{old('like_working')?'':'checked'}} />
                                    <label for="radio_2">No</label>

                                @if($errors->first('like_working'))
                                        <label class="error" for="like_working">
                                            {{$errors->first('like_working')}}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-5 col-xs-12">
                                <div class="form-group form-float">

                                    <h2 class="card-inside-title">Captcha</h2>
                                    {!! captcha_img() !!}
                                    <div class="form-line">
                                        <input name="captcha" type="text" class="form-control" name="captcha">
                                    </div>
                                    @if($errors->first('captcha'))
                                        <label class="error" for="captcha">
                                            {{$errors->first('captcha')}}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="clearfix"></div>


                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            <button class="btn btn-primary waves-effect" type="reset">RESET</button>


                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{url('js/admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{url('js/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{url('js/admin/plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{url('js/admin/plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{url('js/admin/admin.js')}}"></script>
<script src="{{url('js/admin/pages/examples/sign-in.js')}}"></script>

</body>

</html>