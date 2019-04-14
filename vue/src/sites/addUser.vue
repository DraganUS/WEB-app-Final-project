<template>
    <div class="text-xs-center pt-2">
    <v-app dark>      
    <v-container>

        <v-flex xs2>
          <label>Filter by Name:</label>
        <v-text-field class="form-control" v-model="filters.name.value"
            label="Search By Name"
          ></v-text-field>
      <v-table
        :data="users"
        :filters="filters"
      >
        <thead slot="head">
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        </thead>
        <tbody slot="body" slot-scope="{displayData}">
        <tr v-for="row in displayData" :key="row.guid">
          <td>{{ row.name }}</td>
          <td>{{ row.age }}</td>
          <td>{{ row.email }}</td>
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
  data: () => ({
    users:[
        {name: 'Marko' , age:12, email:'Marko@marko', address: 'Dog' },
        {name: 'Petar' , age:22, email:'sad@asd.com', address: 'Cat' },
        {name: 'Pera' , age:23, email:'s@asdasad.com', address: 'Pig' },
    ],
    filters: {
      name: { value: '', keys: ['name'] }
    }
  })
}
</script>