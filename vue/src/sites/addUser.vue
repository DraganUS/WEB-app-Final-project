<template>
    <div class="nav">      
      <v-app dark>   
      <v-container  grid-list-xl text-xs-center>
        <h2>ADD USER</h2>
        <h3>Fiil the form to add a new usser</h3>
    <v-flex xs11 md11>  
    <form >
    <v-text-field
      v-model="first_name"
      :error-messages="first_nameErrors"
      :counter="10"
      label="First Name"
      required
      @input="$v.first_name.$touch()"
      @blur="$v.first_name.$touch()"
    ></v-text-field>
	<v-text-field
      v-model="last_name"
      :error-messages="last_nameErrors"
      :counter="10"
      label="last Name"
      required
      @input="$v.last_name.$touch()"
      @blur="$v.last_name.$touch()"
    ></v-text-field>
	<v-text-field
      v-model="pet_name"
      :error-messages="pet_nameErrors"
      :counter="10"
      label="Pet Name"
      required
      @input="$v.pet_name.$touch()"
      @blur="$v.pet_name.$touch()"
    ></v-text-field>
    <v-select
      v-model="select"
      :items="pets_species"
      :error-messages="selectErrors"
      label="Pet Species"
      required
      @change="$v.select.$touch()"
      @blur="$v.select.$touch()"
    ></v-select>
  	<img :src="imageUrl" height="150" v-if="imageUrl"/>
<v-text-field label="Select Image" @click='pickFile' v-model='imageName' prepend-icon='attach_file'></v-text-field>
		<input
						type="file"
						style="display: none"
						ref="image"
						accept="image/*"
						@change="onFilePicked"
					>
		
    <v-btn @click="submit">submit</v-btn>
    <v-btn @click="clear">clear</v-btn>
    
  </form>
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
	  first_name: { required, maxLength: maxLength(10) },
	  last_name: { required, maxLength: maxLength(10) },
	  pet_name: { required, maxLength: maxLength(10) },
      select: { required },
    },
    data: () => ({

        		  dialog: false,
		imageName: '',
		imageUrl: '',
		imageFile: '',
	  first_name: '',
	  last_name: '',
	  pet_name: '',
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
          { title: 'Add', icon: 'fas fa-user-plus' }
        ],
      }),
      beforeCreate(){
       
      },
      computed:{
         selectErrors () {
        const errors = []
        if (!this.$v.select.$dirty) return errors
        !this.$v.select.required && errors.push('Pet species is required')
        return errors
      },
      first_nameErrors () {
        const errors = []
        if (!this.$v.first_name.$dirty) return errors
        !this.$v.first_name.maxLength && errors.push('First name must be at most 10 characters long')
        !this.$v.first_name.required && errors.push('First name is required.')
        return errors
      },  last_nameErrors () {
        const errors = []
        if (!this.$v.last_name.$dirty) return errors
        !this.$v.last_name.maxLength && errors.push('Last name must be at most 10 characters long')
        !this.$v.last_name.required && errors.push('Last name is required.')
        return errors
	  },
	  pet_nameErrors () {
        const errors = []
        if (!this.$v.pet_name.$dirty) return errors
        !this.$v.pet_name.maxLength && errors.push('Pet name must be at most 10 characters long')
        !this.$v.pet_name.required && errors.push('Pet name is required.')
        return errors
      }
      },
      methods: {
           pickFile () {
            this.$refs.image.click ()
      },
      onFilePicked (e) {
			const files = e.target.files
			if(files[0] !== undefined) {
				this.imageName = files[0].name
				if(this.imageName.lastIndexOf('.') <= 0) {
					return
				}
				const fr = new FileReader ()
				fr.readAsDataURL(files[0])
				fr.addEventListener('load', () => {
					this.imageUrl = fr.result
					this.imageFile = files[0] // this is an image file that can be sent to server...
					// console.log(this.imageFile)
				})
			} else {
				this.imageName = ''
				this.imageFile = ''
				this.imageUrl = ''
			}
		},
        submit () {
		this.$v.$touch()

			axios.post('http://vue-final:8888/php/reguser.php',
  			this.imageFile,
  			{
    		headers: {
        	'Content-Type': 'multipart/form-data'
    			}
  			}
		).then(function(){
  		console.log('SUCCESS!!');
		})
		.catch(function(){
  		console.log('FAILURE!!');
		});

         window.location.href = "http://vue-final:8888/php/reguser.php?first_name=" + this.first_name 
         + "&last_name=" +  this.last_name 
         + "&select=" + this.select 
         + "&pet_name=" + this.pet_name;

      },
      clear () {
        this.$v.$reset()
		    this.first_name = ''
		    this.last_name = ''
		    this.pet_name = ''
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
v-container{
  margin: 30px;
}
div#table{
  text-align: center;
  background: red;
  display: flex;
  justify-content: center;
  align-items: center; 
}
</style>
