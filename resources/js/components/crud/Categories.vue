<template>
	<div class="col-sm-12">
		<div class="panel panel-default">
	        <div class="panel-heading">
	        	<router-link :to="{ name: 'Index' }">
	        		<input type="button" class="btn btn-default" value="Trang chủ">
	        	</router-link>
				<router-link :to="{ name: 'Categories' }">
					<input type="button" class="btn btn-default" value="Danh mục">
				</router-link>
	        </div>
	        <div class="panel-body">
	           	<category-component></category-component>
	        </div>
	    </div>
	</div>
</template>