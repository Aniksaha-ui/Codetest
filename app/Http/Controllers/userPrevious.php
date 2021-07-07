
 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5 style="text-align: center";>User Information</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title" style="text-align: center;">User List
  <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Information</a>
          </h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                 
                  <th class="wd-15p">User Name</th>
                  <th class="wd-15p">User Role</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>

                @foreach($user as $row)
                
                <tr id="sid{{$row->id}}">
                  <td style="font-family: Arial;color: black;">{{$row->username}}</td>
                  <td style="font-family:Arial;color: black;">{{$row->role}}</td>
                  <td>
                    <a href="{{ URL::to('edit/userinformation/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                   <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteUser({{$row->id}})" >Delete</a>
                   
                </tr>
            @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->



  <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">User Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
       <form method="post" action="{{route('store.user')}}">
        @csrf
         <div class="modal-body pd-20"> 
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
         <select class="form-control" name="user_id">
         
          @foreach($user as $row)
          <option value="{{ $row->id }}"> {{ $row->username }}  </option> 
          @endforeach  

           </select>
          
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">User Role</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="role">
          
        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">User Address</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="address">
        </div>


         <div class="form-group">
          <label for="exampleInputEmail1">User Phone</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="phone">
        </div>
          
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20" >Sumbit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
                </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


          <script>
              function deleteUser(id){

                console.log(id);

                if(confirm("Do You Want To Delete id"))
                {
                  $.ajax({
                    url:'admin/delete/userinformation/'+id,
                    type:'DELETE',
                    data:{
                      _token :$("input[name=_token]").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                    }
                  });
                }
              }
          </script>
