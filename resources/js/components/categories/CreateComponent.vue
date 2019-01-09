<template>
	<div class="col-sm-12">
		<div class="form-group">
            <router-link :to="{ name: 'Categories' }" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new Category</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="category.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Body</label>
                            <input type="text" v-model="category.body" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</template>

<script>
    import { EventBus } from '../../event-bus.js';
	export default {
		data() {
			return {
                create_success: true,
				category: {
					name: '',
					body: ''
				}
			}
		},
		methods: {
            saveForm() {
                event.preventDefault();
                var newCategory = this.category;
                axios.post('/api/v1/category', newCategory)
                .then(response => {
                    this.$router.push({path: '/categories'});
                    EventBus.$emit('create-success', this.create_success);
                })
                .catch(response => {
                    console.log(response);
                    alert("Could not create your company");
                });
            }
        }
	}
</script>
