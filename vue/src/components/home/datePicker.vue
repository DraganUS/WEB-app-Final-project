<template>
<div class="register">    
    <v-app dark>
  <v-container >  
    <v-flex xs12 md5>
    <h3>Fiil the form to schedule an appointment</h3>
    </v-flex>
  <form  method="post" @submit.prevent="submit">
     <v-flex xs12 md5>
    <v-text-field 
      v-model="name"
      :error-messages="nameErrors"
      :counter="10"
      label="Name"
      required
      @input="$v.name.$touch()"
      @blur="$v.name.$touch()"
    ></v-text-field>
    </v-flex>

    <v-flex xs12 md5>
    <v-text-field
      v-model="email"
      :error-messages="emailErrors"
      label="E-mail"
      required
      @input="$v.email.$touch()"
      @blur="$v.email.$touch()"
    ></v-text-field>
    </v-flex>
    
    <v-flex xs12 md5>
    <v-select
      v-model="select"
      :items="animal"
      :error-messages="selectErrors"
      label="Visit Type"
      required
      @change="$v.select.$touch()"
      @blur="$v.select.$touch()"
    ></v-select>
    </v-flex>
           <v-flex xs12>
            <v-textarea
            v-model="formBio"
              color="teal"
            >
              <template v-slot:label>
                <div>
                  Bio <small>(optional)</small>
                </div>
              </template>
            </v-textarea>
          </v-flex>
    <v-layout  row wrap >
    <v-flex xs12 xl12 >
<v-time-picker   format="24hr" color="green lighten-1" v-model="time" header-color="primary"> 
       <v-date-picker
       color="blue accent-2"
      v-model="date"
      full-width
      landscape
      class="mt-3"
      required
    ></v-date-picker>
    </v-time-picker>
      <p>Pick a visit date</p>
 
    </v-flex>
  </v-layout>
  
    <v-btn @click="submit">submit</v-btn>
    <v-btn @click="clear">clear</v-btn>
  </form>
   </v-container>
</v-app>
    
    
     <v-footer dark height="auto">
    <v-card  class="flex" flat tile>
      <v-card-title class="deep-orange darken-1" >
        <strong class="subheading">Get connected with us on social networks!</strong>
        <v-spacer></v-spacer>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-3"
          dark
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-title>

      <v-card-actions class="grey darken-3 justify-center">
        &copy;2019 — <strong>DogAmbulance</strong>
      </v-card-actions>
    </v-card>
  </v-footer>
</div>        
</template>
<script>
  import { validationMixin } from 'vuelidate'
  import { required, maxLength, email } from 'vuelidate/lib/validators'
  export default {
    mixins: [validationMixin],

    validations: {
      name: { required, maxLength: maxLength(10) },
      email: { required, email },
      select: { required }
    },

    data: () => ({
      name: '',
      email: '',
      time: '11:15',
      select: null,
      formBio: 'Visit reason: ',
      animal: [
        'Medical Emergensy','Check-up','Cosmetc','Consultation'
      ],
      date: new Date().toISOString().substr(0, 10),
      icons: [
        'fab fa-facebook',
        'fab fa-twitter',
        'fab fa-google-plus',
        'fab fa-linkedin',
        'fab fa-instagram'
      ]
    }),

    computed: {
      checkboxErrors () {
        const errors = []
        if (!this.$v.checkbox.$dirty) return errors
        !this.$v.checkbox.checked && errors.push('You must agree to continue!')
        return errors
      },
      selectErrors () {
        const errors = []
        if (!this.$v.select.$dirty) return errors
        !this.$v.select.required && errors.push('Animal type is required')
        return errors
      },
      nameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.maxLength && errors.push('Name must be at most 10 characters long')
        !this.$v.name.required && errors.push('Name is required.')
        return errors
      },
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Must be valid e-mail')
        !this.$v.email.required && errors.push('E-mail is required')
        return errors
      }
    },

    methods: {
      submit () {
        this.$v.$touch()
window.location.href = "http://vue-final:8888/php/regv.php?name="+ this.name + 
"&date=" +  this.date + "&animal=" + this.select + "&formBio=" + this.formBio + "&time=" +this.time;
      },
 
      clear () {
        this.$v.$reset()
        this.name = ''
        this.email = ''
        this.select = null
      }
    }
  }
</script>