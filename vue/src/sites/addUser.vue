<template>
    <div class="text-xs-center pt-2">
    <v-app dark>      
    <v-container>

        <v-flex xs5>
        <v-text-field class="form-control" v-model="filters.first_name.value" label="Search By Name">
          </v-text-field>
          <v-text-field class="form-control" v-model="filters.pet_name.value" label="Search By Pet Name"></v-text-field>
          <v-table :data="users" :filters="filters" xs10>
          <thead slot="head">
            <th>First_name</th>
            <th>Last_name</th>
            <th>Pet_name</th>
            <th>Pet_species</th>
        </thead>
        <tbody slot="body" slot-scope="{displayData}">
        <tr v-for="row in displayData" :key="row.guid">
          <td>{{ row.first_name }}</td>
          <td>{{ row.last_name }}</td>
          <td>{{ row.pet_name }}</td>
          <td>{{ row.pets_species_name }}</td>
        </tr>
        </tbody>
      </v-table>
      </v-flex>

     </v-container>
    </v-app>    
    </div>
</template>

<script>
// import users from './users.json'
export default {
  name: 'BasicFiltering',
  info:[],
  data: () => ({
    users:[],
    filters: {
      first_name: { value: '', keys: ['first_name'] },
      pet_name: {value: '', keys: ['pet_name']}
    }
  }),
    beforeCreate() {
      console.log('assss');
        fetch("http://vue-final:8888/php/petsapi.php")
       .then(response => response.json())
       .then((data) => {
       this.users = data;
      })
    },
    methods:{
      test(){
        console.log('asd');
      }
    }
}

</script>
<style scoped>
thead{
  margin: 30px;
}
</style>
