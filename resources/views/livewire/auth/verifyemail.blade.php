
    
    <div >
  


    <div id="verifyform" class="col-xxl-4 col-xl-4  col-lg-6  col-md-9 col-sm-12 my-4" style="margin:0 auto">
    <div id="verify" >



        <h1 class="text-center">  تفعيل الايميل </h1>
     <div >

     <br>
     @if ($codestatus)
         <p class="text-right" style="color:red" >
              {{$codestatus }}
          </p>
         @endif
     
         @if ($status)
         <p class="text-right" style="color:green">
              {{$status }}
           <a href="https://{{$email}}" target="_blank" class="btn btn-success">my email</a> 
          </p>
         @endif
               <br>
             
               <p class="text-right"> هذا الكود صالح  لمده  <span id="exp" style="color:blue"> {{date('i:s',$expire)}}</span>    
     
     <br>
      كما يمكنك ارسال الكود والرابط مره اخرى بالضغط على زر أرسال
 <br>
 </p>

           <button type="submit" class="btn btn-primary  " wire:click.prevent="sendcode"> أرسال  </button>
     </div>
             
        <hr>
  
    
        <form class="form-group"  >
             
          
            <div class="form-group ">
                <label class="form-label" > كود التفعيل</label>
                <input  class="form-control " wire:model="usercode"  type="number" placeholder="كود التفعيل" required>
            </div>

            
             <br>
             <div class="form-group ">
             <button type="submit" class="btn btn-success w-100" wire:click.prevent="verifyemail">  تفعيل  </button>
              </div>   
        </form>


    </div>


    </div>


  





    <style>
#verifyform{
    border-radius: 70px 0px 70px ;
    background-color: skyblue;
    margin-top:100px;
    direction: rtl;
    
    
}
#verify{
    padding:20px
}
.form-label{
  float: right;
}


</style>



</div>


