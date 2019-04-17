<template>
    <div class="nav">      
      <v-app dark>   
      <v-container>
        <h2>ADD USER</h2>
    <v-flex xs12 md5>
    <h3>Fiil the form to add a new usser</h3>
    </v-flex>

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
        pets_species: [
        	"Retriver",
	        "Malteser",
	        "Staford",
	        "Beagle",
	        "Dogge"
        ],
        pet_name: '',
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
       
      },
      methods: {
      submit () {
       
      },
       clear () {
       
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
