<template>
    <div class="nav">      
      <v-app dark>   
      <v-container grid-list-xl text-xs-center>
        <h2>PET LIST TABLE <i class="fas fa-table"></i></h2>
     <v-flex xs11 md11>
        <v-text-field class="form-control" v-model="filters.first_name.value" label="Search By Name"></v-text-field>
        <v-text-field class="form-control" v-model="filters.pet_name.value" label="Search By Pet Name"></v-text-field>
        <v-table  light :data="users" :filters="filters" xs10>
          <thead slot="head">
            <th> First name </th>
            <th>Last name </th>
            <th>Pet name </th>
            <th>Pet species </th>
          </thead>
          <tbody slot="body" slot-scope="{displayData}">
            <tr v-for="row in displayData" :key="row.guid">
              <td class="text-xs">{{ row.first_name }}</td>
              <td class="text-xs">{{ row.last_name }}</td>
              <td class="text-xs">{{ row.pet_name }}</td>
              <td class="text-xs">{{ row.pets_species_name }}</td>
            </tr>
          </tbody>
         </v-table>
    </v-flex><br><br><hr><br><br>
      <h2>Termin list <i class="fas fa-calendar-plus"></i></h2>
     <v-flex xs11 md11>
        <v-table  light :data="visits"  xs10>
          <thead slot="head">
            <th> Name </th>
            <th> Visit Date </th>
            <th> Visit Time </th>
            <th> Visitor Email </th>
            <th> Visit Type </th>
            <th> Visit Desciption </th>
          </thead>
          <tbody slot="body" slot-scope="{displayData}">
            <tr v-for="row in displayData" :key="row.guid">
              <td class="text-xs">{{ row.visit_title }}</td>
              <td class="text-xs">{{ row.visit_date }}</td>
              <td class="text-xs">{{ row.visit_time }}</td>
              <td class="text-xs">{{ row.email }}</td>
              <td class="text-xs">{{ row.visit_type}}</td>
              <td class="text-xs">{{ row.visit_desciption }}</td>
            </tr>
          </tbody>
         </v-table>
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
  export default {
  name: 'BasicFiltering',
  info:[],
    data () {
      return {
       users:[],
       visits:[],
      filters: {
        first_name: { value: '', keys: ['first_name'] },
        pet_name: { value: '', keys: ['pet_name'] }
        },
        drawer: true,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'Clients', icon: "as fa-user-friends" },
          { title: 'Add', icon: 'fas fa-user-plus' }
        ],
        logOut: [
            { title: 'log out', icon:"fas fa-sign-out-alt"}
        ],
        mini: true,
        right: null
      }
    },
     beforeCreate(){
               if (!this.$session.exists('username')) {
                window.location.href = "http://localhost:8080/?#/"
              }
        fetch("http://vue-final:8888/php/petsapi.php")
       .then(response => response.json())
       .then((data) => {this.users = data;})
       

        fetch("http://vue-final:8888/php/visitsapi.php")
       .then(response => response.json())
       .then((data) => {this.visits = data;})
    },
    methods: {
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
             this.$session.remove('username');
            window.location.href = "http://localhost:8080/?#/"
        }
      }
    }
  }
</script>
<style scoped>
  .spacing-playground .v-select .v-input__prepend-outer, .spacing-playground .v-select .v-input__append-outer{
    margin-top: 0.55rem;
    margin-right: 0.2rem;
  }
.v-navigation-drawer--close.v-navigation-drawer--temporary {
  height: 100%;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #9c9393;
  color: black;
}
</style>
