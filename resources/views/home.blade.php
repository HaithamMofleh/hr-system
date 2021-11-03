@extends('hrms.layouts.base')
@section('content')
    <!-- START CONTENT -->
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="allcp-form top-buffer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section">
                                <label for="comment" class="field prepend-icon">
                          <textarea class="gui-textarea br-b-l-r0 br-b-r-r0" id="status" name="status"
                                    placeholder="Share your status in 270 characters"
                                    style="padding-left:100px"></textarea>
                                    <label for="comment" class="field-icon">
                                        <img src="{{isset(\Auth::user()->employee) ? \Auth::user()->employee->photo : '/assets/img/avatars/profile_pic.png'}}"
                                             width="80px" height="80px" style="padding-top: 10px; padding-left: 8px"
                                             class="img-responsive">
                                    </label>
                                    <div class="input-footer br-b-l-r3 br-b-r-r3">
                                        <div style="padding-left:90%" id="post-button">
                                            <input type="button" class="btn btn-success" id="post-update" value="Post">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            {{--<div class="col-md-4 pull-right top-buffer">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Suggested updates
                    </div>
                    <div class="panel-body">
                        @foreach($suggestions as $suggestion)
                            <div class="row">
                                <div class="col-md-2">
                                    @if(Auth::user()->employee->photo)
                                        <img src="{{\Auth::user()->employee->photo}}" width="80px"
                                             height="80px">
                                        <div class="small-help-block"> {{getUserData($suggestion->user_id)['name']}}</div>
                                    @else
                                        <img src="/assets/img/avatars/profile_pic.png" width="80px"
                                             height="80px">
                                        <div class="small-help-block"> {{getUserData($suggestion->user_id)['name']}}</div>
                                    @endif
                                </div>
                                <div class="col-md-8 pull-right">
                                    <a href="/post/{{$suggestion->id}}">{{substr($suggestion->status, 0, 40)}}...</a>
                                </div>
                            </div>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <!-- END CONTENT -->
@endsection