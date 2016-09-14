@extends('admin.adminlayout')
@section('title', 'Admin Edit Business')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Update "{{ $biz->name}}" info</h2>
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
                        <h3><small><a href="/admin">Admin</a> » <a href="/admin/biz">Businesses</a></small> » Edit Business Info</h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    <form class="form-horizontal" role="form" method="POST" action="/admin/biz/{{$biz->id}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$biz->id}}">

                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Name</label>
                            <div class="col-md-8">
                                <input required type="text" value="{{ $biz->name}}" id="name" name="name" class="form-control" placeholder="Patt's Bar">
                            </div>
                        </div>
                        {{--DESCRIPTION--}}
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Description</label>
                            <div class="col-md-8">
                                <input type="text" id="description" value="{{ $biz->description}}" name="description" class="form-control" placeholder="e.g. A brief description of the business" value="{{ old('description')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Tagline/Slogan</label>
                            <div class="col-md-8">
                            <input type="text" id="tagline" name="tagline" class="form-control" placeholder="e.g. Bar & Nightclub" value="{{ $biz->tagline}}">
                        </div>
                  </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Address</label>
                            <div class="col-md-8">
                                <input required type="text" value="{{$biz->address->street}}" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business state</label>
                            <div class="col-md-8">
                                {!!Form::select('state', $stateList, $biz->address->state_id, ['class'=>'form-control',
                                'id'=>'stateList','placeholder'=>'select state']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Business Region/area</label>
                            <div class="col-md-8">
                                {!!Form::select('lga', $lgaList, $biz->address->lga->name, ['class'=>'form-control',
                                 'id'=>'lga','placeholder'=>'select state']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Category</label>
                            <div class="col-md-8">
                                {!!Form::select('cats[]', $catList, $cat, ['class'=>'form-control','id'=>'category_edit', 'multiple']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Sub categories</label>
                            <div class="col-md-8">
                                {!!Form::select('sub[]', $subList, $sub, ['class'=>'form-control','id'=>'sub_edit','multiple']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business website</label>
                            <div class="col-md-8">
                                <input type="text" id="website" value="{{ $biz->website}}" name="website" class="form-control" placeholder="www.pattsbar.com.ng">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                            <div class="col-md-8">
                                <input type="email" id="email" value="{{ $biz->email}}" name="email" class="form-control" placeholder="info@pattsbar.com.ng">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Contact Name</label>
                            <div class="col-md-8">
                                <input type="text" id="contactname" value="{{ $biz->contactname}}" name=" contactname" class="form-control" placeholder="Mr Patt" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                            <div class="col-md-8">
                                <input type="text" id="contact" value="{{ $biz->phone1}}" name="phone1" class="form-control" placeholder="Phone number 1">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                            <div class="col-md-8">
                                <input type="text" value="{{ $biz->phone2}}" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">
                            </div>
                        </div>
                        <div class="form-group">
                      <label for="images" class="col-md-3 control-label">
                          Upload Business Profile Image (optional)</label>
                      <div class="col-md-8">
                          <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{ isset($biz->profilePhoto) ? asset($biz->profilePhoto->image) : asset('img/user.jpg') }}" alt="...">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                      <div>
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                    </div>
                                </div>
                      </div>
                  </div>


                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    Save Changes
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
 <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("button.btn-hover").hover(function(){
                $(this).addClass('animated pulse');
            })
        });
        $(document).ready(function() {
            $("#category_edit").select2({
                // tags: true,
            });
        });
        $(document).ready(function() {
            var y=[];
            $('#category_edit').change(function(){
                if($(this).val() !== "select business category") {
                    var model=$('#sub_edit');
                    model.empty();
                    $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
                        $.each(result.data,function(){
                            $('#sub_edit').append('<option value="'+this.id+'">'+this.text+'</option>');
                        });
                    });
                }
            });
        });
        $(document).ready(function() {
            $("#stateList").select2({
            });
        });
        $(document).ready(function() {
            $("#lga").select2({
            });
        });


        $(document).ready(function() {
            $("#sub_edit").select2({
                //  tags: true,
            });
        });
    </script>
@endsection
