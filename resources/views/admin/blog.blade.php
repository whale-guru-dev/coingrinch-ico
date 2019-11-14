@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> Blog Management</h3>
        <hr>
        
        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->

                <!-- <link rel="stylesheet" href="blog/style/normalize.css">
                <link rel="stylesheet" href="blog/style/main.css"> -->
                @if($bmanage=='normal')
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bookmark"></i>Blog Posts
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <script language="JavaScript" type="text/javascript">
                                function delpost(id, title) {
                                    if (confirm("Are you sure you want to delete '" + title + "'")) {
                                        window.location.href = 'Blog?blog&delpost=' + id;
                                    }
                                }
                            </script>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dblog as $blog)
                                        <tr>
                                            <th>{{$i++}}</th>
                                            <th>{{$blog->postTitle}}</th>
                                            <th>{{$blog->postDate}}</th>
                                            <th>
                                                <a href="{{url('/Admins/Blog'.'/'.$blog->postID)}}">Edit</a> |
                                                <a data-id="{{$blog->postID}}"  id="delBtn">Delete</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- print pagination -->
                        <div class="row">
                            <div class="text-center">
                                 {{$dblog->render()}}
                            </div>
                        </div><!-- row -->
                        <!-- END print pagination -->
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

            <br>
            <br>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <a class="btn blue btn-block btn-lg" href="{{url('/Admins/Blog/0')}}">Add Post</a>
                </div>
            </div>
            @section('additional_js')
            <script>
                $(document).on("click", "#delBtn", function () {
                 var delUserId = $(this).data('id');
                 $("#delForm #delId").val( delUserId );
                 $( "#delForm" ).submit();
                });
            </script>
           @endsection
            <form action="{{url('/Admins/ManageBlog')}}" id="delForm" method="post">
                {{ csrf_field() }}
                <input type='hidden' name='del' id="delId">
            </form>
            @elseif($bmanage=='edit')
            <style>
                .iq-footer{
                    margin-top: 18%;
                }
                .wrap{
                    height:200% !important;
                }
            </style>
<!--             <link rel="stylesheet" href="blog/style/normalize.css">
            <link rel="stylesheet" href="blog/style/main.css"> -->
            <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    selector: "textarea",
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                });
            </script>

            <form action="{{url('/Admins/ManageBlog')}}" method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type='hidden' name='postID' value='{{$dblog->postID}}'>
                <input type="hidden" name="type" value="edit">
                <p>
                    <label>Title</label><br />
                    <input type='text' name='postTitle' value='{{$dblog->postTitle}}'>
                </p>

                <p>
                    <label>Description</label><br />
                    <textarea name='postDesc' cols='60' rows='10'>{{$dblog->postDesc}}</textarea>
                </p>

                <p>
                    <label>Content</label><br />
                    <textarea name='postCont' cols='60' rows='10'>{{$dblog->postCont}}</textarea>
                </p>
                <img src="{{$dblog->postImg}}">
                <input class="btn btn-info" type="file" name="blogImage" id="blogImage">

                <input type="checkbox" name="changepic" value="yes"> Change picture<br>

                <p><input type='submit' name='submit' value='Update'></p>

            </form>
            @elseif($bmanage=='add')
            <style>
                .iq-footer{
                    margin-top: 18%;
                }
            </style>

<!--             <link rel="stylesheet" href="blog/style/normalize.css">
            <link rel="stylesheet" href="blog/style/main.css"> -->
            <div class="page-header">
                <h3>
                    Add a post
                </h3>
            </div>
            <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    selector: "textarea",
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                });
            </script>


            <form action="{{url('/Admins/ManageBlog')}}" enctype="multipart/form-data" method='post'>
                {{ csrf_field() }}
                <input type="hidden" name="type" value="add">
                <p>
                    <label>Title</label><br />
                    <input type='text' name='postTitle' value=''>
                </p>

                <p>
                    <label>Description</label><br />
                    <textarea name='postDesc' cols='60' rows='10'></textarea>
                </p>

                <p>
                    <label>Content</label><br />
                    <textarea name='postCont' cols='60' rows='10'></textarea>
                </p>

                <p>
                    <label>Image</label><br />
                    <input class="btn btn-info" type="file" name="blogImage"  id="blogImage">
                </p>
                <p>
                    <input type='submit' name='submit' value='Submit'>
                </p>

            </form>

            @endif
            <div class="clearfix"></div>

            <div class="mask"></div>

        </div>
    </div>
</div>
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection