


<div>




    
<div >
  


  <div id="verifyform" class="col-xxl-4 col-xl-4  col-lg-6  col-md-9 col-sm-12 my-4" style="margin:0 auto">
  <div id="verify" >



    <a  href="/login">رجوع -></a> <h1 class="text-center"> تغيير كلمة المرور </h1>
   <div >

   <br>
   @if($funstatus)
       <p class="text-right" style="color:green" >
           <a class="btn btn-primary btn-sm" href="https://{{$useremail}}">GO to my email</a>       {{$funstatus }} 
        </p>
       @endif

  <p> الرابط صالح لمدة <span id="exp" style="color:blue"> {{date('i:s',$expire)}}</span>  </p>

      @if($status)
       <p class="text-right" style="color:blue" >
            {{$status }}
        </p>
       @endif
   
   </div>
           
      <hr>

  
      <form class="form-group"  >
           
        
          <div class="form-group ">
              <label class="form-label" >  الايميل    </label>
              <input  class="form-control " wire:model="useremail"  type="text" placeholder=" اكتب ايميلك " required >
          </div>

          
           <br>
           <div class="form-group ">
           <button type="submit" {{$sendstatus}} class="btn btn-success w-100" wire:click.prevent="verifypassword">  ارسال ايميل </button>
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







</div>
