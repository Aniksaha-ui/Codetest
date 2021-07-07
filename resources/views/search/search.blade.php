@extends('admin.admin_layout')

@section('admin_panel')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Search Report</h5>
         
        </div><!-- sl-page-title -->

  <div class="row">
    <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.result') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">Search By Designation</label>
             
             <select class="form-control" name="role">
         
          @foreach($user as $row)
          <option value="{{ $row->role }}"> {{ $row->role }}  </option> 
          @endforeach  

           </select>
            
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>

    
  </div>







     

        

 
    </div><!-- sl-mainpanel -->


    


 
 

@endsection