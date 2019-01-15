<template>
    <div class="col-sm-12">
        <div>
            <router-link :to="{ name: 'CreateCategory' }">
                <input type="button" class="btn btn-success btn-sm" value="Thêm mới">
            </router-link>
            <input type="button" v-on:click="multiDelete()" class="btn btn-danger btn-sm" value="Delete choice">
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%"><input type="checkbox"></th>
                    <th width="5%">#</th>
                    <th width="20%">name</th>
                    <th width="20%">body</th>
                    <th width="20%">actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category, index in categories">
                    <td><input type="checkbox" v-on:click="checkIndex(index, $event)" v-bind:value="category.id" v-bind:id="category.id" v-model="checkedCategory"></td>
                    <td>{{index+1}}</td>
                    <td>{{category.name}}</td>
                    <td>{{category.body}}</td>
                    <td>
                        <router-link :to="{name: 'EditComponent', params: {id: category.id}}" class="btn btn-sm btn-info">Edit</router-link>
                        <input v-on:click="deleteCategory(category.id, index)" type="button" value="Delete" class="btn btn-sm btn-danger">
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <p>{{checkedCategory}}</p> -->
        <!-- <p>{{checkedCategoryIndex}}</p> -->
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
    import { EventBus } from '../../event-bus.js';
    export default {
        data() {
            return {
                categories: [],
                checkedCategory: [],
                checkedCategoryIndex: [],
                message_delete: 'delete',
                pagination: {
                    total: 4, 
                    per_page: 2,
                    from: 1, 
                    to: 0,
                    current_page: 0
                },
                offset: 2,
            }
        },
        mounted() {
            var page = this.pagination.current_page;
            // axios.get('/api/v1/category/page/' + page)
            axios.get('/api/v1/category')
            .then(response => {
                this.categories = response.data;
                EventBus.$on('create-success', create_success => {
                    toastr["success"]("Them moi thanh cong");
                });
                EventBus.$on('edit-success', edit_success => {
                    toastr["success"]("Chinh sua thanh cong");
                });
            })
            .catch(response => {
                console.log(response);
                alert("Could not load category");
            }); 

            EventBus.$off('create-success');
            EventBus.$off('edit-success');
        },
        methods: {
            deleteCategory(id, index) {
                if ( confirm('Bạn có muốn xóa?') ) {
                    axios.delete('/api/v1/category/' + id)
                    .then(response => {
                        this.categories.splice(index, 1);
                        this.message_delete = 'success';
                        // this.$router.replace('/categories');
                    })
                    .catch(response => {
                        this.message_delete = 'error';
                        // console.log(response);
                    });
                }
            },

            multiDelete() {
            	if ( confirm('Bạn có muốn xóa?') ) {
            		axios.post('/api/v1/category/multi-delete', this.checkedCategory)
	                .then(response => {
	                	if (response.data == null) {
	                		toastr["error"]("Chua chon phan tu");
	                	} else {
	                		this.categories = response.data;
	                    	this.checkedCategory = [];
	                    	toastr["success"]("Xoa thanh cong");
	                	}
	                    
	                })
	                .catch(response => {
	                    toastr["error"]("Xoa thanh cong");
	                })
            	}
            },

            checkIndex(index, event) {
                // console.log(event);
                if (event.target.checked) {
                    this.checkedCategoryIndex.push({ index: index, id: event.target.id});
                    // console.log(this.checkedCategoryIndex);
                } else {
                    // this.$delete(this.checkedCategoryIndex, index);
                    // this.checkedCategoryIndex.splice({index: index, id: event.target.id},1);
                }
                
            }

        },
        computed: {
            pagesNumber() {

                //return [1,2,3];

                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            } 
        },
        watch: {
            message_delete() {
                if (this.message_delete == 'success') {
                    toastr["success"]("Xoa thanh cong");
                } else {
                    toastr["error"]("Xoa khong thanh cong");
                }
                
            }
        }
    }
</script>
<style lang="scss" scoped>
    
</style>

