


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.0/dist/vue.js"></script>

<script src="https://cdn.jsdelivr.net/npm/nodemailer@6.0.0/lib/nodemailer.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>





******************************<div id="app">@{{user}}


<button >send</button>
</div>




<script>
const nodemailer = nodemailer;
const smtpTransport = nodemailer-smtp-transport;



smtpTransport = nodemailer.createTransport(smtpTransport({
  host: mailConfig.host,
  secure: mailConfig.secure,
  port: mailConfig.port,
  auth: {
    user: mailConfig.auth.user,
    pass: mailConfig.auth.pass
  }
}));

const sendMail = async () => {
    let html = await readFile('/path/to/file', 'utf8');
    let template = handlebars.compile(html);
    let data = {
        username: "Toto"
    };
    let htmlToSend = template(data);
    let mailOptions = {
        from: 'from@toto.com',
        to : 'to@toto.com',
        subject : 'test',
        html : htmlToSend
    }};
    smtpTransport.sendMail(mailOptions, (error, info) => {
        if (error) console.log(error);
    });

</script>




<script>

const app = new Vue({

  el: '#app',

 
  data(){
      return{
          user:'hhhhhhhhhhhhhhhhhh',
          socket:'',
          
      }
  },

});
</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>