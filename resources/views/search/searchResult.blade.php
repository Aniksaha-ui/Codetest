@extends('admin.admin_layout')

@section('admin_panel')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5 style="text-align: center; color: black;">Search Result</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">UserName</th>
                  <th class="wd-15p">Designation</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td style="color: black;">{{ $row->username }}</td>
                  <td style="color: black;">{{ $row->role }}</td>
                  <td>
                     <a href="javascript:void(0)" class="btn btn-danger" onclick="userinformation({{$row->id}})" >select</a>                    
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
</div>
</div>



 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5 style="text-align: center; color: black;">Search Result</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          
          <form action="{{route('store.userselect')}}" method="post"> 
                  @csrf
          <div class="table-wrapper">
             <form action="#" method="post"> 
            <table id="datatable2" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th hidden="true" class="wd-15p">ID</th>
                  
                  <th class="wd-15p">UserName</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-15p">phone</th>
                  <th class="wd-15p">email</th>
               
                  
                </tr>
              </thead>

              <tbody>
          
                <tr>
                  <td hidden="true" class="wd-15p">
                         <input hidden="true" class="form-control" name="id" type="text" id="id">

                  </td>
                  <td class="wd-15p">
                    
                       <input class="form-control" name="username" type="text" id="username">

                  </td>
                  <td  class="wd-15p">
                           <input class="form-control" name="address" type="text" id="address">                    
                  </td>
                  <td  class="wd-15p">
                     <input class="form-control" name="phone" type="text" id="phone">
                  </td>
                  <td  class="wd-15p">
                     <input class="form-control" name="email" type="text" id="email">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
            <br>
         <button type="submit" class="btn btn-info pd-x-20" >Sumbit</button>
          <!-- table-wrapper -->
        </div><!-- card -->     
      </form>
 
    </div><!-- sl-mainpanel -->

</div>
 
<script >

    function userinformation(id){
     
        $.ajax({
            url:'admin/select/'+id,
            type:'GET',
            dataType:"json",
            success:function(data){
             
               document.getElementById("id").value =data.user[0].id;
               document.getElementById("username").value =data.user[0].username;
               document.getElementById("address").value =data.user[0].user_information.address;
               document.getElementById("phone").value =data.user[0].user_information.phone;
               document.getElementById("email").value =data.user[0].email;
            }
          });
    }


</script>
       






 

@endsection