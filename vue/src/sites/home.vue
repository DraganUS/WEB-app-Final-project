<template>
	<div class="home" >
		<navMenu/>
		    <v-app dark>
  				<v-container>  
					<v-carousel >
    				<v-carousel-item
      				v-for="(item,i) in items"
      				:key="i"
      				:src="item.src"
    				></v-carousel-item>
  					</v-carousel>
				</v-container>  
			</v-app>
		<datePicker/>
	</div>
</template>


<script>
import navMenu from "@/components/home/navMenu.vue";
import datePicker from "@/components/home/datePicker";

export default {
	name: 'home',
	components:{
		navMenu,
		datePicker
	},
	data() {
		return {
			 items: [
          {
            src: 'https://cdn.pixabay.com/photo/2016/07/29/16/17/animal-1554745_1280.jpg'
          },
          {
            src: 'https://cdn.pixabay.com/photo/2016/12/17/05/45/dog-1912874_1280.jpg'
          },
          {
            src: 'https://cdn.pixabay.com/photo/2013/02/25/04/37/veterinary-85925_1280.jpg'
          }
        	]
		}
	},
	methods: {
	}

}
</script>

<style scoped>

</style>
