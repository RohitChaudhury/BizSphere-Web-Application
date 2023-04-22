{{-- Header of the page --}}
@include('layouts.member_header')

{{-- Body Content of the page --}}
<div id= "layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);
background-size: cover;">
<div class="row justify-content-center">
    <center>
 <div class="heading" style=" margin-top: 4%;width:fit-content;font-weight: bold; color: white;">
    <h2 class="font-weight-bold">View & Add Comments</h2>
  </div></center>

<div class="comm_form" style= "width:46vw; height: 72%; background-color: white; padding: 2rem; margin-bottom:4%;"> 
    
        <div class="form">    
        <div class="heading_form" style="margin-bottom: 4%;">
     <h2>Add Comment</h2></div>
     
    <form action = "{{route('add_comments_submit')}}" method = "post">
    @csrf
        <div class="form-group row mb-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Project:</label>
            <div class="col-sm-10">
              {!! Form::select('project', [''=>' --   select a particular Project   -- '] + $projects, null, ['class' => 'form-control', 'id' => 'project']) !!}
            </div>
            <span class="text-danger">
              @error('project')
              {{$message}}
              @enderror
          </span>
        </div>
    
    <div class="form-group row mb-4">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Module:</label>
          <div class="col-sm-10">
            {{Form::select('project_module',[ '' => '-- select a Module for this Project --' ], null,['class' => 'form-control','id' => 'module'])}}
        </div>
        <span class="text-danger">
          @error('project_module')
          {{$message}}
          @enderror
      </span>
    </div>
    <div class="form-group row mb-4">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Completion Percentage</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" id="inputEmail3" name = 'completion_weightage' placeholder="don't put % sign">
        </div>
        <span class="text-danger">
          @error('completion_weightage')
          {{$message}}
          @enderror
      </span>
    </div>
    
    <div class="form-group row mb-4">
         <label for="inputEmail3" class="col-sm-2 col-form-label">Comment:</label>
         <div class="col-sm-10">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "member_comment" placeholder="Comment here...."></textarea>
         </div>
         <span class="text-danger">
          @error('member_comment')
          {{$message}}
          @enderror
      </span>
    </div>
    
    <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
     <div class="btn" style="position: relative; left:28%;">
       <div class="form-group row pl-4">
         <div class="col-sm-10">
           <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add this comment?')">Submit</button>
         </div>
       </div>
     </div>
    </div>
    </form>
    <a href="{{url('/')}}/member/add/comments"><button type="back" class="btn btn-primary" style="position: relative;
      left: 89%;
      bottom: 14%;">Back</button></a>
    </div>
</div>
   

    {-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    $(document).ready(function () {
      $('#project').on('change', function(){
        var projectId = $(this).val();
        console.log(projectId);
        if(projectId) {
            $.ajax({
                url: '/member/add/comment/fetch-modules/'+projectId,
                type:"GET",
                
                dataType:"json",
                success:function(data) {
                  console.log(data);
                  $('select[name="project_module"]').empty();
                  $('select[name="project_module"]').append($('<option>', {
                          text: '-- select a Module for this Project --'
                  }));
                  $.each(data, function(key, value){
                    $('select[name="project_module"]').append($('<option>', {
                      value: value.id,
                      text: value.module_name
                    }));
                  });
                },
            });
        } else {
          $('select[name="project_module"]').empty();
        }
    });

});
</script>

{{-- Footer of the page --}}
@include('layouts.member_footer')