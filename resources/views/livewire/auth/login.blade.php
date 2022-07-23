<div>



<div id="registerform" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 my-2 " style="margin:0 auto">
    <div id="register">




        <h1 class="text-center"> تسجيل الدخول </h1>

        <form class="form-group">




            <div class="form-group ">
                <label class="form-label" for="email"> البريد الالكترونى </label>
                <input class="form-control"  autocomplete="email" type="email" wire:model="email" type="email" id="email" placeholder="البريد الالكترونى" required>
                <center> @error('email') <span class="text-danger error">{{ $message }}</span>@enderror </center>

            </div>

            <div class="form-group ">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control" autocomplete="new-password" wire:model="password" type="password" id="password" placeholder="كلمة المرور" required>
                <center>
                 @error('password') <span class="text-danger error">{{ $message }}</span>@enderror</span> 
                @if(session()->has('error.password'))<span class="text-danger error">{{ session()->get('error.password') }}</span @endif
                 </center>

            </div>


            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-success w-100" wire:click.prevent="login"> تسجيل الدخول </button>
            </div>
        </form>

        <br>
        <a href="/verifypwd"> نسيت كلمة المرور </a>
        <br><br>
        <center>
            <a href="/register" class="dropdown-item"> ليس لديا حساب.. التسجيل </a>
        </center>



    </div>
</div>
</div>


<style>
    #registerform {
        border-radius: 70px 0px 70px;
        background-color: skyblue;
        margin-top: 100px;
        direction: rtl;


    }

    #register {
        padding: 20px
    }

    .form-label {
        float: right;
    }
</style>



