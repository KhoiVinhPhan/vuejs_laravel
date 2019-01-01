<template>
	<div>
		<div>
			<router-link :to="{ name: 'Index' }"><a>Trang chủ</a></router-link>
			<router-link :to="{ name: 'Categories' }"><a>Danh mục</a></router-link>
		</div>
		<div>
			<category-component></category-component>
		</div>
	</div>
</template>