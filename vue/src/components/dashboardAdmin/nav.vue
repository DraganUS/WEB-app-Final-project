<template>
    <div class="nav">      
      <v-app dark>     
<v-flex xs6>
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

      <v-list-tile
        v-for="item in items"
        :key="item.title"
        @click="goTo(item.title)"
      >
        <v-list-tile-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ item.title }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

       <v-divider></v-divider>
        <v-list-tile
         v-for="out in logOut"
        :key="out.title"
        @click="logOutAdmin(out)"
      >
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
    data () {
      return {
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
        right: null
      }
    }, 
    methods: {
      submit () {
        console.log('assssss');
      },
      goTo (value){
        console.log(value)
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
        // izloguje se   
        }
      }
    }
  }
</script>
<script>
  export default {
  }
</script>
<style scoped>

</style>
