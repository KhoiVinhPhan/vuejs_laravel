<template>
	<div class="col-sm-12">
		<div>
			<router-link :to="{ name: 'CreateCategory' }">Create</router-link>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>name</th>
					<th>body</th>
					<th>actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="category, index in categories">
					<td>{{index+1}}</td>
					<td>{{category.name}}</td>
					<td>{{category.body}}</td>
					<td>
						<router-link :to="{name: 'EditComponent', params: {id: category.id}}" class="btn btn-xs btn-default">Edit</router-link>
						<input v-on:click="deleteCategory(category.id, index)" type="button" value="Delelte" class="btn btn-sm btn-danger">
					</td>
				</tr>
			</tbody>
		</table>
		<ul class="pagination">
		  	<li><a href="#"><<</a></li>
		  	<li v-for="page in pagesNumber">
		  		<a href="#">{{page}}</a>
		  	</li>

		  	<li><a href="#">>></a></li>
		</ul>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				categories: [],
				pagination: {
			        total: 0, 
			        per_page: 2,
			        from: 1, 
			        to: 0,
			        current_page: 1
			    },
			    offset: 4,
			}
		},
		created() {
            axios.get('/api/v1/category')
            .then(response => {
                this.categories = response.data;
            })
            .catch(response => {
                console.log(response);
                alert("Could not load category");
            });
        },
        methods: {
        	deleteCategory(id, index) {
        		if ( confirm('Bạn có muốn xóa?') ) {
        			axios.delete('/api/v1/category/' + id)
        			.then(response => {
        				this.categories.splice(index, 1);
        				// this.$router.replace('/categories');
        			})
        			.catch(response => {
        				console.log(response);
        			});
        		}
        	}

        },
        computed: {
        	pagesNumber() {

        		return [1,2,3];
        	}
        }
	}
</script>
<style lang="scss" scoped>
	
</style>

