<template>
    <div class="nav">      
      <v-app dark>   
      <v-container>
        <h2>ADD USER</h2>
    <v-flex xs12 md5>
    <h3>Fiil the form to schedule an appointment</h3>
    </v-flex>
  <form  method="post" @submit.prevent="submit">
    
    <v-flex xs12 md5>
    <v-text-field 
      v-model="first_name"
      :error-messages="first_nameErrors"
      :counter="10"
      label="First Name"
      required
      @input="$v.first_name.$touch()"
      @blur="$v.first_name.$touch()"
    ></v-text-field>
    </v-flex>
    
    <v-flex xs12 md5  color="green lighten-1">
    <v-text-field
      v-model="last_name"
      :error-messages="last_nameErrors"
      :counter="10"
      label="Last Name"
      required
      @input="$v.last_name.$touch()"
      @blur="$v.last_name.$touch()"
    ></v-text-field>
    </v-flex>
    
    <v-flex xs12 md5>
    <v-text-field 
      v-model="pets_species"
      :error-messages="pets_speciesErrors"
      :counter="10"
      label="Pet Name"
      required
      @input="$v.pets_species.$touch()"
      @blur="$v.pets_species.$touch()"
    ></v-text-field>
    </v-flex>

     <v-flex xs12 md5>
        <v-select
      v-model="select"
      :items="petSpacies"
      :error-messages="selectErrors"
      label="Item"
      required
      @change="$v.select.$touch()"
      @blur="$v.select.$touch()"
        ></v-select>
          </v-flex>
  
    <v-btn @click="submit">submit</v-btn>
    <v-btn @click="clear">clear</v-btn>
  </form>

      </v-container>
<v-flex xs6 centered>
  <v-navigation-drawer
  v-model="drawer"
    right
    :mini-variant.sync="mini"
    hide-overlay
    stateless
    absolute
    width="200"  
  >
    <v-toolbar flat class="transparent">
      <v-list class="pa-0">
        <v-list-tile avatar>
          <v-list-tile-avatar>
            <img src="https://image.flaticon.com/icons/svg/387/387561.svg">
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title>Dr. Dragi</v-list-tile-title>
          </v-list-tile-content>

          <v-list-tile-action>
            <v-btn
              icon
              @click.stop="mini = !mini"
            >
              <v-icon>chevron_left</v-icon>
            </v-btn>
          </v-list-tile-action>

        </v-list-tile>
      </v-list>
    </v-toolbar>

    <v-list class="pt-0" dense>
      <v-divider></v-divider>

      <v-list-tile v-for="item in items" :key="item.title" @click="goTo(item.title)">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

       <v-divider></v-divider>
        <v-list-tile v-for="out in logOut" :key="out.title" @click="logOutAdmin(out)">
        <v-list-tile-action>
          <v-icon>{{ out.icon }}</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ out.title }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

    </v-list>
    </v-navigation-drawer>
    </v-flex>
    </v-app>
    </div>
</template>
<script>
  import { validationMixin } from 'vuelidate'
  import { required, maxLength} from 'vuelidate/lib/validators'
  export default {
    mixins: [validationMixin],
    validations: {
      first_name: { required, maxLength: maxLength(10) },
      last_name: { required, maxLength: maxLength(10) },
      last_name: { required, maxLength: maxLength(10) },
      pets_species: { required, maxLength: maxLength(10) },
      select: { required },
    },
    data: () => ({

        drawer: true,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'Clients', icon: "as fa-user-friends" },
          { title: 'Edit', icon: 'fas fa-user-edit' },
          { title: 'Add', icon: 'fas fa-user-plus' }
        ],
        logOut: [
            { title: 'log out', icon:"fas fa-sign-out-alt"}
        ],
        mini: true,
        right: null,
        drawer: true,
        first_name: '',
        last_name: '',
        select: null,
        petSpacies: [
        	"Retriver",
	        "Malteser",
	        "Staford",
	        "Beagle",
	        "Dogge"
        ],
        checkbox: false,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'Clients', icon: "as fa-user-friends" },
          { title: 'Edit', icon: 'fas fa-user-edit' },
          { title: 'Add', icon: 'fas fa-user-plus' }
        ],
      }),
      beforeCreate(){
       
      },
      computed:{
         selectErrors () {
        const errors = []
        if (!this.$v.select.$dirty) return errors
        !this.$v.select.required && errors.push('Item is required')
        return errors
       },FirstNameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.maxLength && errors.push('Name must be at most 10 characters long')
        !this.$v.name.required && errors.push('Name is required.')
        return errors
      }
      },
      methods: {
      submit () {

      },
       clear () {
        this.$v.$reset()
        this.first_name = ''
        this.last_name = ''
        this.select = null
      },
      goTo (value){
        if (value == 'Home') {
          window.location.href = "http://localhost:8080/#/dashboardadmin";
        }
        if (value == 'Clients') {
          window.location.href = "http://localhost:8080/#/userlist";
        }
        if (value == 'Add') {
          window.location.href = "http://localhost:8080/#/addUser";
        }
        if (value == 'Edit') {
          window.location.href = "http://localhost:8080/#/editUser";
        }
      },
      logOutAdmin (value){
        if (value.title == "log out") {
          
        }
      }
    }
  }
</script>
<style scoped>
.v-navigation-drawer--close.v-navigation-drawer--temporary {
  height: 100%;
}
div#table{
  text-align: center;
  background: red;
  display: flex;
  justify-content: center;
  align-items: center; 
}
</style>
