<template>
  <header class="header">
    <v-container>  
      <nav>
        <ul>  
          <li >
            <i class="fas fa-sign-in-alt" @click="modalShow"> LOG IN</i>
          </li>
        </ul>
      </nav>
    </v-container>  
     <div id="modal" v-bind:style="modalDisplay">
   <v-form v-model="valid"  ref="form">
        <i @click="modalNone" class="fas fa-times-circle"></i>
        <v-text-field
           label="Enter your e-mail address"
            v-model="email"
            :rules="emailRules"
            required
            ></v-text-field>
            <v-text-field
            label="Enter your password"
            v-model="password"
            min="8"
            :append-icon="e1 ? 'visibility' : 'visibility_off'"
           @click:append="() => (e1 = !e1)"
            :type="e1 ? 'text' : 'password'"
            :rules="passwordRules"
            counter
            required
            ></v-text-field>
            <v-flex xs12 md4>
            <v-layout justify-space-between>
            <v-btn @click="submit" :class=" { 'blue darken-4 white--text' : valid, disabled: !valid }">Login</v-btn>
            </v-layout>
         </v-flex>
      </v-form>
  </div>
  </header>      
</template>
  <script>
export default {

  
  data() {
    
    return {
       info: [],
       modalDisplay: "display:visible",
       valid: false,
            e1: false,
            password: '',
            passwordRules: [
              (v) => !!v || 'Password is required',
            ],
            email: '',
            emailRules: [
              (v) => !!v || 'E-mail is required',
              (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/.test(v) || 'E-mail must be valid'
            ],
          }
        },
        beforeCreate() {
    
     fetch("http://vue-final:8888/php/findadmin.php")
       .then(response => response.json())
       .then((data) => {
       this.info = data;
      //  console.log(this.info[0].username);
        // console.log(this.info[0].pass);
        // var passwordHash = require('password-hash');
        //  var hashedPassword = passwordHash.generate('nikola.starcevic@gmail.com');
        // email: nikola.starcevic@gmail.com
        // pass: Nikola123
        // console.log(hashedPassword);
        // console.log(passwordHash.verify(this.password, this.info[0].pass));     
      })

    },
        methods: {
          submit () {
            if (this.$refs.form.validate()) {
              this.$refs.form.$el.submit()
              var passwordHash = require('password-hash')
              
              validEmail = passwordHash.verify(this.email, this.info[0].username)
              validPass = passwordHash.verify(this.password, this.info[0].pass)

              console.log(passwordHash.verify(this.email, this.info[0].username)); 
              console.log(passwordHash.verify(this.password, this.info[0].pass));     
            }
          },
          clear () {
            this.$refs.form.reset()
          },  
     modalNone : function (event) {
      return this.modalDisplay ="display:none";
    },
    modalShow: function (event) {
      return this.modalDisplay ="";
    }
    
  },
  
}
</script>

<style scoped>
html, body{
      height: 100%;
      width: 100%;
  }

@import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

* {
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}

body {
  font-family:"Open Sans", Helvetica, Arial, sans-serif;
  font-weight:300;
  font-size: 12px;
  line-height:30px;
}
li.errors {color: #ff3a00;}
div.container{
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
header{
  padding: 15px;
  z-index: 200;
  background: #F4511E;
  position: relative;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}
header a{
  margin: 0 30px;
}
header div nav ul li a {
  text-decoration: none;
  color: #fff;
}
header div nav ul {
  margin-left: 20px;
  list-style-type: none;
  display: flex;
  justify-content: space-between;
}
 div.regSuccess{
 display: none;
}
form ul{
  list-style-type: none;
}
h1{
  padding: 20px;
}
i.fa-times-circle{
  cursor: pointer;
  color: red;
  font-size: 20px;
  position: absolute;
  top: 5px;
  right: 5px
}
i.fa-sign-out-alt,i.fa-sign-in-alt{
  cursor: pointer;
  color: rgb(214, 214, 214);
  font-size: 20px;
}
 i.fa-sign-out-alt:hover,i.fa-sign-in-alt:hover{
   font-size: 21px;
   color: #fff;
}
#modal {
  position: absolute;
  top: 0px;
  left: 0px;
  display: none;
  height:100vh;
  width: 100vw;
  position: fixed;
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #000000e6;
  padding: 0;
}
#modal form {
  height: auto;
  padding: 60px 20px 40px 20px;
  width: auto;
  background: #fff;
  border-radius: 5px;
  position: relative;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  align-items: center;
}
#modal form ul {
height: 100%;
width: 50%;
display: flex;
justify-content: flex-start;
align-items: center;
flex-wrap: wrap;
}
#modal form i{
  position: absolute;
  top: 4px;
  right: 7px;
  font-size: 20px;
  cursor: pointer;
}
#modal form ul li{
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  flex-wrap: wrap;
  margin: 20px 0;
}
#modal form ul li input{
    height: 20px;
    position: relative;
    float: left;
    width: 90%;
    border: none;
    border-bottom: 1px solid #B0BEC5;
    background-color: transparent;
    font-size: 14px;
    outline: none;
    transition: all 0.5s;
}
.btnSign {
  background: rgba(255,64,88,0.74);
  border-radius: 8px;
  padding: 15px 30px;
  border: none;
  color: #fff;
  font-size: 14px;
  cursor: pointer;
  text-decoration: none;
}
 .btnSubmit{
   position: absolute;
   bottom: 31px;
   right: 15px;
   background: #221f1f;
   border-radius: 8px;
   padding: 15px 30px;
   border: none;
   color: #fff;
   font-size: 14px;
   cursor: pointer;
   text-decoration: none;
 }
@media only screen and (max-width: 700px) {
  #modal form ul li{
    margin: 10px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 10px;
    flex-wrap: wrap;
  }
}</style>
