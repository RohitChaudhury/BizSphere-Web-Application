
@include('layouts.manager_header')

      <div id="layoutSidenav_content" style="background: url(https://images.unsplash.com/photo-1590650046871-92c887180603?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);  background-size: cover;">
      {{-- Heading of the blade template --}}
      <div class="heading" style="display:grid;
      place-items: center;
      margin-top: 2.4%;
      margin-bottom: 3%;color:white;">
        <h2 class="font-weight-bold mt-4 mr-4">Assign existing Member(s) under Team Lead</h2>
        {{-- Pop-up on submitting the form --}}
        @if(session('pop-up'))
        <div class="alert alert-success">
          {{ session('pop-up') }}
        </div>
        @endif
      </div>
      




      {{-- Main form to assign members --}}
     <div class="form" style="width: 42.8%;
     padding: 2rem;
     background-color: white;
     position: relative;
     left: 28%;
     height: 44vh;">
      <form action="{{url('/')}}/manager/add/member/under_lead" method ="POST">
        @csrf
        {{-- To select Team Lead --}}
       <div class="form-group">
         <label for="project_lead">Select a Team Lead:</label>
         {!! Form::select('project_lead', [''=>' -- select a team lead -- '] + $leads, null, ['class' => 'form-control']) !!}
         <span class="text-danger">
          @error('project_lead')
          {{$message}}
          @enderror
      </span>
       </div>
      
       
       <div class="form-group">
       {{-- To select multiple Team members --}}
          <label for="project_member">Select Developer(s):</label>
          <select class="form-control selectpicker" multiple data-live-search="true" name="project_member[]">
          <option select disabled>-- select team member(s) --</option>
           @foreach($membersTest as $member)
             <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        </select>
        <span class="text-danger">
          @error('project_member')
          {{$message}}
          @enderror
      </span>
      </div>

       
        <div class="text-center" style="margin-top: 20px;">
         <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to add this Member under the Lead?')">Save</button>
     </div>
    </form>
  </div>
    
      
          
           
       
       
       

     
      






 






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   

    {{-- script for multiselect --}}
    <script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
     <script type="text/javascript">
    $(document).ready(function() {
      $('select').selectpicker();
    });
    </script>
  </script>
   

     {{-- Footer of the page --}}
     @include('layouts.manager_footer')