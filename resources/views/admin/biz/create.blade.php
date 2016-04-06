@extends('admin.adminlayout')
@section('title', 'Admin Add New Business')
@section('stylesheets')
    <link href="{{ asset('../plugins/dropzone/dropzone.css')}}" rel="stylesheet">
    <link href="{{ asset('../plugins/dropzone/basic.css')}}" rel="stylesheet">
@endsection
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Add New Business</h2>
    </div> <!-- END .header-search-bar -->
@endsection
@section('main-content')
    <div class="col-xs-12 col-sm-9">
        <p class="visible-xs">
            <button type="button" class="btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                Click to view Admin Menu <i class="glyphicon glyphicon-chevron-right"></i></button>
        </p>
        <div class="row">
            <div class="col-md-12">
                <div class="row page-title-row">
                    <div class="col-md-12">
                        <h3><a href="/admin">Admin</a> » <a href="/admin/biz">Businesses</a> » <small> Add New Business</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    <form class="form-horizontal" role="form" method="POST"  action="/admin/biz">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Name</label>
                            <div class="col-md-8">
                                <input required type="text" id="name" name="name" class="form-control" placeholder="Patt's Bar" value="{{ old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Address</label>
                            <div class="col-md-8">
                                <input required type="text" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street" value="{{ old('address')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business state</label>
                            <div class="col-md-8">
                                {!!Form::select('state', $stateList, Input::old('state'), ['class'=>'form-control','id'=>'stateList',
                               'placeholder'=>'select state']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Business Region/area</label>
                            <div class="col-md-8">
                                <select id="lga" name="lga" value="{{ old('lga')}}" class="form-control"> </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Category</label>
                            <div class="col-md-8">
                                {!!Form::select('cats[]', $catList,Input::old('cats[]') , ['class'=>'form-control','id'=>'category3',
                                'multiple']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Sub categories</label>
                            <div class="col-md-8">
                                <select id="sub" name="sub[]" value="{{ old('sub[]')}}" class="form-control" multiple="multiple"> </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business website</label>
                            <div class="col-md-8">
                                <input type="text" id="website" name="website" value="{{ old('website')}}" class="form-control" placeholder="www.pattsbar.com.ng">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                            <div class="col-md-8">
                                <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="info@pattsbar.com.ng">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Contact Name</label>
                            <div class="col-md-8">
                                <input type="text" id="contactname" name=" contactname" value="{{ old('contactname')}}" class="form-control" placeholder="Mr Patt" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                            <div class="col-md-8">
                                <input type="text" id="contact" name="phone1" value="{{ old('phone1')}}" class="form-control" placeholder="Phone number 1">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                            <div class="col-md-8">
                                <input type="text" id="contact" name="phone2" value="{{ old('phone2')}}" class="form-control" placeholder="Phone number 2">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-plus-circle"></i>
                                    Add New Business
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#category3").select2({
                placeholder: 'select business category',
            });

        });

        $(document).ready(function() {
            var y=[];
            $('#category3').click(function(){
                if($(this).val() !== "select business category") {
                    var model=$('#sub');
                    model.empty();
                    $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
                        $.each(result.data,function(){
                            $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
                    });
                }
            });
        });

        $(document).ready(function() {
            var y=[];
            $('#category3').change(function(){
                if($(this).val() !== "select business category") {
                    var model=$('#sub');
                    model.empty();
                    $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
                        $.each(result.data,function(){
                            $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
                    });
                }
            });
        });

        $(document).ready(function() {
            $("#stateList").select2({
                placeholder: 'select state',
            });
        });

        $(document).ready(function() {
            $('#stateList').change(function(){
                if($(this).val() !== "select state") {
                    var model=$('#lga');
                    model.empty();
                    $.get('{{ URL::to('api/lga')}}', {z: $(this).val()}, function(result){
                        $.each(result.data,function(){
                            $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
                    });
                }
            });
        });

        $(document).ready(function() {
            $("#sub").select2({
                placeholder: 'select subcategories',
                // tags: true,
            });
        });
    </script>
@endsection
