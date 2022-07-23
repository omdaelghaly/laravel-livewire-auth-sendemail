





    <div>
  


    <div id="registerform" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 my-2" style="margin:0 auto">
    <div id="register" >




        <h1 class="text-center"> التسجيل</h1>
        
        <form class="form-group"  >
             
           <div class="form-group">
              <label  class="form-label" for="name"> الاسم </label>
              <input type="text" name="name" wire:model="name" class="form-control" placeholder="الاسم" id="name">
               <center> @error('name') <span class="text-danger error">{{ $message }}</span>@enderror </center>
            </div>


            <div class="form-group ">
                <label class="form-label" > البريد الالكترونى </label>
                <input class="form-control" autocomplete="email" wire:model="email"  type="email" placeholder="البريد الالكترونى" required>
                  <center> @error('email') <span class="text-danger error">{{ $message }}</span>@enderror</span> </center> 
            </div>

            <div class="form-group ">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control"  autocomplete="new-password"  wire:model="password"  type="password"  placeholder="كلمة المرور" required>
                    <center> @error('password') <span class="text-danger error">{{ $message }}</span>@enderror</span> </center> 
            </div>

            <div class="form-group">
                <label class="form-label" >تاكيد كلمة المرور </label>
                <input type="password"   autocomplete="new-password" name="conpass" wire:model="confirm" class="form-control" placeholder="تاكيد كلمة المرور" id="confpwd">
                <center> @error('confirm') <span class="text-danger error">{{ $message }}</span>@enderror</span></center>
            </div>
             
             <br>
             <div class="form-group">
             <button type="submit" class="btn btn-success w-100" wire:click.prevent="register">Register</button>
              </div>   
        </form>


            <br>
    <center>
          <a  href="/login"   class="dropdown-item">  لديا حساب.. تسجيل الدخول </a>
    </center>



    </div>
   </div>
    </div>


    <style>
#registerform{
    border-radius: 70px 0px 70px ;
    background-color: skyblue;
    margin-top:100px;
    direction: rtl;
    
    
}
#register{
    padding:20px
}
.form-label{
  float: right;
}


</style>






