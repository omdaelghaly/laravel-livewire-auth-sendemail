<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<div>
</div>



<div id="registerform" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 my-2 " style="margin:0 auto">
    <div id="register">




        <h1 class="text-center">  تغيير كلمة المرور </h1>

<div id="success" class="btn btn-success"> تم تغير كلمة المرور بنجاح  </div>
        <form class="form-group"  action="">



        <input hidden type="text" value="{{csrf_token()}}" name="_token">
            <div class="form-group ">
                <label class="form-label" for="password">  كلمة المرور الجديده</label>
                <input class="form-control" autocomplete="new-password" name="password" type="password" id="password" placeholder=" كلمة المرور" required>
                <center>  <span id="pwd" class="text-danger error"></span

            </div>

            <div class="form-group ">
                <label class="form-label" for="password2"> تاكيد كلمة المرور </label>
                <input class="form-control" autocomplete="new-password" name="password2" type="password" id="password2" placeholder=" تاكيد كلمة المرور" required>
                <center> <span id="pwd2" class="text-danger error"></span></center>
            </div>

            <br>

            <div class="form-group">
                <button id="btn_newpwd" type="submit" class="btn btn-success w-100"> حفظ </button>
            </div>
        </form>

        <br>
        
       



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



<script type="text/javascript">
          $('#success').hide();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    $("#btn_newpwd").click(function(e){
 
        e.preventDefault();
 
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var email = '{{$email}}';
        var token = '{{$token}}';
 
        $.ajax({
           type:'POST',
           url:"{{ route('changepwdform') }}",
           data:{ password:password,password2:password2,
                   email:email,token:token},

           success:function(data){
               if(data.status == 'errors'){
            $('#pwd').html(data.data.password[0]);
            $('#pwd2').html(data.data.password2[0]);
               }else{
                   console.log(data);
                   $('#success').show();
                   setTimeout(()=>{
                    window.location.href="/login";
                 },2000);
               }
            setTimeout(()=>{
            $('#pwd').html('');
            $('#pwd2').html('');
            },7000);
            //console.log(data.data)
               },
          
        });
 
    });
</script>
 

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>