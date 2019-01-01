// Views
import Index from './components/crud/Index'
import Categories from './components/crud/Categories'
import CreateCategory from './components/categories/CreateComponent'
import EditComponent from './components/categories/EditComponent'

export const routes = [
	{ path: '/', name: 'Index', component: Index },
	{ path: '/categories', name: 'Categories', component: Categories },
	{ path: '/categories/create', name: 'CreateCategory', component: CreateCategory },
	{ path: '/categories/edit/:id', name: 'EditComponent', component: EditComponent },
];